<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function create(Hotel $hotel)
    {
        if ($hotel->user->id != auth()->user()->id) {
            return '/login';
        }

        return view('rooms.create', compact('hotel'));
    }

    public function store(Hotel $hotel)
    {
        if ($hotel->user->id != auth()->user()->id) {
            return '/login';
        }

        $data = request()->validate([
            'type' => ['required', 'max:255'],
            'contains' => ['required', 'integer', 'between:1,100'],
            'price' => ['required', 'max:50', 'between:1,100000'],
            'number' => ['required', 'max:255', 'between:1,10000'],
            'comment' => 'max:1000',
        ]);

        $hotel->rooms()->create($data);

        return redirect('/profile/apartments');
    }
}
