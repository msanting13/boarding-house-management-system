<?php

namespace App\Models\Landlords;

use App\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\LandlordResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Landlord extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;

    protected $fillable = [
        'email',
        'password',
        'given_name',
        'middle_name',
        'family_name',
        'contact_number',
        'address',
        'photo'
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

    public function getGivenNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFamilyNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getMiddleNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->given_name} {$this->family_name}";
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new LandlordResetPasswordNotification($token));
    }
}
