<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationPlace extends Model
{
    use HasFactory;

    protected $fillable = ['street', 'streenr', 'city', 'postcode', 'state', 'description'];
}
