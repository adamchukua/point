<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function create(Hotel $hotel)
    {
        $room = new Room();
        $room->hotel_id = $hotel->id;
        $room->type = '';
        $room->contains = 0;
        $room->price = 0;

        $this->authorize('create', $room);

        return view('rooms.create', compact('hotel'));
    }

    public function store(Hotel $hotel)
    {
        $room = new Room();
        $room->hotel_id = $hotel->id;
        $room->type = '';
        $room->contains = 0;
        $room->price = 0;

        $this->authorize('create', $room);

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

    public function edit(Room $room)
    {
        $this->authorize('update', $room);

        return view('rooms.edit', compact('room'));
    }

    public function update(Room $room)
    {
        $this->authorize('update', $room);

        $data = request()->validate([
            'type' => ['required', 'max:255'],
            'contains' => ['required', 'integer', 'between:1,100'],
            'price' => ['required', 'max:50', 'between:1,100000'],
            'number' => ['required', 'max:255', 'between:1,10000'],
            'comment' => 'max:1000',
        ]);

        $room->update($data);

        return redirect('/profile/apartments');
    }

    public function delete(Room $room)
    {
        $this->authorize('delete', $room);

        $room->bookings->each->update(['status' => 5]);
        $room->delete();

        return redirect('/profile/apartments');
    }
}
