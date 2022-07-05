<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index(Hotel $hotel)
    {
        return view('hotels.index', compact('hotel'));
    }

    public function hotels()
    {
        return view('hotels.hotels');
    }

    public function create()
    {
        return view('hotels.create');
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

        redirect('/profile/apartments');
    }
}
