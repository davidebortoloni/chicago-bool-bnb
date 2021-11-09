<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user  = new User();

        $user->name = "admin";
        $user->lastname = "admin";
        $user->birth_date = $faker->date();
        $user->is_owner = $faker->boolean();
        $user->email = "admin@admin.it";;
        $user->password = bcrypt('password');

        $user->save();

        $user  = new User();

        $user->name = "Marco";
        $user->lastname = "Rossi";
        $user->birth_date = $faker->date();
        $user->is_owner = $faker->boolean();
        $user->email = "marcorossi@email.it";;
        $user->password = bcrypt('password');

        $user->save();

        for ($i = 0; $i < 20; $i++) {
            $user = new User();

            $user->name = $faker->firstName();
            $user->lastname = $faker->lastName();
            $user->birth_date = $faker->date();
            $user->is_owner = $faker->boolean();
            $user->email = $faker->email();
            $user->password = bcrypt($faker->word());

            $user->save();
        }
    }
}
