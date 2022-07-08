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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/settings', [App\Http\Controllers\ProfilesController::class, 'settings']);
    Route::patch('/profile/settings', [App\Http\Controllers\ProfilesController::class, 'update']);

    Route::get('/profile/bookings', [App\Http\Controllers\ProfilesController::class, 'bookings']);

    Route::get('/profile/reviews', [App\Http\Controllers\ProfilesController::class, 'reviews']);

    Route::get('/profile/saved', [App\Http\Controllers\ProfilesController::class, 'saved']);
    Route::post('/profile/saveHotel/{hotel}', [App\Http\Controllers\SavedsController::class, 'store']);
    Route::post('/profile/unsaveHotel/{saved}', [App\Http\Controllers\SavedsController::class, 'unsave']);

    Route::get('/profile/apartments', [App\Http\Controllers\ProfilesController::class, 'apartments']);
    Route::get('/profile/apartments/create', [App\Http\Controllers\HotelsController::class, 'create'])->middleware('verified');
    Route::post('/profile/apartments/create', [App\Http\Controllers\HotelsController::class, 'store'])->middleware('verified');

    Route::get('/profile/delete', [App\Http\Controllers\ProfilesController::class, 'delete']);

    //Route::get('/notifications', [App\Http\Controllers\::class, 'notifications']);
});

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index']);

Route::get('/hotel/{hotel}', [App\Http\Controllers\HotelsController::class, 'index']);
Route::get('/hotels', [App\Http\Controllers\HotelsController::class, 'hotels']);
