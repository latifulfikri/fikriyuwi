<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ApiContact extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::get();
        return response()->json([
            'success' => true,
            'message' => 'Contact data',
            'data' => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'contact_name' => 'required',
            'contact_icon' => 'required',
            'contact_link' => 'required',
        ]);

        if($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()
            ], 422);
        }

        try {
            $newData = Contact::create($validation->validated());
    
            return response()->json([
                'success' => true,
                'message' => 'New contact data is stored successfully!',
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
        $contact = Contact::find($id);

        if(!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact data not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contact data found!',
            'data' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);

        if(!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact data not found!'
            ], 404);
        }

        try {
            $contact->update($request->all());
    
            return response()->json([
                'success' => true,
                'message' => 'Contact data is updated successfully!',
                'data' => $contact
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!',
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);

        if(!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact data not found!'
            ], 404);
        }

        try {
            $contact->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Contact data is deleted successfully!',
                'data' => $contact
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!',
            ],500);
        }
    }
}
