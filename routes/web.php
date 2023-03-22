<?php

use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class,'index']);

Route::prefix('owner')->group(function(){
    Route::get('/',[Owner::class,'index']);
    Route::prefix('profile')->group(function() {
        Route::post('greeting/update',[ProfileController::class,'updateGreeting']);
    });
    Route::prefix('experience')->group(function() {
        Route::post('/',[ExperienceController::class,'store']);
        Route::get('/{experience}/edit',[ExperienceController::class,'edit']);
        Route::put('/{experience}',[ExperienceController::class,'update']);
        Route::delete('/{experience}',[ExperienceController::class,'destroy']);
    });
});
