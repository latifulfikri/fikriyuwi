<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

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
        PortfolioType::create([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

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

        $type->type_name = $request->type_name;
        $type->type_icon = $request->type_icon;

        $type->save();

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
