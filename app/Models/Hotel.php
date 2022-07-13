<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'city',
        'address',
        'description',
        'food_with_own_kitchen',
        'food_breakfast_is_included',
        'food_restaurant',
        'internet_free_wifi',
        'internet_fixed',
        'transport_free_parking',
        'transport_paid_parking',
        'transport_e_station',
        'sports_leisure_fitness',
        'sports_leisure_basin',
        'sports_leisure_health_spa',
        'other_pets_allowed',
        'other_cleaning',
        'other_facilities_for_people_with_disabilities',
    ];

    public function getType()
    {
        switch ($this->type) {
            case 'apartment':
                return 'Апартаменти';

            case 'hotel':
                return 'Готель';

            case 'holiday_homes':
                return 'Будинок для відпочинку';

            case 'guest_house':
                return 'Гостьовий будинок';

            case 'hostel':
                return 'Хостел';

            case 'villa':
                return 'Вілла';

            case 'in_a_family':
                return 'Розміщення в сім\'ї';

            case 'bed_and_breakfast':
                return 'Готель типу "ліжко і сніданок"';

            case 'camping':
                return 'Кемпінг';

            case 'country_house':
                return 'Заміський будинок';

            case 'resort_hotel':
                return 'Курортний готель';

            case 'park_hotel':
                return 'Парк-готель';
        }
    }

    public function featuresFood()
    {
        return $this->food_with_own_kitchen or
            $this->food_breakfast_is_included or
            $this->food_restaurant;
    }

    public function featuresInternet()
    {
        return $this->internet_free_wifi or
            $this->internet_fixed;
    }

    public function featuresTransport()
    {
        return $this->transport_free_parking or
            $this->transport_paid_parking or
            $this->transport_e_station;
    }

    public function featuresSportsLeisure()
    {
        return $this->sports_leisure_fitness or
            $this->sports_leisure_basin or
            $this->sports_leisure_health_spa;
    }

    public function featuresOther()
    {
        return $this->other_pets_allowed or
            $this->other_cleaning or
            $this->other_facilities_for_people_with_disabilities;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function hotelPhotos()
    {
        return $this->hasMany(HotelPhoto::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($hotel) {
            $hotel->reviews->each->delete();

            foreach ($hotel->hotelPhotos as $hotelPhoto) {
                $hotelPhoto->delete();
                Storage::disk('public')->delete($hotelPhoto->image);
            }
        });
    }
}
