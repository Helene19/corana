<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'admin',
        'gender',
        'birthdate',
        'phonenumber',
        'sv_number',
        'vaccinated',
        'street',
        'streetnr',
        'city',
        'postcode',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * user could have one or none vaccination
     */
    public function userVaccinations() : BelongsToMany {
        return $this->belongsToMany(Vaccination::class)->withTimestamps();
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims() {
        return ['user' => ['id' => $this->id, 'admin' => $this->admin]];
    }
}
