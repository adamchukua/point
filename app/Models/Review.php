<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /*
    public function getAveragePersonellMark()
    {
        return $this->avg('personnel_mark');
    }

    public function getAverageComfortMark()
    {
        return $this->avg('comfort_mark');
    }

    public function getAverageFreeWifiMark()
    {
        return $this->avg('free_wifi_mark');
    }

    public function getAverageAmenitiesMark()
    {
        return $this->avg('amenities_mark');
    }

    public function getAveragePriceQualityMark()
    {
        return $this->avg('price_quality_mark');
    }

    public function getAveragePurityMark()
    {
        return $this->avg('purity_mark');
    }

    public function getAverageLocationMark()
    {
        return $this->avg('location_mark');
    }

    public function getAverageOverallMark()
    {
        return 0;
    }*/

    public function getAverageOverallMarkText()
    {
        switch ($this->getAverageOverallMark()) {
            case 0:
                return 'Жах';
        }
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
