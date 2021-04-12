<?php

namespace Database\Seeders;

use App\Models\VaccinationPlace;
use Illuminate\Database\Seeder;

class VaccinationPlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $place1 = new VaccinationPlace();
        $place1->street = "Römerstraße";
        $place1->streetnr = "12c";
        $place1->city = "Wien";
        $place1->postcode = 1010;
        $place1->state = "Wien";
        $place1->description = "Wiener Krankenhaus - Westflügel";
        $place1->save();

        $place2 = new VaccinationPlace();
        $place2->street = "Vogelgasse";
        $place2->streetnr = "56";
        $place2->city = "Liezen";
        $place2->postcode = 8940;
        $place2->state = "Steiermark";
        $place2->save();

        $place3 = new VaccinationPlace();
        $place3->street = "Bischenstraße";
        $place3->streetnr = "1";
        $place3->city = "Gallspach";
        $place3->postcode = 4713;
        $place3->state = "Oberösterreich";
        $place3->description = "Rotes Kreuz im weißen Gebäude. Beim Empfang anmelden. 15 Minuten früher kommen.";
        $place3->save();

        $place4 = new VaccinationPlace();
        $place4->street = "Loschenstraße";
        $place4->streetnr = "23";
        $place4->city = "Innsbruck";
        $place4->postcode = 6020;
        $place4->state = "Tirol";
        $place4->save();
    }
}
