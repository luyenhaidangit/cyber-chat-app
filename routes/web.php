<?php

use Illuminate\Support\Facades\Route;

//Guest
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'App\Http\Controllers\GuestController@login')->name('login');
    Route::get('/login', 'App\Http\Controllers\GuestController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\GuestController@postLogin')->name('login.post');
    Route::get('/logout', 'App\Http\Controllers\GuestController@logout')->name('logout');
    Route::get('/register', 'App\Http\Controllers\GuestController@register')->name('register');
    Route::post('/register', 'App\Http\Controllers\GuestController@postRegister')->name('register.post');
    Route::get('/verify-email', 'App\Http\Controllers\GuestController@verifyEmail')->name('verify_email');
    Route::get('/recover', 'App\Http\Controllers\GuestController@recover')->name('recover');
    Route::post('/recover', 'App\Http\Controllers\GuestController@postRecover')->name('recover.post');
    Route::get('/reset-password', 'App\Http\Controllers\GuestController@changePassword')->name('reset_password');
    Route::post('/reset-password', 'App\Http\Controllers\GuestController@submitChangePassword')->name('reset_password.post');
    Route::get('/admin', 'App\Http\Controllers\AdminController@login')->name('admin.login');
    Route::get('/admin/login', 'App\Http\Controllers\AdminController@login')->name('admin.login');
    Route::post('/admin/login', 'App\Http\Controllers\AdminController@postLogin')->name('admin.login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'auth_normal'], function () {
        Route::post('/logout', 'App\Http\Controllers\GuestController@postLogout')->name('logout.post');
        Route::get('/change-password', 'App\Http\Controllers\GuestController@changePassword')->name('change_password');
        Route::post('/request-lock-screen', 'App\Http\Controllers\GuestController@requestLockScreen')->name('request_lock_screen');
        Route::get('/chat', 'App\Http\Controllers\ChatController@index')->name('chat');
    });
    Route::get('/lock-screen', 'App\Http\Controllers\GuestController@lockScreen')->name('lock_screen');
    Route::post('/lock-screen', 'App\Http\Controllers\GuestController@postLockScreen')->name('lock_screen.post');
    Route::post('/logout', 'App\Http\Controllers\GuestController@postLogout')->name('logout.post');
});

Route::group(['middleware' => 'permission:manage-system', 'prefix' => 'admin'], function () {
    Route::post('/logout', 'App\Http\Controllers\AdminController@postLogout')->name('admin.logout.post');
    Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');
    Route::get('/not-found', 'App\Http\Controllers\AdminController@notFoundView')->name('admin.not_found');
    Route::group(['prefix' => 'users'], function () {
        Route::group(['middleware' => 'permission:see-users'], function () {
            Route::get('/', 'App\Http\Controllers\AdminController@listUserView')->name('admin.user');
            Route::get('/detail/{uuid}', 'App\Http\Controllers\AdminController@detailUserView')->name('admin.user.detail');
        });
        Route::group(['middleware' => 'permission:create-user'], function () {
            Route::get('/create', 'App\Http\Controllers\AdminController@createUserView')->name('admin.user.create');
            Route::post('/create', 'App\Http\Controllers\AdminController@postCreateUser')->name('admin.user.create.post');
        });
        Route::group(['middleware' => 'permission:edit-user'], function () {
            Route::get('/edit/{uuid}', 'App\Http\Controllers\AdminController@editUserView')->name('admin.user.edit');
            Route::post('/edit', 'App\Http\Controllers\AdminController@postEditUser')->name('admin.user.edit.post');
        });
        Route::group(['middleware' => 'permission:delete-user'], function () {
            Route::get('/delete/{uuid}', 'App\Http\Controllers\AdminController@deleteUserView')->name('admin.user.delete');
            Route::delete('/delete/{uuid}', 'App\Http\Controllers\AdminController@deleteUser')->name('admin.user.delete.delete');
        });
    });
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'App\Http\Controllers\RoleController@listRoleView')->name('admin.role');
        Route::get('/detail/{uuid}', 'App\Http\Controllers\RoleController@detailRoleView')->name('admin.role.detail');
        Route::get('/delete/{uuid}', 'App\Http\Controllers\RoleController@deleteRoleView')->name('admin.role.delete');
        Route::delete('/delete/{uuid}', 'App\Http\Controllers\RoleController@deleteRole')->name('admin.role.delete.delete');
        Route::get('/create', 'App\Http\Controllers\RoleController@createRoleView')->name('admin.role.create');
        Route::post('/create', 'App\Http\Controllers\RoleController@postCreateRole')->name('admin.role.create.post');
        Route::get('/edit/{uuid}', 'App\Http\Controllers\RoleController@editRoleView')->name('admin.role.edit');
        Route::post('/edit', 'App\Http\Controllers\RoleController@postEditRole')->name('admin.role.edit.post');
    });
    Route::group(['prefix' => 'config-destroy'], function () {
        Route::get('/', 'App\Http\Controllers\ConfigDestroyController@create')->name('admin.config_destroy');
        Route::post('/create', 'App\Http\Controllers\ConfigDestroyController@saveConfigs')->name('admin.config_destroy.create.post');
    });
});