<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioTypeController;
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

Route::get('login',[AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class, 'login'])->middleware('guest');
Route::post('logout',[AuthController::class, 'logout'])->middleware('auth');

Route::group(['prefix' => 'owner','middleware' => 'auth'],function(){
    Route::get('/',[Owner::class,'index'])->name('owner-page');

    Route::prefix('profile')->group(function() {
        Route::post('greeting/update',[ProfileController::class,'updateGreeting']);
    });

    Route::prefix('experience')->group(function() {
        Route::post('/',[ExperienceController::class,'store']);
        Route::get('/{experience}/edit',[ExperienceController::class,'edit']);
        Route::put('/{experience}',[ExperienceController::class,'update']);
        Route::delete('/{experience}',[ExperienceController::class,'destroy']);
    });

    Route::prefix('portfolio-type')->group(function() {
        Route::post('/',[PortfolioTypeController::class,'store']);
        Route::get('{portfoliotype}/edit',[PortfolioTypeController::class,'edit']);
        Route::put('{portfoliotype}',[PortfolioTypeController::class,'update']);
        Route::delete('{portfoliotype}',[PortfolioTypeController::class,'destroy']);
    });

    Route::prefix('portfolio')->group(function() {
        Route::post('/',[PortfolioController::class,'store']);
        Route::get('{portfoliotype}/edit',[PortfolioController::class,'edit']);
        Route::put('{portfoliotype}',[PortfolioController::class,'update']);
        Route::delete('{portfoliotype}',[PortfolioController::class,'destroy']);
    });
});
