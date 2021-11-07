<?php

use App\models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MessagesTableSeeder::class,
            ViewsTableSeeder::class,
            SponsorshipsTableSeeder::class,
            ServicesTableSeeder::class,
        ]);
    }
}
