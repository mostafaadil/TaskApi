<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [UsersController::class, 'login']);
Route::post('register', [UsersController::class, 'store']);
Route::group(['middleware' => 'authorization'], function () {
    Route::resource('appointment', AppointmentController::class);
    Route::post('search-appointment/{date}', [AppointmentController::class,'getAppointmentByDate']);
    Route::resource('sessions', SessionsController::class);
    Route::resource('users', UsersController::class);
    Route::post('logout', [UsersController::class, 'logOut']);
});
