<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $users = new user();

            $users->name = $faker->name();
            $users->lastname = $faker->lastname();
            $users->birth_date = $faker->date();
            $users->is_owner = $faker->boolean();
            $users->email = $faker->email();
            $users->password = $faker->word();
            $users->save();
        }
    }
}
