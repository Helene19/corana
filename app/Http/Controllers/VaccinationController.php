<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vaccination;
use App\Models\VaccinationPlace;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaccinationController extends Controller
{
    public function index() {
        $vaccinations = Vaccination::with('vaccinationPlace', 'vaccinationUsers')->get();
        return $vaccinations;
    }

    public function show(Vaccination $vaccination) {
        return view('vaccinations.show', compact('vaccination'));
    }

    public function findByVaccinationNr(int $vaccinationNr) : Vaccination {
        $vaccination = Vaccination::where('vaccination_nr', $vaccinationNr)->
                        with(['vaccinationPlace', 'vaccinationUsers'])->first();
        return $vaccination;
    }

    public function save (Request $request) : JsonResponse {
        $request = $this->parseRequest($request);

        DB::beginTransaction();
        try {

            $vaccination = Vaccination::create($request->all());

            //save place
            if (isset($request['vaccination_place']) && is_array($request['vaccination_place'])) {
                $vaccinationPlace = $request['vaccination_place'];
                $vaccinationPlaceNew = VaccinationPlace::firstOrNew(['vaccination_place_nr' =>
                    $vaccinationPlace['vaccination_place_nr'], 'street' => $vaccinationPlace['street'],
                    'streetnr' => $vaccinationPlace['streetnr'], 'city' => $vaccinationPlace['city'],
                    'postcode' => $vaccinationPlace['postcode'], 'state' => $vaccinationPlace['state'],
                    'description' => $vaccinationPlace['description'], ]);
                $vaccination->vaccinationPlace()->save($vaccinationPlaceNew);

            }

            //save user
            /*if (isset($request['vaccinationUsers']) && is_array($request['vaccinationUsers'])) {
                foreach ($request['vaccinationUsers'] as $vacUser) {
                    $user =
                        User::firstOrNew(['first_name' => $vacUser['first_name'], 'last_name' => $vacUser['last_name'],
                            'admin' => $vacUser['admin'], 'gender' => $vacUser['gender'], 'birthdate' => $vacUser['birthdate'],
                            'phonenumber' => $vacUser['phonenumber'], 'sv_number' => $vacUser['sv_number'],
                            'vaccinated' => $vacUser['vaccinated'], 'street' => $vacUser['street'],
                            'streetnr' => $vacUser['streetnr'], 'city' => $vacUser['city'],
                            'postcode' => $vacUser['postcode'], 'email' => $vacUser['email'],
                            'password' => $vacUser['password'],]);
                    $vaccination->vaccinationUsers()->attach($user);
                    $vaccination->save();
                }
            }*/

            DB::commit();
            return response()->json($vaccination, 201);


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("saving vaccination failed: ". $e->getMessage(), 420);
        }
    }

    public function update(Request $request, int $vaccinationNr) : JsonResponse {

        DB::beginTransaction();

        try {

            $vaccination = Vaccination::where('vaccination_nr', $vaccinationNr)->
                with(['vaccinationPlace', 'vaccinationUsers'])->first();

            if($vaccination != null) {
                $request = $this->parseRequest($request);
                $vaccination->update($request->all());

                $vaccination->vaccinationPlace()->delete();

                //save Place
                if (isset($request['vaccination_place']) && is_array($request['vaccination_place'])) {
                    $vaccinationPlace = $request['vaccination_place'];
                    $vaccinationPlaceNew = VaccinationPlace::firstOrNew(['vaccination_place_nr' =>
                        $vaccinationPlace['vaccination_place_nr'], 'street' => $vaccinationPlace['street'],
                        'streetnr' => $vaccinationPlace['streetnr'], 'city' => $vaccinationPlace['city'],
                        'postcode' => $vaccinationPlace['postcode'], 'state' => $vaccinationPlace['state'],
                        'description' => $vaccinationPlace['description'], ]);
                    $vaccination->vaccinationPlace()->save($vaccinationPlaceNew);
                }

                $ids = [];
                //save users
                if (isset($request['users']) && is_array($request['users'])) {
                    foreach ($request['users'] as $user) {
                        array_push($ids, $user['id']);
                    }
                }

                $vaccination->vaccinationUsers()->sync($ids);
                $vaccination->save();

            }

            DB::commit();
            $vaccination1 = Vaccination::with(['vaccinationPlace', 'vaccinationUsers'])
                ->where('vaccination_nr', $vaccinationNr)->first();
            return response()->json($vaccination1, 201);


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("update vaccination failed: ". $e->getMessage(), 420);
        }
    }

    public function delete(int $vaccinationNr) : JsonResponse {

        try {

            $vaccination = Vaccination::where('vaccination_nr', $vaccinationNr)->first();

            if($vaccination != null) {
                $vaccination->delete();
            } else {
                throw new \Exception("vaccination does not exist");
            }

            return response()->json('vaccination ('.$vaccinationNr.') successfully deleted', 200);


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("delete vaccination failed: ". $e->getMessage(), 420);
        }

    }

    /*public function saveUser(int $vaccinationNr) : JsonResponse {
        DB::beginTransaction();

        try {
            $vaccination = Vaccination::where('vaccination_nr', $vaccinationNr)->
            with(['vaccinationPlace', 'vaccinationUsers'])->first();

            if($vaccination != null) {

            } else {
                throw new \Exception("vaccination does not exist");
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("save user to vaccination failed: ". $e->getMessage(), 420);
        }
    }*/

    /**
     * modify / convert values if needed
     */

    private function parseRequest(Request $request) : Request {

        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->published);
        $request['published'] = $date;

        return $request;

    }

}
