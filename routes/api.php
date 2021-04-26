<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vaccinations', [\App\Http\Controllers\VaccinationController::class, 'index']);
Route::get('vaccination/{vaccination_nr}', [\App\Http\Controllers\VaccinationController::class, 'findByVaccinationNr']);
Route::post('vaccination', [\App\Http\Controllers\VaccinationController::class, 'save']);
Route::put('vaccination/{vaccination_nr}', [\App\Http\Controllers\VaccinationController::class, 'update']);
