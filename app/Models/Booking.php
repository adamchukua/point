<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            default => 'Немає даних',
        };
    }
}
