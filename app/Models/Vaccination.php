<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccination_nr',
        'date',
        'starttime',
        'endtime',
        'max_participants',
        'vaccination_type',
        'vaccination_place'];

    /**
     * At one vaccination place there could be multiple vaccinations
     */
    public function vaccinationPlace() : BelongsTo
    {
        return $this->belongsTo(VaccinationPlace::class, 'vaccination_place');
    }

    /**
     * Vaccination belongs to more or none users
     */
    public function vaccinationUsers() : BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
