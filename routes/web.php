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

Route::get('/profile/settings', [App\Http\Controllers\ProfilesController::class, 'settings'])->middleware('auth');
Route::patch('/profile/settings', [App\Http\Controllers\ProfilesController::class, 'update'])->middleware('auth');

Route::get('/profile/bookings', [App\Http\Controllers\ProfilesController::class, 'bookings'])->middleware('auth');
Route::get('/profile/reviews', [App\Http\Controllers\ProfilesController::class, 'reviews'])->middleware('auth');
Route::get('/profile/saved', [App\Http\Controllers\ProfilesController::class, 'saved'])->middleware('auth');
Route::get('/profile/apartments', [App\Http\Controllers\ProfilesController::class, 'apartments'])->middleware('auth');
Route::get('/profile/delete', [App\Http\Controllers\ProfilesController::class, 'delete'])->middleware('auth');

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index']);

Route::get('/hotel/', [App\Http\Controllers\HotelsController::class, 'index']);
Route::get('/hotels', [App\Http\Controllers\HotelsController::class, 'hotels']);
