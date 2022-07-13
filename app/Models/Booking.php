<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function getStatusText()
    {
        return match ($this->status) {
            0 => 'Очікує на схвалення',
            1 => 'Схвалено',
            2 => 'Відмовлено',
            3 => 'Виконано',
            4 => 'Скасовано',
            default => 'Немає даних',
        };
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($booking) {
            auth()->user()->notifications()->create([
                'title' => 'Запит на бронювання подано',
                'text' => 'Невдовзі власник ' . $booking->room->hotel->name . ' розгляне Ваш запит, результат очікуйте в своєму профілі та в сповіщеннях',
            ]);

            $booking->profile->user->notifications()->create([
                'title' => 'Новий запит на бронювання ' . $booking->room->hotel->name . '!',
                'text' => 'Користувач ' . $booking->profile->name . ' подав запит на бронювання ' . $booking->room->hotel->name . ', надайте відповідь у своєму профілі',
            ]);
        });
    }
}
