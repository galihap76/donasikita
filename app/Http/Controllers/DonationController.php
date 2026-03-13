<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::select(
            'users.name',
            'campaigns.title',
            'donations.amount',
            'donations.status',
            'donations.is_anonymous',
            'donations.created_at'
        )
            ->join('users', 'donations.user_id', '=', 'users.id')
            ->join('campaigns', 'donations.campaign_id', '=', 'campaigns.campaign_id')
            ->orderBy('donations.created_at', 'DESC')
            ->get();

        $sumDonations = Donation::where('status', 'success')->sum('amount');

        return view('donations.index', compact('donations', 'sumDonations'));
    }

    public function create($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();

        if ($campaign) {
            return view('donations.create', compact('campaign'));
        } else {
            abort(404);
        }
    }

    public function store($slug, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'amount' => 'nullable|numeric|min:10000|in:10000,25000,50000,100000',
            'custom_amount' => 'nullable|numeric|min:10000',
            'message' => 'nullable|string|max:500',
            'is_anonymous' => 'nullable|boolean'
        ], [

            'amount.numeric' => 'Nominal donasi tidak valid.',
            'amount.min' => 'Minimal donasi Rp10.000.',

            'custom_amount.numeric' => 'Nominal lain harus berupa angka.',
            'custom_amount.min' => 'Minimal donasi Rp10.000.',

            'message.max' => 'Pesan maksimal 500 karakter.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            if (empty($request->input('amount')) && empty($request->input('custom_amount'))) {

                return redirect()->back()
                    ->with('error', 'Silakan pilih atau isi nominal donasi.')
                    ->withInput();
            } else {

                $campaign = Campaign::select(
                    'campaign_id',
                    'target_amount',
                    'description'
                )
                    ->where('slug', $slug)
                    ->first();

                if ($campaign) {

                    if ($request->input('custom_amount') > $campaign->target_amount) {
                        return redirect()->back()
                            ->with('error', 'Nominal donasi tidak boleh melebihi target dana kampanye.')
                            ->withInput();
                    } else {

                        $amount = !empty($request->input('custom_amount'))
                            ? $request->input('custom_amount')
                            : $request->input('amount');

                        $user_id = Auth::user()->id;
                        $message = !empty($request->input('message')) ? $request->input('message') : null;
                        $isAnonymous = !empty($request->input('is_anonymous')) ? 1 : 0;
                        $expiredAt = Carbon::now()->addMinutes(30)->toIso8601String(); // 30 menit

                        $donation = Donation::create([
                            'user_id' => $user_id,
                            'campaign_id' => $campaign->campaign_id,
                            'amount' => $amount,
                            'message' => $message,
                            'is_anonymous' => $isAnonymous,
                            'status' => 'pending',
                            'payment_reference' => 'Mayar'
                        ]);

                        $response = Http::withToken(env('MAYAR_API_KEY'))
                            ->post('https://api.mayar.club/hl/v1/payment/create', [
                                'name' => ucwords(Auth::user()->name),
                                'email' => Auth::user()->email,
                                'amount' => $amount,
                                'mobile' => '085848672686',
                                'redirectUrl' => 'https://hayes-sustenanceless-unfitly.ngrok-free.dev/donation-histories',
                                'description' => 'Donasi ' . ucwords($campaign->description),
                                'expiredAt' => $expiredAt
                            ]);

                        $data = json_decode($response, true);
                        $redirectPayment = $data['data']['link'];
                        $transactionId = $data['data']['transactionId'];

                        Payment::create([
                            'donation_id' => $donation->donation_id,
                            'transaction_id' => $transactionId
                        ]);

                        return redirect($redirectPayment);
                    }
                } else {
                    Session::flash('error', 'Mohon maaf pembayaran gagal dilakukan.');
                    return redirect()->back();
                }
            }
        }
    }

    public function donationHistories()
    {
        $user_id = Auth::user()->id;

        $donationHistories = Donation::select(
            'campaigns.title',
            'donations.amount',
            'donations.status',
            'donations.created_at'
        )
            ->where('donations.user_id', $user_id)
            ->join('campaigns', 'donations.campaign_id', '=', 'campaigns.campaign_id')
            ->orderBy('donations.created_at', 'DESC')
            ->get();

        $sumDonations = Donation::where('user_id', $user_id)
            ->where('status', 'success')
            ->sum('amount');

        return view('donations.donation-histories', compact('donationHistories', 'sumDonations'));
    }
}
