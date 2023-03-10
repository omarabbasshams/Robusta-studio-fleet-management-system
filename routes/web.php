<?php

use App\Http\Controllers\Backend\SeatController;
use App\Http\Controllers\Backend\StationController;
use App\Http\Controllers\Backend\TripController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::resource('trip',TripController::class);
    Route::resource('station',StationController::class);
    Route::resource('seat',SeatController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
