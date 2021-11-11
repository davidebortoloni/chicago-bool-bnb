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
        $services = [
            [
                'name' => 'Wi-Fi',
            ],
            [
                'name' => 'Aria condizionata',
            ],
            [
                'name' => 'Lavatrice',
            ],
            [
                'name' => 'Posto auto',
            ],
            [
                'name' => 'Televisione',
            ],
            [
                'name' => 'Lavastoviglie',
            ],
            [
                'name' => 'Ascensore',
            ],
            [
                'name' => 'Asciugacapelli',
            ],
            [
                'name' => 'Vasca da bagno',
            ],
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service['name'];
            $newService->save();
        }
    }
}
