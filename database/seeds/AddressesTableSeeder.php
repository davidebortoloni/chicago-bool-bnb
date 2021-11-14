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
        $aparments_ids = Apartment::pluck('id')->toArray();

        for ($i = 1; $i <= count($aparments_ids); $i++) {
            $address = new Address();

            $address->apartment_id = $i;
            $address->number = $faker->randomNumber(4, false);
            $address->street = 'via ' . $faker->sentence(2);
            $address->city = $faker->word();
            $address->cap = $faker->randomNumber(4, true);
            $address->province = $faker->word();
            $address->region = $faker->word();
            $address->lat = $faker->randomFloat(6, 36, 47);
            $address->lon = $faker->randomFloat(6, 6, 18);

            $address->save();
        }
    }
}
