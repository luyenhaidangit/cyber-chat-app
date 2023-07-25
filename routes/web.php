<?php

use Illuminate\Support\Facades\Route;

//Guest
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'App\Http\Controllers\GuestController@login')->name('login');
    Route::get('/login', 'App\Http\Controllers\GuestController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\GuestController@postLogin')->name('login.post');
    Route::get('/register', 'App\Http\Controllers\GuestController@register')->name('register');
    Route::post('/register', 'App\Http\Controllers\GuestController@postRegister')->name('register.post');
    Route::get('/change-password', 'App\Http\Controllers\GuestController@changePassword')->name('change_password');
    Route::get('/lock-screen', 'App\Http\Controllers\GuestController@lockScreen')->name('lock_screen');
    Route::get('/reset-password', 'App\Http\Controllers\GuestController@resetPassword')->name('reset_password');
    Route::get('/logout', 'App\Http\Controllers\GuestController@logout')->name('logout');
    Route::get('/recover', 'App\Http\Controllers\GuestController@recover')->name('recover');
    Route::get('/chat', 'App\Http\Controllers\ChatController@index')->name('chat');
    Route::get('/index', 'App\Http\Controllers\ChatController@index')->name('verify_email');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', 'App\Http\Controllers\GuestController@postLogout')->name('logout.post');
    Route::get('/chat', 'App\Http\Controllers\ChatController@index')->name('chat');
});