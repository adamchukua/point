<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function create()
    {
        return view('reviews.create');
    }

    public function store()
    {

    }

    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    public function update(Review $review)
    {

    }

    public function delete(Review $review)
    {
        $review->delete();

        return redirect('/profile/reviews');
    }
}
