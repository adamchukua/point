<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function store(Room $room)
    {
        $data = request()->validate([
            'arrival' => ['required', 'date'],
            'departure' => ['required', 'date'],
            'peopleNumber' => ['required', 'integer', 'between:1,100'],
            //'roomsNumber' => ['integer', 'between:1,100'],
        ]);

        for ($i = 0; $i < $data['peopleNumber']; $i += $room->contains) {
            auth()->user()->profile->bookings()->create([
                'room_id' => $room->id,
                'arrival' => $data['arrival'],
                'departure' => $data['departure']
            ]);
        }

        return redirect('/profile/bookings');
    }

    public function cancel(Booking $booking)
    {
        $booking->status = 4;
        $booking->save();

        $booking->room->hotel->user->notifications()->create([
            'title' => 'Запит на бронювання #' . $booking->id . ' скасовано!',
            'text' => 'Зверніть увагу, користувач ' . $booking->profile->name . ' скасував запит на бронювання',
        ]);

        return redirect('/profile/bookings');
    }
}
