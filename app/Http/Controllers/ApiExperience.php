<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ApiExperience extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::get();
        return response()->json([
            'success' => true,
            'message' => 'Experiences data',
            'data' => $experiences
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['experience_start'] = $request->experience_start.'-01';
        if($request->experience_end) {
            $request['experience_end'] = $request->experience_end.'-01';
        }
        
        $validation = Validator::make($request->all(),[
            'experience_headline' => 'required',
            'experience_company' => 'required',
            'experience_start' => 'required',
            'experience_end' => '',
            'experience_description' => 'required',
        ]);

        if($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()
            ], 422);
        }

        try {
            $newData = Experience::create($validation->validated());
    
            return response()->json([
                'success' => true,
                'message' => 'New experience data is stored successfully!',
                'data' => $newData
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!',
            ],500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $experience = Experience::find($id);

        if(!$experience) {
            return response()->json([
                'success' => false,
                'message' => 'Experience data not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Experience data found!',
            'data' => $experience
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $experience = Experience::find($id);

        if(!$experience) {
            return response()->json([
                'success' => false,
                'message' => 'Experience data not found!'
            ], 404);
        }

        $request['experience_start'] = $request->experience_start.'-01';
        if($request->experience_end) {
            $request['experience_end'] = $request->experience_end.'-01';
        } else {
            $request['experience_end'] = null;
        }
        
        try {
            $experience->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Experience data is updated successfully!',
                'data' => $experience
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::find($id);

        if(!$experience) {
            return response()->json([
                'success' => false,
                'message' => 'Experience data not found!'
            ], 404);
        }

        try {
            $experience->delete();

            return response()->json([
                'success' => true,
                'message' => 'Experience data is deleted successfully!',
                'data' => $experience
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ],500);
        }
    }
}
