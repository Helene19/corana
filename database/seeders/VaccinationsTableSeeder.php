<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use App\Models\VaccinationPlace;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class VaccinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get all users
        $users = \App\Models\User::all();

        // add vaccinations
        $vaccination1 = new Vaccination();
        $vaccination1->vaccination_nr = 1;
        $vaccination1->date = new DateTime('2021-07-12');
        $vaccination1->starttime = '09:00';
        $vaccination1->endtime = '10:00';
        $vaccination1->max_participants = 2;
        $vaccination1->vaccination_type = "Biontech/Pfizer";

        // relationship between vaccination and vaccination place
        $vaccination1->vaccinationPlace()->associate(1);
        $vaccination1->save();

        $vaccination2 = new Vaccination();
        $vaccination2->vaccination_nr = 2;
        $vaccination2->date = new DateTime('2021-07-12');
        $vaccination2->starttime = '14:15';
        $vaccination2->endtime = '14:45';
        $vaccination2->max_participants = 2;
        $vaccination2->vaccination_type = "Biontech/Pfizer";

        // relationship between vaccination and vaccination place
        $vaccination2->vaccinationPlace()->associate(2);
        $vaccination2->save();

        // add users to vaccination
        $user1 = $users->where('id', 4);
        $user2 = $users->where('id', 6);
        $vaccination2->vaccinationUsers()->attach($user1);
        $vaccination2->vaccinationUsers()->attach($user2);
        $vaccination2->save();

        $vaccination3 = new Vaccination();
        $vaccination3->vaccination_nr = 3;
        $vaccination3->date = new DateTime('2021-07-13');
        $vaccination3->starttime = '08:30';
        $vaccination3->endtime = '10:00';
        $vaccination3->max_participants = 6;
        $vaccination3->vaccination_type = "Astraceneca";

        // relationship between vaccination and vaccination place
        $vaccination3->vaccinationPlace()->associate(3);
        $vaccination3->save();

        $vaccination4 = new Vaccination();
        $vaccination4->vaccination_nr = 4;
        $vaccination4->date = new DateTime('2021-07-14');
        $vaccination4->starttime = '09:20';
        $vaccination4->endtime = '12:00';
        $vaccination4->max_participants = 8;
        $vaccination4->vaccination_type = "Astracenca";

        // relationship between vaccination and vaccination place
        $vaccination4->vaccinationPlace()->associate(4);
        $vaccination4->save();

        $vaccination5 = new Vaccination();
        $vaccination5->vaccination_nr = 5;
        $vaccination5->date = new DateTime('2021-07-14');
        $vaccination5->starttime = '08:00';
        $vaccination5->endtime = '09:10';
        $vaccination5->max_participants = 3;
        $vaccination5->vaccination_type = "Moderna";

        // relationship between vaccination and vaccination place
        $vaccination5->vaccinationPlace()->associate(1);
        $vaccination5->save();

        // add user to vaccination
        $user3 = $users->where('id', 7);
        $user4 = $users->where('id', 8);
        $vaccination5->vaccinationUsers()->attach($user3);
        $vaccination5->vaccinationUsers()->attach($user4);
        $vaccination5->save();

        $vaccination6 = new Vaccination();
        $vaccination6->vaccination_nr = 6;
        $vaccination6->date = new DateTime('2021-07-12');
        $vaccination6->starttime = '13:00';
        $vaccination6->endtime = '15:00';
        $vaccination6->max_participants = 5;
        $vaccination6->vaccination_type = "Moderna";
        // relationship between vaccination and vaccination place
        $vaccination1->vaccinationPlace()->associate(2);
        $vaccination1->save();


    }
}
