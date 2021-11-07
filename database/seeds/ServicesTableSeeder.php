<?php

use App\Models\Service;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 8; $i++) {
            $services = new Service();

            $services->name = $faker->word();
        }
    }
}
