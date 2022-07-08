<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
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
            'address' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
        ]);

        auth()->user()->hotels()->create([
            'name' => $data['name'],
            'type' => $data['type'],
            'address' => $data['address'],
            'description' => $data['description'],
        ]);

        return redirect('/profile/apartments');
    }
}
