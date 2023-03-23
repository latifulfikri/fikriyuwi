<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        Experience::create([
            'experience_headline' => $request->experience_headline,
            'experience_company' => $request->experience_company,
            'experience_start' => $request->experience_start.'-01',
            'experience_end' => $request->experience_end.'-01',
            'experience_description' => $request->experience_description
        ]);

        return redirect('owner#experience');
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
        $experience = Experience::find($id);
        return view('owner.experience.edit',[
            'experience' => $experience
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $end = $request->experience_end == null ? null : $request->experience_end.'-01';

        $experience = Experience::find($id);

        $experience->experience_headline = $request->experience_headline;
        $experience->experience_company = $request->experience_company;
        $experience->experience_start = $request->experience_start.'-01';
        $experience->experience_end = $end;
        $experience->experience_description = $request->experience_description;
        
        $experience->save();

        return redirect('owner#experience');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::find($id);
        $experience->delete();

        return redirect('owner#experience');
    }
}
