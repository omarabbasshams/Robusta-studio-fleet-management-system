<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api'])->group(function(){
Route::get('getAvilble',[FrontEndController::class,'getAvilble']);
Route::post('reserve',[FrontEndController::class,'reserve']);
Route::post('isAvilbel',[FrontEndController::class,'isAvilbel']);
});
Route::post('/register', [UserAuthController::class,'register']);
Route::post('/login', [UserAuthController::class,'login']);

