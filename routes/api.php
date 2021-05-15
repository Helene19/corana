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

Route::group(['middleware' => ['api', 'auth.jwt']], function(){
    Route::post('vaccination', [\App\Http\Controllers\VaccinationController::class, 'save']);
    Route::put('vaccination/{vaccination_nr}', [\App\Http\Controllers\VaccinationController::class, 'update']);
    Route::delete('vaccination/{vaccination_nr}', [\App\Http\Controllers\VaccinationController::class, 'delete']);
    Route::post('vaccination/registration', [\App\Http\Controllers\VaccinationController::class, 'saveUserToVaccination']);
    Route::put('vaccination/user/{userId}', [\App\Http\Controllers\UserController::class, 'editToVaccinated']);
    Route::post('auth/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::post('auth/login', [\App\Http\Controllers\AuthController::class,'login']);
Route::get('vaccinations', [\App\Http\Controllers\VaccinationController::class, 'index']);
Route::get('vaccinationplaces', [\App\Http\Controllers\VaccinationPlaceController::class, 'index']);
Route::get('vaccination/{vaccination_nr}', [\App\Http\Controllers\VaccinationController::class, 'findByVaccinationNr']);
Route::get('user/{userId}', [\App\Http\Controllers\UserController::class, 'getUserById']);
Route::get('vaccination/checkNr/{vaccination_nr}', [\App\Http\Controllers\VaccinationController::class, 'checkVaccinationNr']);

