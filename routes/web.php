<?php

use Illuminate\Support\Facades\DB;
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
    $cities = DB::table('cities')->get();
    $topCities = \App\Models\Hotel::select('city', DB::raw('count(*)'))
        ->groupBy('city')
        ->limit(30)
        ->get();

    return view('welcome', compact('cities', 'topCities'));
});

Route::get('/join', function () {
    $hotelsNumber = \App\Models\Hotel::all()->count();
    $bookingsNumber = \App\Models\Booking::query()
        ->where('status', 3)
        ->count();

    return view('join', compact('hotelsNumber', 'bookingsNumber'));
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

    Route::get('/profile/delete', [App\Http\Controllers\ProfilesController::class, 'delete']);

    Route::get('/notifications', [App\Http\Controllers\NotificationsController::class, 'notifications']);
    Route::post('/notifications/{notification}/read', [App\Http\Controllers\NotificationsController::class, 'read']);
    Route::post('/notifications/all-read', [App\Http\Controllers\NotificationsController::class, 'allRead']);

    Route::group(['middleware' => 'verified'], function () {
        Route::get('/profile/bookings/{booking}/review/add', [App\Http\Controllers\ReviewsController::class, 'create']);
        Route::post('/profile/bookings/{booking}/review/add', [App\Http\Controllers\ReviewsController::class, 'store']);

        Route::get('/profile/reviews/{review}/edit', [App\Http\Controllers\ReviewsController::class, 'edit']);
        Route::patch('/profile/reviews/{review}/edit', [App\Http\Controllers\ReviewsController::class, 'update']);
        Route::post('/profile/reviews/{review}/delete', [App\Http\Controllers\ReviewsController::class, 'delete']);

        Route::get('/profile/apartments/create', [App\Http\Controllers\HotelsController::class, 'create']);
        Route::post('/profile/apartments/create', [App\Http\Controllers\HotelsController::class, 'store']);
        Route::post('/profile/apartments/{hotel}/delete', [App\Http\Controllers\HotelsController::class, 'delete']);
        Route::get('/profile/apartments/{hotel}/edit', [App\Http\Controllers\HotelsController::class, 'edit']);
        Route::patch('/profile/apartments/{hotel}/edit', [App\Http\Controllers\HotelsController::class, 'update']);

        Route::get('/profile/apartments/{hotel}/room/create', [App\Http\Controllers\RoomsController::class, 'create']);
        Route::post('/profile/apartments/{hotel}/room/create', [App\Http\Controllers\RoomsController::class, 'store']);
        Route::get('/profile/apartments/room/{room}/edit', [App\Http\Controllers\RoomsController::class, 'edit']);
        Route::patch('/profile/apartments/room/{room}/edit', [App\Http\Controllers\RoomsController::class, 'update']);
        Route::post('/profile/apartments/room/{room}/delete', [App\Http\Controllers\RoomsController::class, 'delete']);

        Route::get('/profile/apartments/{hotel}/bookings', [App\Http\Controllers\BookingsController::class, 'index']);

        Route::post('/booking/{room}/store', [App\Http\Controllers\BookingsController::class, 'store']);
        Route::post('/booking/{booking}/cancel', [App\Http\Controllers\BookingsController::class, 'cancel']);
        Route::post('/booking/{booking}/approve', [App\Http\Controllers\BookingsController::class, 'approve']);
        Route::post('/booking/{booking}/disapprove', [App\Http\Controllers\BookingsController::class, 'disapprove']);
    });
});

Route::get('/profile/{profile}', [App\Http\Controllers\ProfilesController::class, 'index']);

Route::get('/hotel/{hotel}', [App\Http\Controllers\HotelsController::class, 'index']);
Route::get('/hotel/{hotel}/reviews', [App\Http\Controllers\HotelsController::class, 'reviews']);

Route::get('/search', [App\Http\Controllers\HotelsController::class, 'search']);
