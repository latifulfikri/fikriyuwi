<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PortfolioTypeController extends Controller
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
            'type_name' => 'required',
            'type_icon' => 'required'
        ]);

        if($validation->fails()) {
            return redirect('owner#portfolio')->with([
                'error' => $validation->errors()
            ]);
        }

        PortfolioType::create($validation->validated());

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
        $type = PortfolioType::find($id);
        return view('owner.portfolio-type.edit',[
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = PortfolioType::find($id);

        $validation = Validator::make($request->all(),[
            'type_name' => 'required',
            'type_icon' => 'required'
        ]);

        if($validation->fails()) {
            return redirect('owner#portfolio')->with([
                'error' => $validation->errors()
            ]);
        }

        $type->update($request->all());

        return redirect('owner#portfolio');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = PortfolioType::find($id);

        $portfolios = Portfolio::where('type_id','=',$id)->get();

        foreach ($portfolios as $index => $portfolio) {
            File::delete('assets/portfolio/'.$portfolio->portfolio_image);
        }

        $type->delete();
        return redirect('owner#portfolio');
    }
}
