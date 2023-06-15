<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\PortfolioType;
use App\Models\Profile;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $experiences = Experience::orderBy('experience_start','DESC')->get();
        $types = PortfolioType::get();
        $portfolios = Portfolio::with('Type')->get();
        $contacts = Contact::get();
        return view('home',[
            'profile' => $profile,
            'experiences' => $experiences,
            'types' => $types,
            'portfolios' => $portfolios,
            'contacts' => $contacts
        ]);
    }
}
