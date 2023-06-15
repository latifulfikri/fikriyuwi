<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $validation = Validator::make($request->all(),[
            'experience_headline' => 'required',
            'experience_company' => 'required',
            'experience_start' => 'required',
            'experience_description' => 'required',
        ]);

        if($validation->fails()) {
            return redirect('owner#experience')->with([
                'error' => $validation->errors()
            ]);
        }

        $request['experience_start'] = $request->experience_start.'-01';
        if($request->experience_end) {
            $request['experience_end'] = $request->experience_end.'-01';
        }

        Experience::create($request->all());

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
        $experience = Experience::find($id);

        $validation = Validator::make($request->all(),[
            'experience_headline' => 'required',
            'experience_company' => 'required',
            'experience_start' => 'required',
            'experience_end' => '',
            'experience_description' => 'required',
        ]);

        if($validation->fails()) {
            return redirect('owner#experience')->with([
                'error' => $validation->errors()
            ]);
        }

        $request['experience_start'] = $request->experience_start.'-01';
        if($request->experience_end) {
            $request['experience_end'] = $request->experience_end.'-01';
        } else {
            $request['experience_end'] = null;
        }
        
        $experience->update($request->all());

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
