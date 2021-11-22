<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Apartment;
use App\models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $apartments = Apartment::paginate(10);
        } else {
            $apartments = Apartment::where('user_id', $user_id)->paginate(10);
        }

        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartment = new Apartment();
        $sponsorships = Sponsorship::all();
        $services = Service::all();
        return view('admin.apartments.create', compact('apartment', 'sponsorships', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string|min:10',
                'n_rooms' => 'required|numeric|min:1',
                'n_beds' => 'required|numeric|min:1',
                'n_baths' => 'required|numeric|min:1',
                'sqrmt' => 'required|numeric|min:1',
                'image' => 'required|image',
                'services' => 'nullable|exists:services,id',
                'street' => 'required|string',
                'number' => 'required|numeric',
                'cap' => 'required|numeric',
                'city' => 'required|string',
                'province' => 'required|string',
                'region' => 'required|string',
            ]
        );

        $data = $request->all();

        $apartment = new Apartment();
        $data['user_id'] = Auth::id();

        if (array_key_exists('image', $data)) {
            $img_url = Storage::put('apartment_images', $data['image']);
            $data['image'] = url("storage/$img_url");
        }

        if (!array_key_exists('visibility', $data)) {
            $data['visibility'] = 0;
        }

        $apartment->fill($data);

        $apartment->save();

        // salvataggio indirizzo con chiamata API a tom tom per lat e lon
        $address = new Address();
        $data['apartment_id'] = $apartment->id;

        $fullAddress = $data['street'] . ' ' . $data['number'] . ' ' . $data['city'];
        $response = Http::get("https://api.tomtom.com/search/2/geocode/$fullAddress.json", [
            'key' => 'jZuaDddMztclNzOF3DnFmOTzmzag0hcP',
        ])->json();
        $coordinates = $response['results'][0]['position'];

        $data['lat'] = $coordinates['lat'];
        $data['lon'] = $coordinates['lon'];

        $address->fill($data);

        $address->save();

        $user = Auth::user();
        $user->is_owner = 1;
        $user->save();

        if (array_key_exists('services', $data)) $apartment->services()->attach($data['services']);

        return redirect()->route('admin.apartments.show', compact('apartment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $user_id = Auth::id();

        if ($user_id == 1 or $user_id == $apartment->user_id) {
            return view('admin.apartments.show', compact('apartment'));
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $user_id = Auth::id();

        if ($user_id == 1 or $user_id == $apartment->user_id) {
            $services = Service::all();

            //recupero id del post che voglio editare
            $service_ids = $apartment->services->pluck('id')->toArray();

            // recupero indirizzo dell'appartamento
            $address = $apartment->address;

            return view('admin.apartments.edit', compact('services', 'apartment', 'service_ids', 'address'));
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string|min:10',
                'n_rooms' => 'required|numeric|min:1',
                'n_beds' => 'required|numeric|min:1',
                'n_baths' => 'required|numeric|min:1',
                'image' => 'nullable|image',
                'services' => 'nullable|exists:services,id',
                'street' => 'required|string',
                'number' => 'required|numeric',
                'cap' => 'required|numeric',
                'city' => 'required|string',
                'province' => 'required|string',
                'region' => 'required|string',
            ]
        );

        $data = $request->all();

        if (!array_key_exists('visibility', $data)) $data['visibility'] = 0;

        if (!array_key_exists('services', $data) && $apartment->services) $apartment->services()->detach();
        else $apartment->services()->sync($data['services']);


        if (array_key_exists('image', $data)) {
            if ($apartment->image) Storage::delete($apartment->image);
            $img_url = Storage::put('apartment_images', $data['image']);
            $data['image'] = url("storage/$img_url");
        }

        $apartment->update($data);

        // aggiornamento indirizzo con chiamata API a tom tom per lat e lon
        $fullAddress = $data['street'] . ' ' . $data['number'] . ' ' . $data['city'];
        $response = Http::get("https://api.tomtom.com/search/2/geocode/$fullAddress.json", [
            'key' => 'jZuaDddMztclNzOF3DnFmOTzmzag0hcP',
        ])->json();
        $coordinates = $response['results'][0]['position'];

        $data['lat'] = $coordinates['lat'];
        $data['lon'] = $coordinates['lon'];

        $address = Address::where('apartment_id', $apartment->id)->first();

        $address->update($data);

        return redirect()->route('admin.apartments.show', compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $user = Auth::user();
        if (count($apartment->services)) $apartment->services()->detach();
        if ($apartment->image) Storage::delete($apartment->image);
        $apartment->delete();
        $apartment->address->delete();
        if (!count($user->apartments)) {
            $user->is_owner = 0;
            $user->save();
        }
        return redirect()->route('admin.apartments.index')->with('alert-message', 'Appartamento eliminato con successo.')->with('alert-type', 'success');
    }
}
