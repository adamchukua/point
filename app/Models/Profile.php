<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            return "https://eu.ui-avatars.com/api/?name=" . $this->user->email . "&background=random&format=svg";
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
