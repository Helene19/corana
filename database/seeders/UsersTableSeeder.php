<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = new User();
        $admin1->first_name = "Lisa";
        $admin1->last_name = "Müller";
        $admin1->admin = true;
        $admin1->gender = "weiblich";
        $admin1->birthdate = new DateTime('1990-05-10');
        $admin1->phonenumber = "06501234567";
        $admin1->sv_number = "1005901234";
        $admin1->vaccinated = false;
        $admin1->street = "Elisabethstraße";
        $admin1->streetnr = "3a";
        $admin1->city = "St. Florian";
        $admin1->postcode = 4490;
        $admin1->email = "lisa.mueller@gmail.com";
        $admin1->password = bcrypt('lisa');
        $admin1->save();

        $admin2 = new User();
        $admin2->first_name = "Thomas";
        $admin2->last_name = "Huber";
        $admin2->admin = true;
        $admin2->gender = "männlich";
        $admin2->birthdate = new DateTime('1982-11-16');
        $admin2->phonenumber = "06507654321";
        $admin2->sv_number = "1611825678";
        $admin2->vaccinated = true;
        $admin2->street = "Mozartstraße";
        $admin2->streetnr = "98";
        $admin2->city = "Wien";
        $admin2->postcode = 1010;
        $admin2->email = "thomas.huber@gmail.com";
        $admin2->password = bcrypt('thomas');
        $admin2->save();

        $user1 = new User();
        $user1->first_name = "Hildegard";
        $user1->last_name = "Bauer";
        $user1->admin = false;
        $user1->gender = "weiblich";
        $user1->birthdate = new DateTime('1936-09-18');
        $user1->phonenumber = "06601111111";
        $user1->sv_number = "1809364029";
        $user1->vaccinated = false;
        $user1->street = "Linsenstraße";
        $user1->streetnr = "32";
        $user1->city = "Wien";
        $user1->postcode = 1210;
        $user1->email = "hildegard.bauer@gmail.com";
        $user1->password = bcrypt('hildegard');
        $user1->save();

        $user2 = new User();
        $user2->first_name = "Brigitte";
        $user2->last_name = "Stieger";
        $user2->admin = false;
        $user2->gender = "weiblich";
        $user2->birthdate = new DateTime('1939-02-20');
        $user2->phonenumber = "06602222222";
        $user2->sv_number = "2002390578";
        $user2->vaccinated = false;
        $user2->street = "Grünbachgasse";
        $user2->streetnr = "2";
        $user2->city = "Liezen";
        $user2->postcode = 8940;
        $user2->email = "brigitte.stieger@gmail.com";
        $user2->password = bcrypt('brigitte');
        $user2->save();

        $user3 = new User();
        $user3->first_name = "Jochen";
        $user3->last_name = "Mayr";
        $user3->admin = false;
        $user3->gender = "männlich";
        $user3->birthdate = new DateTime('1943-03-10');
        $user3->phonenumber = "06601233333";
        $user3->sv_number = "1003431122";
        $user3->vaccinated = false;
        $user3->street = "Ziegelstraße";
        $user3->streetnr = "22";
        $user3->city = "Gallspach";
        $user3->postcode = 4713;
        $user3->email = "jochen.mayr@gmail.at";
        $user3->password = bcrypt('jochen');
        $user3->save();

        $user4 = new User();
        $user4->first_name = "Felix";
        $user4->last_name = "Stieger";
        $user4->admin = false;
        $user4->gender = "männlich";
        $user4->birthdate = new DateTime('1936-06-21');
        $user4->phonenumber = "06602121211";
        $user4->sv_number = "2106362323";
        $user4->vaccinated = false;
        $user4->street = "Grünbachgasse";
        $user4->streetnr = "2";
        $user4->city = "Liezen";
        $user4->postcode = 8940;
        $user4->email = "felix.stieger@gmail.com";
        $user4->password = bcrypt('felix');
        $user4->save();

        $user5 = new User();
        $user5->first_name = "Ernst";
        $user5->last_name = "Lustig";
        $user5->admin = false;
        $user5->gender = "männlich";
        $user5->birthdate = new DateTime('1930-01-10');
        $user5->phonenumber = "06502312312";
        $user5->sv_number = "1001308383";
        $user5->vaccinated = true;
        $user5->street = "Bachgasse";
        $user5->streetnr = "4a";
        $user5->city = "Wien";
        $user5->postcode = 1010;
        $user5->email = "lustig.ernst@gmail.at";
        $user5->password = bcrypt('ernst');
        $user5->save();

        $user6 = new User();
        $user6->first_name = "Matthias";
        $user6->last_name = "Lauber";
        $user6->admin = false;
        $user6->gender = "männlich";
        $user6->birthdate = new DateTime('1950-02-11');
        $user6->phonenumber = "06502312117";
        $user6->sv_number = "1102308463";
        $user6->vaccinated = false;
        $user6->street = "Lauerstraße";
        $user6->streetnr = "67";
        $user6->city = "Wien";
        $user6->postcode = 1010;
        $user6->email = "m.lauber@gmx.at";
        $user6->password = bcrypt('matthias');
        $user6->save();

        $user7 = new User();
        $user7->first_name = "Lisa";
        $user7->last_name = "Feldinger";
        $user7->admin = false;
        $user7->gender = "weiblich";
        $user7->birthdate = new DateTime('1945-01-12');
        $user7->phonenumber = "06502311711";
        $user7->sv_number = "1201458447";
        $user7->vaccinated = false;
        $user7->street = "Lieferstraße";
        $user7->streetnr = "60";
        $user7->city = "St. Pölten";
        $user7->postcode = 3100;
        $user7->email = "lisa.feldinger@gmail.at";
        $user7->password = bcrypt('lisa');
        $user7->save();

        $user8 = new User();
        $user8->first_name = "Antonia";
        $user8->last_name = "Schiffner";
        $user8->admin = false;
        $user8->gender = "weiblich";
        $user8->birthdate = new DateTime('1941-01-19');
        $user8->phonenumber = "065011117";
        $user8->sv_number = "1901411122";
        $user8->vaccinated = false;
        $user8->street = "Fliegerstraße";
        $user8->streetnr = "23d";
        $user8->city = "Gunskirchen";
        $user8->postcode = 4650;
        $user8->email = "antonia.schiffner@gmail.at";
        $user8->password = bcrypt('antonia');
        $user8->save();
    }
}
