<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'portfolio_headline' => 'required',
            'portfolio_description' => 'required',
            'portfolio_role' => 'required',
            'portfolio_accomplished' => 'required',
            'portfolio_link' => 'required',
            'type_id' => 'required|exists:portfolio_type,type_id',
            'portfolio_image' => 'required',
        ]);

        if($validation->fails()) {
            return redirect('owner#portfolio')->with([
                'error' => $validation->errors()
            ]);
        }

        if( $path = $request->file('portfolio_image')->store('/',['disk' => 'portfolio_upload']) ) {
            Portfolio::create([
                "portfolio_headline" => $request->portfolio_headline,
                "portfolio_description" => $request->portfolio_description,
                "portfolio_role" => $request->portfolio_role,
                "portfolio_accomplished" => $request->portfolio_accomplished,
                "portfolio_link" => $request->portfolio_link,
                "type_id" => $request->type_id,
                "portfolio_image" => $path,
            ]);
        }

        return redirect('owner#portfolio');
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
        $portfolio = Portfolio::find($id);
        $types = PortfolioType::get();

        return view('owner.portfolio.edit',[
            'portfolio' => $portfolio,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portfolio = Portfolio::find($id);

        $validation = Validator::make($request->all(),[
            'type_id' => 'exists:portfolio_type,type_id',
        ]);

        if($validation->fails()) {
            return redirect('owner#portfolio')->with([
                'error' => $validation->errors()
            ]);
        }

        $imagepath = "";
        if($request->portfolio_image != $portfolio->portfolio_image ){
            if( $path = $request->file('portfolio_image')->store('/',['disk' => 'portfolio_upload']) ) {
                if ($delete = File::delete('assets/portfolio/'.$portfolio->portfolio_image)) {
                    $portfolio->update([
                        "portfolio_image" => $path
                    ]);
                }
            }
        }

        $portfolio->update($request->except('portfolio_image'));

        return redirect('owner#portfolio');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::find($id);
        
        if(File::delete('assets/portfolio/'.$portfolio->portfolio_image)) {
            $portfolio->delete();

            return redirect('owner#portfolio')->with([
                'status' => 'success',
                'message' => $portfolio->title.' has ben deleted'
            ]);
        }

        return redirect('owner#portfolio')->with([
            'status' => 'error',
            'error' => 'Internal server error'
        ]);
    }
}
