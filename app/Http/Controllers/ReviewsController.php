<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function create(Booking $booking)
    {
        $this->authorize('create', $booking);

        return view('reviews.create');
    }

    public function store(Booking $booking)
    {
        $this->authorize('create', $booking);

        //

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
            //'stars' => ['required', 'integer', 'between:1,5'],
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
