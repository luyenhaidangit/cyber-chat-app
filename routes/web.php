<?php

use Illuminate\Support\Facades\Route;

// Route cho phần frontend (người chưa đăng nhập)
Route::group(['middleware' => 'guest'], function () {
    Route::get('/change-password', 'App\Http\Controllers\GuestController@changePassword')->name('change_password');
    Route::get('/lock-screen', 'App\Http\Controllers\GuestController@lockScreen')->name('lock_screen');
    Route::get('/', 'App\Http\Controllers\GuestController@login')->name('login');
    Route::get('/login', 'App\Http\Controllers\GuestController@login')->name('login');
    Route::get('/register', 'App\Http\Controllers\GuestController@register')->name('register');
    Route::get('/logout', 'App\Http\Controllers\GuestController@logout')->name('logout');
    Route::get('/recover', 'App\Http\Controllers\GuestController@recover')->name('recover');
    Route::get('/index', 'App\Http\Controllers\ChatController@index')->name('index');
    Route::get('/index', 'App\Http\Controllers\ChatController@index')->name('verify_email');
});