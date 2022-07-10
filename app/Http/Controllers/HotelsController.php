<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelPhoto;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{
    public function index(Hotel $hotel)
    {
        $user = auth()->user();
        $reviews = Review::where('hotel_id', $hotel->id)->get();
        $savedStatus = $user != null ? count(DB::table('saveds')
            ->where('user_id', '=', $user->id)
            ->where('hotel_id', '=', $hotel->id)
            ->get()) > 0 : null;

        return view('hotels.index', compact('hotel', 'reviews', 'savedStatus'));
    }

    public function hotels()
    {
        $hotels = Hotel::all();

        return view('hotels.hotels', compact('hotels'));
    }

    public function create()
    {
        $cities = DB::table('cities')->get();

        return view('hotels.create', compact('cities'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'max:255'],
            'type' => ['required', 'max:40'],
            'city' => ['required', 'max:50'],
            'address' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'food_with_own_kitchen' => 'boolean',
            'food_breakfast_is_included' => 'boolean',
            'food_restaurant' => 'boolean',
            'internet_free_wifi' => 'boolean',
            'internet_fixed' => 'boolean',
            'transport_free_parking' => 'boolean',
            'transport_paid_parking' => 'boolean',
            'transport_e_station' => 'boolean',
            'sports_leisure_fitness' => 'boolean',
            'sports_leisure_basin' => 'boolean',
            'sports_leisure_health_spa' => 'boolean',
            'other_pets_allowed' => 'boolean',
            'other_cleaning' => 'boolean',
            'other_facilities_for_people_with_disabilities' => 'boolean',
            'photos' => ['required', 'array'],
            'photos.*' => ['required', 'mimes:jpg,jpeg,png,bmp', 'max:5120'],
        ]);

        $hotelId = auth()->user()->hotels()->create($data)->id;

        if (request('photos')) {
            foreach(request('photos') as $photo)
            {
                $imagePath = $photo->store('hotelPhotos', 'public');

                HotelPhoto::create([
                    'hotel_id' => $hotelId,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect('/profile/apartments');
    }

    public function delete(Hotel $hotel)
    {
        $hotel->delete();

        return redirect('/profile/apartments');
    }

    public function edit(Hotel $hotel)
    {
        $cities = DB::table('cities')->get();

        return view('hotels.edit', compact('hotel', 'cities'));
    }

    public function update(Hotel $hotel)
    {
        $data = request()->validate([
            'name' => ['required', 'max:255'],
            'type' => ['required', 'max:40'],
            'city' => ['required', 'max:50'],
            'address' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'food_with_own_kitchen' => 'boolean',
            'food_breakfast_is_included' => 'boolean',
            'food_restaurant' => 'boolean',
            'internet_free_wifi' => 'boolean',
            'internet_fixed' => 'boolean',
            'transport_free_parking' => 'boolean',
            'transport_paid_parking' => 'boolean',
            'transport_e_station' => 'boolean',
            'sports_leisure_fitness' => 'boolean',
            'sports_leisure_basin' => 'boolean',
            'sports_leisure_health_spa' => 'boolean',
            'other_pets_allowed' => 'boolean',
            'other_cleaning' => 'boolean',
            'other_facilities_for_people_with_disabilities' => 'boolean',
            'photos' => ['required', 'array'],
            'photos.*' => ['required', 'mimes:jpg,jpeg,png,bmp', 'max:5120'],
        ]);

        $hotel->hotelPhotos->each->delete();
        $hotel->update($data);

        if (request('photos')) {
            foreach(request('photos') as $photo)
            {
                $imagePath = $photo->store('hotelPhotos', 'public');

                HotelPhoto::create([
                    'hotel_id' => $hotel->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect('/profile/apartments');
    }
}
