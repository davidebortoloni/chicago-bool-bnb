<?php

use App\Models\Apartment;
use App\Models\View;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
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
        $apartment_ids = Apartment::pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            $view = new View();

            $view->apartment_id = Arr::random($apartment_ids);
            $view->day = $faker->dateTime();
            $view->count = $faker->numberBetween(0, 20000);
            $view->ip_address = $faker->ipv4();
            $view->save();
        }
    }
}
