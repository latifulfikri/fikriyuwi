<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
            'contact_name' => 'required',
            'contact_icon' => 'required',
            'contact_link' => 'required',
        ]);

        if($validation->fails()) {
            return redirect('owner#reachme')->with([
                'error' => $validation->errors()
            ]);
        }

        Contact::create($validation->validated());

        return redirect('owner#reachme');
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
        $contact = Contact::find($id);
        return view('owner.contact.edit',['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);

        $validation = Validator::make($request->all(),[
            'contact_name' => 'required',
            'contact_icon' => 'required',
            'contact_link' => 'required',
        ]);

        if($validation->fails()) {
            return redirect('owner#reachme')->with([
                'error' => $validation->errors()
            ]);
        }

        $contact->update($request->all());

        return redirect('owner#reachme');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('owner#reachme');
    }
}
