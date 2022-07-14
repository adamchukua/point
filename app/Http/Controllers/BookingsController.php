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
        // Check if there is free rooms
        if ($room->bookings()->where('status', 1)->count() > $room->number) {
            return redirect()->back();
        }

        $data = request()->validate([
            'arrival' => ['required', 'date'],
            'departure' => ['required', 'date'],
            'peopleNumber' => ['required', 'integer', 'between:1,100'],
            //'roomsNumber' => ['integer', 'between:1,100'],
        ]);

        for ($i = 0; $i < $data['peopleNumber']; $i += $room->contains) {
            auth()->user()->profile->bookings()->create([
                'hotel_id' => $room->hotel->id,
                'room_id' => $room->id,
                'arrival' => $data['arrival'],
                'departure' => $data['departure']
            ]);
        }

        return redirect('/profile/bookings');
    }

    public function cancel(Booking $booking)
    {
        // TODO: policy

        $booking->status = 4;
        $booking->save();

        $booking->room->hotel->user->notifications()->create([
            'title' => 'Запит на бронювання #' . $booking->id . ' скасовано!',
            'text' => "Зверніть увагу, бронювання #" .
                $booking->id . " <a href='/hotel/" . $booking->hotel->id . "'>" .
                $booking->hotel->name . "</a> скасовано!"
        ]);

        $booking->profile->user->notifications()->create([
            'title' => 'Запит на бронювання #' . $booking->id . ' скасовано!',
            'text' => "Зверніть увагу, бронювання #" .
                $booking->id . " <a href='/hotel/" . $booking->hotel->id . "'>" .
                $booking->hotel->name . "</a> скасовано!"
        ]);

        return redirect()->back();
    }

    public function index(Hotel $hotel)
    {
        // TODO: if there isn't any bookings then it will not working
        $this->authorize('viewAny', $hotel->bookings()->first());

        $bookings = $hotel->bookings()->latest()->paginate(15);

        return view('bookings.index', compact('bookings', 'hotel'));
    }

    public function approve(Booking $booking)
    {
        $this->authorize('update', $booking);

        $booking->status = 1;
        $booking->save();

        $booking->profile->user->notifications()->create([
            'title' => 'Запит на бронювання #' . $booking->id . ' схвалено!',
            'text' => "Вітаємо! Власник <a href='/hotel/" .
                $booking->hotel->id . "'>" .
                $booking->hotel->name . "</a>" .
                " схвалив Ваш запит #" .
                $booking->id . " на бронювання",
        ]);

        return redirect('/profile/apartments/' . $booking->hotel->id . '/bookings');
    }

    public function disapprove(Booking $booking)
    {
        $this->authorize('update', $booking);

        $booking->status = 2;
        $booking->save();

        $booking->profile->user->notifications()->create([
            'title' => 'Відмова запиту на бронювання #' . $booking->id,
            'text' => "Власник <a href='/hotel/" .
                $booking->hotel->id . "'>" .
                $booking->hotel->name . "</a>" .
                " відповів відмовою на Ваш запит #" .
                $booking->id . " на бронювання",
        ]);

        return redirect('/profile/apartments/' . $booking->hotel->id . '/bookings');
    }
}
