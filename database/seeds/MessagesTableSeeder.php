<?php

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartment_ids = Apartment::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            $message = new Message();

            $message->apartment_id = Arr::random($apartment_ids);
            $message->email = $faker->email();
            $message->text = $faker->text(50);
            $message->save();
        }
    }
}
