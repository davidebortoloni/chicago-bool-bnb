<?php

use App\Models\Message;
use Illuminate\Database\Seeder;
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
        for ($i = 0; $i < 20; $i++) {
            $message = new Message();

            $message->email = $faker->email();
            $message->text = $faker->text(50);
            $message->save();
        }
    }
}
