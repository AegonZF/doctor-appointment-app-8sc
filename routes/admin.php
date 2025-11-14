<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

//Roles management
Route::resource('roles', RoleController::class);
//Users management
Route::resource('users', UserController::class);