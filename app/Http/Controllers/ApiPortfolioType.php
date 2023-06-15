<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ApiPortfolioType extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = PortfolioType::with('Portfolios')->get();
        return response()->json([
            'success' => true,
            'message' => 'Portfolio types data',
            'data' => $type
        ]);
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
            return response()->json([
                'success' => false,
                'message' => $validation->errors()
            ], 422);
        }

        try {
            $newData = PortfolioType::create($validation->validated());
    
            return response()->json([
                'success' => true,
                'message' => 'New portfolio type data is stored successfully!',
                'data' => $newData
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!',
                'data' => $validation->validated()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = PortfolioType::with('Portfolios')->find($id);

        if(!$type) {
            return response()->json([
                'success' => false,
                'message' => 'Portfolio type data not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Portfolio type data found!',
            'data' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = PortfolioType::with('Portfolios')->find($id);

        if(!$type) {
            return response()->json([
                'success' => false,
                'message' => 'Portfolio type data not found!'
            ], 404);
        }

        try {
            $type->update($request->all());
    
            return response()->json([
                'success' => true,
                'message' => 'Portfolio type data is updated successfully!',
                'data' => $type
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
        $type = PortfolioType::with('Portfolios')->find($id);

        if(!$type) {
            return response()->json([
                'success' => false,
                'message' => 'Portfolio type data not found!'
            ], 404);
        }

        try {
            $portfolios = Portfolio::where('type_id','=',$id)->get();

            foreach ($portfolios as $index => $portfolio) {
                File::delete('assets/portfolio/'.$portfolio->portfolio_image);
            }
    
            $type->delete();

            return response()->json([
                'success' => true,
                'message' => 'Portfolio type data is deleted successfully!',
                'data' => $type
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!'
            ],500);
        }
    }
}
