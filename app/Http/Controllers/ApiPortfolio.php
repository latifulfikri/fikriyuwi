<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ApiPortfolio extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('Type')->get();
        return response()->json([
            'success' => true,
            'message' => 'Portfolios data',
            'data' => $portfolios
        ]);
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
            return response()->json([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }

        if( $path = $request->file('portfolio_image')->store('/',['disk' => 'portfolio_upload']) ) {
            $newData = Portfolio::create([
                "portfolio_headline" => $request->portfolio_headline,
                "portfolio_description" => $request->portfolio_description,
                "portfolio_role" => $request->portfolio_role,
                "portfolio_accomplished" => $request->portfolio_accomplished,
                "portfolio_link" => $request->portfolio_link,
                "type_id" => $request->type_id,
                "portfolio_image" => $path,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'New portfolio data is stored successfully!',
                'data' => $newData
            ]);
        } else {
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
        $portfolio = Portfolio::with('Type')->find($id);

        if(!$portfolio) {
            return response()->json([
                'success' => false,
                'message' => 'Portfolio data not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Portfolio data found!',
            'data' => $portfolio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portfolio = Portfolio::with('Type')->find($id);

        if(!$portfolio) {
            return response()->json([
                'success' => false,
                'message' => 'Portfolio data not found!'
            ], 404);
        }

        $validation = Validator::make($request->all(),[
            'type_id' => 'exists:portfolio_type,type_id'
        ]);

        if($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()
            ]);
        }

        if($request->portfolio_image){
            if( $path = $request->file('portfolio_image')->store('/',['disk' => 'portfolio_upload']) ) {
                if ($delete = File::delete('assets/portfolio/'.$portfolio->portfolio_image)) {
                    $portfolio->update([
                        "portfolio_image" => $path
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Internal server error!'
                    ],500);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Internal server error!'
                ],500);
            }
        }

        try {
            $portfolio->update($request->except('portfolio_image'));
            return response()->json([
                'success' => true,
                'message' => 'Portfolio data is updated successfully!',
                'data' => $portfolio
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::with('Type')->find($id);

        if(!$portfolio) {
            return response()->json([
                'success' => false,
                'message' => 'Portfolio data not found!'
            ], 404);
        }

        if(File::delete('assets/portfolio/'.$portfolio->portfolio_image)) {
            $portfolio->delete();

            return response()->json([
                'success' => true,
                'message' => 'Portfolio data is deleted successfully!',
                'data' => $portfolio
            ]);
        }
    }
}
