<?php

namespace App\Models;

use App\Http\Controllers\HotelsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAvatar()
    {
        if ($this->avatar) {
            return '/storage/' . $this->avatar;
        } elseif ($this->name) {
            return "https://eu.ui-avatars.com/api/?name=" . $this->name . "&background=random&format=svg";
        } else {
            return "https://eu.ui-avatars.com/api/?name=" . substr($this->user->email, 0, 2) . "&background=random&format=svg";
        }
    }

    public function getCountryName()
    {
        if ($this->country) {
            return DB::table('countries')
                ->where('code', $this->country)
                ->first()
                ->name;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($profile) {
            $profile->reviews->each->delete();
            $profile->bookings->each->delete();
        });
    }
}
