<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAverageMark()
    {
        $reviewAverageMark = ($this->personnel_mark +
                $this->comfort_mark +
                $this->free_wifi_mark +
                $this->amenities_mark +
                $this->price_quality_mark +
                $this->purity_mark +
                $this->location_mark) / 7;

        return floor($reviewAverageMark * 10) / 10;
    }

    public function getAverageMarkText($reviewAverageMark)
    {
        return match (intval(round($reviewAverageMark))) {
            0, 1, 2, 3, 4, 5 => 'Незадовільно',
            6 => 'Досить добре',
            7 => 'Добре',
            8 => 'Дуже добре',
            9 => 'Чудово',
            10 => 'Відмінно',
            default => 'Немає даних',
        };
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
