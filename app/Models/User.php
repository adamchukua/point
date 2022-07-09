<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create();
            $user->notifications()->create([
                'title' => 'Перевірте пошту!',
                'text' => 'Після реєстрації на пошту ' . $user->email . ' прийшов лист з підтвердженням пошти.',
            ]);
        });

        static::deleted(function ($user) {
            $user->profile->delete();
            $user->hotels->each->delete();
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function saveds()
    {
        return $this->hasMany(Saved::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
