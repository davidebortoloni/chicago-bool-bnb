<?php

use App\Models\View;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $views = new view();

            $views->day = $faker->dateTime();
            $views->count = $faker->randomNumber();
            $views->ip_address = $faker->ipv4();
            $views->save();
        }
    }
}
