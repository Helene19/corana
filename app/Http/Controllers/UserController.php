<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUserById(int $userId) : User {
        $user = User::where('id', $userId)->with('userVaccinations')->first();
        return $user;
    }

    public function editToVaccinated(Request $request, int $userId) : JsonResponse {

        DB::beginTransaction();

        try {

            $user = User::where('id', $userId)->first();

            if($user != null) {
                $request = $this->parseRequest($request);
                $user->update($request->all());

                $user->save();

            } else {
                throw new \Exception("user does not exist");
            }

            DB::commit();
            $user1 = User::where('id', $userId)->first();
            return response()->json($user1, 201);


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("change user to vaccinated failed: ". $e->getMessage(), 420);
        }

    }

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
