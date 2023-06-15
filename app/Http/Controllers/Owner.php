<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\PortfolioType;
use App\Models\Profile;
use Illuminate\Http\Request;

class Owner extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        $experiences = Experience::orderBy('experience_start','DESC')->get();
        $types = PortfolioType::get();
        $portfolios = Portfolio::get();
        $contacts = Contact::get();
        return view('owner.index',[
            'profile' => $profile,
            'experiences' => $experiences,
            'types' => $types,
            'portfolios' => $portfolios,
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
