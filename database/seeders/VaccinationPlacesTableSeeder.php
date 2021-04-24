<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use App\Models\VaccinationPlace;
use DateTime;
use Illuminate\Database\Seeder;

class VaccinationPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // add vaccination places
        $place1 = new VaccinationPlace();
        $place1->vaccination_place_nr = 1;
        $place1->street = "Römerstraße";
        $place1->streetnr = "12c";
        $place1->city = "Wien";
        $place1->postcode = 1010;
        $place1->state = "Wien";
        $place1->description = "Wiener Krankenhaus - Westflügel";
        $place1->save();

        $place2 = new VaccinationPlace();
        $place2->vaccination_place_nr = 2;
        $place2->street = "Vogelgasse";
        $place2->streetnr = "56";
        $place2->city = "Liezen";
        $place2->postcode = 8940;
        $place2->state = "Steiermark";
        $place2->save();

        $place3 = new VaccinationPlace();
        $place3->vaccination_place_nr = 3;
        $place3->street = "Bischenstraße";
        $place3->streetnr = "1";
        $place3->city = "Gallspach";
        $place3->postcode = 4713;
        $place3->state = "Oberösterreich";
        $place3->description = "Rotes Kreuz im weißen Gebäude. Beim Empfang anmelden. 15 Minuten früher kommen.";
        $place3->save();

        $place4 = new VaccinationPlace();
        $place4->vaccination_place_nr = 4;
        $place4->street = "Loschenstraße";
        $place4->streetnr = "23";
        $place4->city = "Innsbruck";
        $place4->postcode = 6020;
        $place4->state = "Tirol";
        $place4->save();

        // add vaccinations
        $vaccination1 = new Vaccination();
        $vaccination1->vaccination_nr = 1;
        $vaccination1->date = new DateTime('2021-07-12');
        $vaccination1->starttime = '09:00';
        $vaccination1->endtime = '13:00';
        $vaccination1->max_participants = 16;
        $vaccination1->vaccination_type = "Biontech/Pfizer";

        $vaccination2 = new Vaccination();
        $vaccination2->vaccination_nr = 2;
        $vaccination2->date = new DateTime('2021-07-12');
        $vaccination2->starttime = '14:00';
        $vaccination2->endtime = '17:00';
        $vaccination2->max_participants = 12;
        $vaccination2->vaccination_type = "Biontech/Pfizer";

        $vaccination3 = new Vaccination();
        $vaccination3->vaccination_nr = 3;
        $vaccination3->date = new DateTime('2021-07-13');
        $vaccination3->starttime = '08:00';
        $vaccination3->endtime = '12:00';
        $vaccination3->max_participants = 16;
        $vaccination3->vaccination_type = "Astraceneca";

        $vaccination4 = new Vaccination();
        $vaccination4->vaccination_nr = 4;
        $vaccination4->date = new DateTime('2021-07-14');
        $vaccination4->starttime = '09:00';
        $vaccination4->endtime = '15:00';
        $vaccination4->max_participants = 24;
        $vaccination4->vaccination_type = "Astracenca";

        $vaccination5 = new Vaccination();
        $vaccination5->vaccination_nr = 5;
        $vaccination5->date = new DateTime('2021-07-14');
        $vaccination5->starttime = '08:00';
        $vaccination5->endtime = '11:00';
        $vaccination5->max_participants = 12;
        $vaccination5->vaccination_type = "Moderna";

        $vaccination6 = new Vaccination();
        $vaccination6->vaccination_nr = 6;
        $vaccination6->date = new DateTime('2021-07-12');
        $vaccination6->starttime = '13:00';
        $vaccination6->endtime = '15:00';
        $vaccination6->max_participants = 8;
        $vaccination6->vaccination_type = "Moderna";

        // add vacciantions to vaccinations places
        $place1->vaccinations()->saveMany([$vaccination1, $vaccination5]);
        $place1->save();

        $place2->vaccinations()->saveMany([$vaccination2, $vaccination6]);
        $place2->save();

        $place3->vaccinations()->save($vaccination3);
        $place3->save();

        $place4->vaccinations()->save($vaccination4);
        $place4->save();

        // add users to vaccinations
        $users = \App\Models\User::all();

        $user1 = $users->where('id', 4);
        $user2 = $users->where('id', 6);
        $user3 = $users->where('id', 7);

        $vaccination2->vaccinationUsers()->attach($user1);
        $vaccination2->vaccinationUsers()->attach($user2);
        $vaccination2->save();
        $vaccination5->vaccinationUsers()->attach($user3);
        $vaccination5->save();


    }
}
