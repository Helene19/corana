<?php

namespace App\Http\Controllers;

use App\Models\VaccinationPlace;
use Illuminate\Http\Request;

class VaccinationPlaceController extends Controller
{
    public function index() {
        return VaccinationPlace::all();
    }
}
