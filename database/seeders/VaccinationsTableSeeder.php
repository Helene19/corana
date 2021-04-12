<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use DateTime;
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
        $vaccination1 = new Vaccination();
        $vaccination1->date = new DateTime('2021-07-12');
        $vaccination1->starttime = '09:00';
        $vaccination1->endtime = '13:00';
        $vaccination1->max_participants = 16;
        $vaccination1->vaccination_type = "Biontech/Pfizer";

        $vaccination2 = new Vaccination();
        $vaccination2->date = new DateTime('2021-07-12');
        $vaccination2->starttime = '14:00';
        $vaccination2->endtime = '17:00';
        $vaccination2->max_participants = 12;
        $vaccination2->vaccination_type = "Biontech/Pfizer";

        $vaccination3 = new Vaccination();
        $vaccination3->date = new DateTime('2021-07-13');
        $vaccination3->starttime = '08:00';
        $vaccination3->endtime = '12:00';
        $vaccination3->max_participants = 16;
        $vaccination3->vaccination_type = "Astraceneca";

        $vaccination4 = new Vaccination();
        $vaccination4->date = new DateTime('2021-07-14');
        $vaccination4->starttime = '09:00';
        $vaccination4->endtime = '15:00';
        $vaccination4->max_participants = 24;
        $vaccination4->vaccination_type = "Astracenca";

        $vaccination5 = new Vaccination();
        $vaccination5->date = new DateTime('2021-07-14');
        $vaccination5->starttime = '08:00';
        $vaccination5->endtime = '11:00';
        $vaccination5->max_participants = 12;
        $vaccination5->vaccination_type = "Moderna";

        $vaccination6 = new Vaccination();
        $vaccination6->date = new DateTime('2021-07-12');
        $vaccination6->starttime = '13:00';
        $vaccination6->endtime = '15:00';
        $vaccination6->max_participants = 8;
        $vaccination6->vaccination_type = "Moderna";


    }
}
