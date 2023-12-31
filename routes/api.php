<?php

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

Route::group([], function () {
    Route::post('/register', 'App\Http\Controllers\GuestController@postRegister');
    Route::get('/verify-email', 'App\Http\Controllers\GuestController@verifyEmail');
    Route::post('/forgot-password', 'App\Http\Controllers\GuestController@forgotPassword');
    Route::post('/change-password', 'App\Http\Controllers\GuestController@submitChangePassword');
});