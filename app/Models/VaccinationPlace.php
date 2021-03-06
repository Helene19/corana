<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VaccinationPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccination_place_nr',
        'street',
        'streenr',
        'city',
        'postcode',
        'state',
        'description'];

    /**
     * At one vaccination place there could be multiple vaccinations
     */
    public function vaccinations() : HasMany {
        return $this->hasMany(Vaccination::class, 'vaccination_place');
    }
}
