<?php

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $sponsorship = new Sponsorship();

            $sponsorship->name = $faker->word();
            $sponsorship->duration = $faker->numberBetween(0, 1000);
            $sponsorship->price = $faker->randomFloat(2, 10, 300);
            $sponsorship->save();
        }
    }
}
