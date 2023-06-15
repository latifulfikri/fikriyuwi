<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
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
    
    Route::resource('/experience',ExperienceController::class)->except(['show','index','create']);
    Route::resource('/portfolio-type',PortfolioTypeController::class)->except(['show','index','create']);
    Route::resource('/portfolio',PortfolioController::class)->except(['show','index','create']);
    Route::resource('/contact',ContactController::class)->except(['show','index','create']);
});
