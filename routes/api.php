<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\Auth\LoginController;
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


// Route::post("/login", [AuthController::class, 'login']);


Route::get('cart/{userId}', [CartController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('cart', [CartController::class, 'store']);
    Route::put('cart', [CartController::class, 'update']);
    Route::delete('cart', [CartController::class, 'destroy']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
