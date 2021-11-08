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

        for ($i = 0; $i < 100; $i++) {
            $address = new Address();

            $address->apartment_id = Arr::random($aparments_ids);
            $address->number = $faker->randomNumber(4, false);
            $address->street = 'via ' . $faker->sentence(2);
            $address->city = $faker->word();
            $address->cap = $faker->randomNumber(4, true);
            $address->province = $faker->word();
            $address->region = $faker->word();
            $address->lat = $faker->randomNumber(3, false) . '.' . $address->cap = $faker->randomNumber(6, true);
            $address->lon = $faker->randomNumber(3, false) . '.' . $address->cap = $faker->randomNumber(6, true);

            $address->save();
        }
    }
}
