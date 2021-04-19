<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'starttime', 'endtime', 'max_participants', 'vaccination_type'];

    /**
     *  Vaccination can only be at one Place
     */
    public function vaccinationPlace() : BelongsTo
    {
        return $this->belongsTo(VaccinationPlace::class, 'vaccination_place');
    }

    /**
     * vaccination belongs to one or none user
     */
    public function users() : BelongsToMany {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
