<?php

use App\Http\Controllers\ApiAuth;
use App\Http\Controllers\ApiContact;
use App\Http\Controllers\ApiExperience;
use App\Http\Controllers\ApiPortfolio;
use App\Http\Controllers\ApiPortfolioType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [ApiAuth::class,'login'])->name('login')->middleware('guest');

Route::group([
    'middleware' => 'auth:api'
], function(){
    Route::post('/logout', [ApiAuth::class,'logout']);
    Route::apiResource('/experience', ApiExperience::class);
    Route::apiResource('/portfolio', ApiPortfolio::class);
    Route::apiResource('/portfolio-type', ApiPortfolioType::class);
    Route::apiResource('/contact', ApiContact::class);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
