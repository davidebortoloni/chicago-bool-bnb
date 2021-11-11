<?php

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();
        $service_ids = Service::pluck('id')->toArray();
        $sponsorship_ids = Sponsorship::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            $apartment = new Apartment();

            $apartment->user_id = Arr::random($user_ids);
            $apartment->description = $faker->paragraph();
            $apartment->n_rooms = $faker->randomDigitNotNull();
            $apartment->n_beds = $faker->randomDigitNotNull();
            $apartment->n_baths = $faker->randomDigitNotNull();
            $apartment->sqrmt = $faker->numberBetween(30, 200);
            $apartment->image = "http://127.0.0.1:8000/storage/apartment_images/house1.jpg";
            $apartment->visibility = $faker->boolean();

            $apartment->save();

            $rand = rand(0, 3);
            if (!$rand) {
                $sponsorship_id = Arr::random($sponsorship_ids);
                $sponsorship = Sponsorship::find($sponsorship_id);
                $hours = $sponsorship->duration;
                $created_at = Carbon::now('Europe/Rome');
                $updated_at = Carbon::now('Europe/Rome');
                $start_date = Carbon::now('Europe/Rome');
                $expiration = Carbon::now('Europe/Rome')->addHours($hours);
                $apartment->sponsorships()->attach($sponsorship_id, [
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                    'start_date' => $start_date,
                    'expiration' => $expiration,
                ]);
            }

            $services = [];
            $services_shuffle = array_replace([], $service_ids);
            $n_services = rand(0, count($service_ids));
            shuffle($services_shuffle);
            for ($j = 0; $j < $n_services; $j++) {
                array_push($services, $services_shuffle[$j]);
            }
            if (count($services)) {
                $apartment->services()->attach($services);
            }
        }
    }
}
