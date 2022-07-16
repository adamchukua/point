<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(Hotel $hotel)
    {
        $reviews = $hotel->reviews()->latest()->paginate(15);

        return view('reviews.index', compact('hotel', 'reviews'));
    }

    public function create(Booking $booking)
    {
        if (!auth()->user()->profile->bookings->contains($booking)) {
            return redirect('/profile/bookings');
        }

        return view('reviews.create', compact('booking'));
    }

    public function store(Booking $booking)
    {
        $user = auth()->user();

        if (!$user->profile->bookings->contains($booking)) {
            return redirect('/profile/bookings');
        }

        $data = request()->validate([
            'title' => 'max:255',
            'text' => ['required', 'max:1000'],
            'pros' => 'max:500',
            'cons' => 'max:500',
            'personnel_mark' => ['required', 'integer', 'between:0,10'],
            'comfort_mark' => ['required', 'integer', 'between:0,10'],
            'free_wifi_mark' => ['required', 'integer', 'between:0,10'],
            'amenities_mark' => ['required', 'integer', 'between:0,10'],
            'price_quality_mark' => ['required', 'integer', 'between:0,10'],
            'purity_mark' => ['required', 'integer', 'between:0,10'],
            'location_mark' => ['required', 'integer', 'between:0,10'],
            'stars' => ['required', 'integer', 'between:1,5'],
        ]);

        $booking->review()->create(array_merge($data, [
            'profile_id' => $user->profile->id,
            'hotel_id' => $booking->hotel->id,
            'booking_id' => $booking->id,
        ]));

        return redirect('/profile/reviews');
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review);

        return view('reviews.edit', compact('review'));
    }

    public function update(Review $review)
    {
        $this->authorize('update', $review);

        $data = request()->validate([
            'title' => 'max:255',
            'text' => ['required', 'max:1000'],
            'pros' => 'max:500',
            'cons' => 'max:500',
            'personnel_mark' => ['required', 'integer', 'between:0,10'],
            'comfort_mark' => ['required', 'integer', 'between:0,10'],
            'free_wifi_mark' => ['required', 'integer', 'between:0,10'],
            'amenities_mark' => ['required', 'integer', 'between:0,10'],
            'price_quality_mark' => ['required', 'integer', 'between:0,10'],
            'purity_mark' => ['required', 'integer', 'between:0,10'],
            'location_mark' => ['required', 'integer', 'between:0,10'],
            'stars' => ['required', 'integer', 'between:1,5'],
        ]);

        $review->update($data);

        return redirect('/profile/reviews');
    }

    public function delete(Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return redirect('/profile/reviews');
    }
}
