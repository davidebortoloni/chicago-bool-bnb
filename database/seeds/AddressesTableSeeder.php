<?php

use App\Models\Address;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartment;
use Illuminate\Support\Arr;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $addresses = [
            [
                'street' => 'Via Galazia',
                'number' => 2,
                'city' => 'Roma',
                'cap' => '00183',
                'province' => 'RM',
                'region' => 'Lazio',
                'lat' => 41.875983,
                'lon' => 12.507088,
            ],
            [
                'street' => 'Via della Polveriera',
                'number' => 18,
                'city' => 'Roma',
                'cap' => '00184',
                'province' => 'RM',
                'region' => 'Lazio',
                'lat' => 41.892805,
                'lon' => 12.493057,
            ],
            [
                'street' => 'Via Properzio',
                'number' => 7,
                'city' => 'Roma',
                'cap' => '00193',
                'province' => 'RM',
                'region' => 'Lazio',
                'lat' => 41.906135,
                'lon' => 12.461273,
            ],
            [
                'street' => 'Via delle Terme',
                'number' => 14,
                'city' => 'Firenze',
                'cap' => '50123',
                'province' => 'FI',
                'region' => 'Toscana',
                'lat' => 43.769656,
                'lon' => 11.253006,
            ],
            [
                'street' => 'Via dei Cimatori',
                'number' => 16,
                'city' => 'Firenze',
                'cap' => '50122',
                'province' => 'FI',
                'region' => 'Toscana',
                'lat' => 43.770738,
                'lon' => 11.256254,
            ],
            [
                'street' => 'Via Fiume',
                'number' => 3,
                'city' => 'Firenze',
                'cap' => '50123',
                'province' => 'FI',
                'region' => 'Toscana',
                'lat' => 43.776682,
                'lon' => 11.250309,
            ],
            [
                'street' => 'Vicolo Alemagna',
                'number' => 1,
                'city' => 'Bologna',
                'cap' => '40125',
                'province' => 'BO',
                'region' => 'Emilia Romagna',
                'lat' => 44.492972,
                'lon' => 11.347811,
            ],
            [
                'street' => 'Via Valdonica',
                'number' => 4,
                'city' => 'Bologna',
                'cap' => '40126',
                'province' => 'BO',
                'region' => 'Emilia Romagna',
                'lat' => 44.496165,
                'lon' => 11.347641,
            ],
            [
                'street' => 'Via Pietralata',
                'number' => 37,
                'city' => 'Bologna',
                'cap' => '40122',
                'province' => 'BO',
                'region' => 'Emilia Romagna',
                'lat' => 44.496504,
                'lon' => 11.331548,
            ],
            [
                'street' => 'Via Angelo Mauri',
                'number' => 6,
                'city' => 'Milano',
                'cap' => '20144',
                'province' => 'MI',
                'region' => 'Lombardia',
                'lat' => 45.465436,
                'lon' => 9.160865,
            ],
            [
                'street' => 'Via S. Paolo',
                'number' => 15,
                'city' => 'Milano',
                'cap' => '20121',
                'province' => 'MI',
                'region' => 'Lombardia',
                'lat' => 45.466351,
                'lon' => 9.193124,
            ],
            [
                'street' => 'Via Giovanni da Procida',
                'number' => 9,
                'city' => 'Milano',
                'cap' => '20145',
                'province' => 'MI',
                'region' => 'Lombardia',
                'lat' => 45.479212,
                'lon' => 9.162896,
            ],
            [
                'street' => 'Via dell\'Arsenale',
                'number' => 7,
                'city' => 'Torino',
                'cap' => '10121',
                'province' => 'TO',
                'region' => 'Piemonte',
                'lat' => 45.068709,
                'lon' => 7.680139,
            ],
            [
                'street' => 'Via Andrea Pisano',
                'number' => 2,
                'city' => 'Torino',
                'cap' => '10152',
                'province' => 'TO',
                'region' => 'Piemonte',
                'lat' => 45.078030,
                'lon' => 7.686564,
            ],
            [
                'street' => 'Via Susa',
                'number' => 49,
                'city' => 'Torino',
                'cap' => '10138',
                'province' => 'TO',
                'region' => 'Piemonte',
                'lat' => 45.074722,
                'lon' => 7.657069,
            ],
        ];

        $aparments_ids = Apartment::pluck('id')->toArray();

        for ($i = 1; $i <= count($aparments_ids); $i++) {
            $address = new Address();

            $address->apartment_id = $i;
            $address->number = $addresses[$i - 1]['number'];
            $address->street = $addresses[$i - 1]['street'];
            $address->city = $addresses[$i - 1]['city'];
            $address->cap = $addresses[$i - 1]['cap'];
            $address->province = $addresses[$i - 1]['province'];
            $address->region = $addresses[$i - 1]['region'];
            $address->lat = $addresses[$i - 1]['lat'];
            $address->lon = $addresses[$i - 1]['lon'];

            $address->save();
        }
    }
}
