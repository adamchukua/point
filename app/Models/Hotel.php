<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'address',
        'description',
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

    public function user()
    {
        return $this->belongsTo(Profile::class);
    }
}
