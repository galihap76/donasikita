<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::select('image')
            ->where('status', 'active')
            ->get();

        return view('landing-page.index', compact('campaigns'));
    }
}
