<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class WebHookController extends Controller
{

    protected function updateStatusPayment($transaction_id, $paymentMayar, $status)
    {
        Payment::where('transaction_id', $transaction_id)
            ->join('donations', 'payments.donation_id', '=', 'donations.donation_id')
            ->update([
                'status' => $status
            ]);

        Payment::where('transaction_id', $transaction_id)->update([
            'payment_method' => $paymentMayar,
            'payment_channel' => $paymentMayar,
            'payment_status' => $status
        ]);
    }

    public function handle(Request $request)
    {
        $json = $request->getContent();
        $jsonDecode = json_decode($json, true);
        $data = $jsonDecode['data'];
        $transaction_id = $data['transactionId'];
        $status = $data['status'];
        $paymentMayar = $data['paymentMethod'];
        $amount = $data['amount'];
        $email = $data['customerEmail'];
        $eventMayar = $jsonDecode['event']; // Keadaan transaksi di webhook Mayar

        if ($eventMayar === 'payment.received' && $data['status'] === 'SUCCESS') {

            $user_id = User::select('id')->where('email', $email)->first();
            $userDonation = Payment::select('donations.campaign_id')
                ->join('donations', 'payments.donation_id', '=', 'donations.donation_id')
                ->where('payments.transaction_id', $transaction_id)
                ->where('donations.user_id', $user_id->id)
                ->first();

            $campaign = Campaign::select('collected_amount')->where('campaign_id', $userDonation->campaign_id)->first();
            $addDonation = (int)$campaign->collected_amount + (int)$amount;

            Campaign::where('campaign_id', $userDonation->campaign_id)->update([
                'collected_amount' => $addDonation
            ]);

            $this->updateStatusPayment($transaction_id, $paymentMayar, $status);

            return response()->json(['received' => true]);

            // Kalau transaksi Mayar selain pembayaran masuk 
        } else {

            $this->updateStatusPayment($transaction_id, $paymentMayar, $status);
            return response()->json(['received' => true]);
        }
    }
}
