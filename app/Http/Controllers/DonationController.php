<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

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
}
