<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
            $totalDonations = Donation::whereDate('created_at', Carbon::now())
                ->where('status', 'success')
                ->sum('amount');

            $countDonations = Donation::whereDate('created_at', Carbon::now())
                ->where('status', 'success')
                ->count('donation_id');

            $countCampaigns = Campaign::count('campaign_id');

            $countUsers = User::where('role', 'user')->count('id');

            $donations = Donation::selectRaw('MONTH(created_at) as month, SUM(amount) as amount')
                ->whereYear('created_at', Carbon::now()->year)
                ->where('status', 'success')
                ->groupByRaw('MONTH(created_at)')
                ->pluck('amount', 'month');

            // Siapkan data Jan–Dec
            $monthlyDonations = [];

            for ($month = 1; $month <= 12; $month++) {
                $monthlyDonations[] = $donations[$month] ?? 0;
            }

            return view('dashboard.index', compact(
                'totalDonations',
                'countDonations',
                'countCampaigns',
                'countUsers',
                'monthlyDonations'
            ));
        } else if ($role == 'user') {

            $user_id = Auth::user()->id;

            $totalDonations = Donation::where('user_id', $user_id)
                ->where('status', 'success')
                ->sum('amount');

            $countSuccessDonations = Donation::where('user_id', $user_id)
                ->where('status', 'success')
                ->count('donation_id');

            $countPendingDonations = Donation::where('user_id', $user_id)
                ->where('status', 'pending')
                ->count('donation_id');

            $countFailedDonations = Donation::where('user_id', $user_id)
                ->where('status', 'failed')
                ->count('donation_id');

            return view('dashboard.index', compact(
                'totalDonations',
                'countSuccessDonations',
                'countPendingDonations',
                'countFailedDonations'
            ));
        }
    }
}
