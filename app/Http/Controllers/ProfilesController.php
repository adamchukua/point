<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Profile;
use App\Models\Saved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function settings()
    {
        $user = auth()->user();
        $countries = DB::table('countries')->get();

        return view('profiles.settings', compact('user', 'countries'));
    }

    public function bookings()
    {
        $bookings = auth()->user()->profile->bookings()->latest()->paginate(10);

        return view('profiles.bookings', compact('bookings'));
    }


    public function reviews()
    {
        $reviews = auth()->user()->profile->reviews()->latest()->paginate(10);

        return view('profiles.reviews', compact('reviews'));
    }

    public function saved()
    {
        $saveds = auth()->user()->saveds()->latest()->paginate(10);

        return view('profiles.saved', compact( 'saveds'));
    }

    public function apartments()
    {
        $user = auth()->user();
        $hotels = $user->hotels()->latest()->paginate(10);

        return view('profiles.apartments', compact('user', 'hotels'));
    }

    public function update()
    {
        $user = auth()->user();

        $data = request()->validate([
            'name' => ['string', 'nullable', 'max:255'],
            'birthdate' => ['date', 'nullable'],
            'country' => ['string', 'nullable'],
            'avatar' => '',
        ]);

        if (request('avatar')) {
            $imagePath = request('avatar')->store('avatars', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))
                ->fit(250, 250);
            $image->save();

            $imageInArray = ['avatar' => $imagePath];
        }

        $user->profile->update(array_merge(
            $data,
            $imageInArray ?? []
        ));

        return redirect("profile/settings");
    }

    public function delete()
    {
        $user = auth()->user();

        $user->delete();

        return redirect('/');
    }
}
