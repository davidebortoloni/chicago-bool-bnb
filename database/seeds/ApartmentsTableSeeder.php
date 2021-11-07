<?php

use App\Models\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $apartment = new Apartment();

            $apartment->user_id = 1;
            $apartment->description = $faker->paragraph();
            $apartment->n_rooms = $faker->randomDigitNotNull();
            $apartment->n_beds = $faker->randomDigitNotNull();
            $apartment->n_baths = $faker->randomDigitNotNull();
            $apartment->sqrmt = $faker->numberBetween(7, 37000);
            $apartment->image = "https://loremflickr.com/600/350/house?random=" + $i;
            $apartment->visibility = 1;
            $apartment->save();
        }
    }
}
