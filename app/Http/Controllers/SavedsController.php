<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SavedsController extends Controller
{
    public function store(Hotel $hotel)
    {
        $user = auth()->user();

        $savedStatus = count(DB::table('saveds')
            ->where('user_id', '=', $user->id)
            ->where('hotel_id', '=', $hotel->id)
            ->get());

        if ($savedStatus) {
            DB::table('saveds')
                ->where('user_id', '=', $user->id)
                ->where('hotel_id', '=', $hotel->id)
                ->delete();

            return 'unsaved';
        } else {
            DB::table('saveds')->insert([
                'user_id' => $user->id,
                'hotel_id' => $hotel->id
            ]);

            return 'saved';
        }
    }

    public function unsave(Saved $saved)
    {
        $saved->delete();

        return redirect('/profile/saved');
    }
}
