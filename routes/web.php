<?php

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('/home', '\App\Http\Controllers\HomeController@createPost');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

Route::post('/user/change_name', [App\Http\Controllers\UserController::class, 'changeName'])->name('change_name');

Route::post('/user/change_email', [App\Http\Controllers\UserController::class, 'changeEmail'])->name('change_email');

Route::post('/user/change_password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change_password');

Route::post('/user/change_avatar', [App\Http\Controllers\UserController::class, 'changeAvatar'])->name('change_avatar');