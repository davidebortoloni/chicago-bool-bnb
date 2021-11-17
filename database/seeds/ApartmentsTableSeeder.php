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
        $apartments = [
            [
                'title' => 'Green Apartment',
                'description' => 'L\'appartamento, elegante e raffinato, si trova all\'interno di un grazioso e tranquillo cortile di un palazzo d\'epoca, su una delle strade più importanti e affascinanti, direttamente nel cuore della città.',
                'n_rooms' => '2',
                'n_beds' => '2',
                'n_baths' => '1',
                'sqrmt' => '70',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house0.jpg',
            ],
            [
                'title' => 'Tiny & cozy mini apartment',
                'description' => 'L\'appartamento è comodo alla metropolitana e alla stazione. Il bilocale puo ospitare fino a 4 persone ,ha un divano letto matrimoniale e un divano letto da una piazza e mezzo arredato con gusto e curato nei particolari.',
                'n_rooms' => '1',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '50',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house2.jpg',
            ],
            [
                'title' => 'Villa Statilia',
                'description' => 'Confortevole e silenziosa alcova sita al quarto piano di un elegante edificio del quartiere. A pochi minuti dal centro storico e perfettamente collegata con tutti i siti d\'interesse (stazione metro a 300 metri).',
                'n_rooms' => '3',
                'n_beds' => '4',
                'n_baths' => '2',
                'sqrmt' => '120',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house3.jpeg',
            ],
            [
                'title' => 'ARPA - Modern Splendid Room',
                'description' => 'Il mio alloggio è adatto a coppie, avventurieri solitari, chi viaggia per lavoro e famiglie. Tutti sono i benvenuti! L\'appartamento è situato all\'ultimo piano di un bellissimo palazzo romano ristrutturato. E\' un appartamento molto silenzioso,luminoso e rifinito. Ogni stanza ha un balcone privato.',
                'n_rooms' => '1',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '45',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house4.jpg',
            ],
            [
                'title' => 'Loft in San Frediano',
                'description' => 'E\' un\'area indipendente di circa mq 40 facente parte di un più grande appartamento, composta da una grande camera con letto matrimoniale, due letti singoli ed un divano letto matrimoniale. Ci sono anche tavolo un per 6 persone e un bagno completo con doccia. L\'area è dotata di area condizionata, riscaldamento, Wifi.',
                'n_rooms' => '1',
                'n_beds' => '2',
                'n_baths' => '1',
                'sqrmt' => '40',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house5.jpg',
            ],
            [
                'title' => 'I BIANCHI apartment',
                'description' => 'L\'appartamento (25mq) è situato nel centro della città. Corredato da angolo cottura con frigo e piano cottura a induzione, aria condizionata e wi-fi,macchina per caffè,in più balconcino su una corte interna. Appena ristrutturato, luminoso, al terzo piano ma servito da ascensore, perfetto per una coppia che voglia soggiornare nel centro.',
                'n_rooms' => '1',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '25',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house6.jpg',
            ],
            [
                'title' => 'Rosa Rossa Apartment',
                'description' => 'Godetevi il vostro soggiorno in questo luminoso e confortevole appartamento con una camera da letto, completo di interni modernamente arredati!',
                'n_rooms' => '2',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '75',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house7.jpg',
            ],
            [
                'title' => 'Casa Vacanze Macchi',
                'description' => 'Un piccolo angolo di pace, a due passi da tutte le maggiori attrazioni. Ideale per 2, è composto da un unico ambiente principale con zona notte, cucina a vista e una deliziosa terrazza sui tetti.',
                'n_rooms' => '1',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '60',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house8.jpg',
            ],
            [
                'title' => 'Sweet Inn',
                'description' => 'Luminoso monolocale con arredamento moderno, a pochi passi dal Museo d’Arte Moderna e al mercato.',
                'n_rooms' => '1',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '55',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house9.jpg',
            ],
            [
                'title' => 'Porta Volta',
                'description' => 'L\'appartamento, comodo e accogliente si trova in posizione centrale e molto comoda per girare a piedi la città. Letti nuovi e comodi. In zona ci sono ristoranti, supermercati e musei.',
                'n_rooms' => '2',
                'n_beds' => '3',
                'n_baths' => '2',
                'sqrmt' => '95',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house10.jpg',
            ],
            [
                'title' => 'LOVELYLOFT, cool studio',
                'description' => 'Splendido bilocale ristrutturato, collocato al terzo piano senza ascensore. Composto da una stanza da letto, con divano letto una piazza e mezza e due letti singoli, la cucina separata è completamente accessoriata con la piastra a induzione, bagno. L’appartamento è luminoso e dotato di ogni comfort: free WI-FI, aria condizionata, lavatrice, TV, Lenzuola, asciugamani, piatti e stoviglie sono sempre in dotazione.',
                'n_rooms' => '2',
                'n_beds' => '2',
                'n_baths' => '1',
                'sqrmt' => '70',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house11.jpg'
            ],
            [
                'title' => 'Alessia\'s Flat',
                'description' => 'L\'appartamento è composto da una zona living con divano letto matrimoniale e cucina a vista completamente accessoriata. La camera da letto presenta un letto matrimoniale. Il bagno è completo di tutti i sanitari ed un box doccia.',
                'n_rooms' => '2',
                'n_beds' => '2',
                'n_baths' => '1',
                'sqrmt' => '65',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house12.jpg'
            ],
            [
                'title' => '8-7 Small room in Central',
                'description' => 'Appartamento appena ristrutturato in meraviglioso palazzo d\'epoca, affacciato sull\'elegante zona pedonale del centro città.',
                'n_rooms' => '1',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '55',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house13.jpg'
            ],
            [
                'title' => 'Bilocale centrale vicino alla stazione',
                'description' => 'L\'appartamento vi piacerà per questi motivi: i soffitti alti, posizione, la gente e l\'atmosfera. La struttura è adatta a coppie, avventurieri solitari, chi viaggia per lavoro e famiglie.',
                'n_rooms' => '2',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '70',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house14.jpg',
            ],
            [
                'title' => 'Le Briccole',
                'description' => 'Stupendo monolocale appena ristrutturato e arredato, situato in un bellissimo palazzo storico, dispone di uno spazio unico con divano letto, angolo cottura e bagno con doccia. Ideale per viaggiatori solitari e coppie.',
                'n_rooms' => '1',
                'n_beds' => '1',
                'n_baths' => '1',
                'sqrmt' => '35',
                'image' => 'http://127.0.0.1:8000/storage/apartment_images/house15.jpg',
            ],
        ];

        $user_ids = User::pluck('id')->toArray();
        $service_ids = Service::pluck('id')->toArray();
        $sponsorship_ids = Sponsorship::pluck('id')->toArray();

        foreach ($apartments as $apartment) {
            $new_apartment = new Apartment();

            $new_apartment->user_id = Arr::random($user_ids);
            $new_apartment->title = $apartment['title'];
            $new_apartment->description = $apartment['description'];
            $new_apartment->n_rooms = $apartment['n_rooms'];
            $new_apartment->n_beds = $apartment['n_beds'];
            $new_apartment->n_baths = $apartment['n_baths'];
            $new_apartment->sqrmt = $apartment['sqrmt'];
            $new_apartment->image = $apartment['image'];
            $new_apartment->visibility = $faker->boolean();

            $new_apartment->save();

            $rand = rand(0, 3);
            if (!$rand) {
                $sponsorship_id = Arr::random($sponsorship_ids);
                $sponsorship = Sponsorship::find($sponsorship_id);
                $hours = $sponsorship->duration;
                $created_at = Carbon::now('Europe/Rome');
                $updated_at = Carbon::now('Europe/Rome');
                $start_date = Carbon::now('Europe/Rome');
                $expiration = Carbon::now('Europe/Rome')->addHours($hours);
                $new_apartment->sponsorships()->attach($sponsorship_id, [
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
                $new_apartment->services()->attach($services);
            }
        }
    }
}
