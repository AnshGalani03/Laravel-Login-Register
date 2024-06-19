<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/404', function () {
    abort(404);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [UserController::class, 'user_list'])->name('dahsboard');

    Route::get('update-user/{id}', [UserController::class, 'update_view'])->name('update-user');
    Route::put('update-user/{id}', [UserController::class, 'update_user'])->name('update-user');

    Route::get('delete-user/{id}', [UserController::class, 'delete_user'])->name('delete-user');

    Route::get('change-password', [UserController::class, 'change_pass_view'])->name('change-password');
    Route::post('change-password', [UserController::class, 'change_pass'])->name('change-password');
});
