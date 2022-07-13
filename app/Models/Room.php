<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user, $hotel) {
            $user->notifications()->create([
                'title' => 'Запит на бронювання подано',
                'text' => 'Власник ' . $hotel->name . ' невдовзі перевірить Ваш запит. Результат очікуйте в профілі та в сповіщеннях',
            ]);
        });

        static::deleted(function ($user) {
            //
        });
    }
}
