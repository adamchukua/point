<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        dd($user);
        return view('profiles.index', compact('user'));
    }

    public function settings()
    {
        $user = auth()->user();

        return view('profiles.settings', compact('user'));
    }

    public function bookings()
    {
        $user = auth()->user();

        return view('profiles.bookings', compact('user'));
    }

    public function reviews()
    {
        $user = auth()->user();

        return view('profiles.reviews', compact('user'));
    }

    public function saved()
    {
        $user = auth()->user();

        return view('profiles.saved', compact('user'));
    }

    public function apartments()
    {
        $user = auth()->user();

        return view('profiles.apartments', compact('user'));
    }

    public function update(User $user)
    {
        //$this->authorize('update', $user->profile);

        $data = request()->validate([
            'name' => 'required',
            'birthdate' => 'date',
            'country' => 'required',
            //'image' => '',
        ]);

        /*if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(150, 150);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }*/

        /*auth()->user()->profile->update(array_merge(
            $data,
            //$imageArray ?? []
        ));*/
        //auth()->user()->profile->update($data);

        $user->profile->update($data);

        return redirect("profile/{$user->id}");
    }
}
