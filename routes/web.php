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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/join', function () {
    return view('join');
});

Route::get('/profile/edit', [App\Http\Controllers\ProfilesController::class, 'edit']);
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index']);
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->middleware('verified');
