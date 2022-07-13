<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function store(Room $room)
    {
        auth()->user()->profile->bookings()->create([
            'room_id' => $room->id,
        ]);

        return redirect('/profile/bookings');
    }
}
