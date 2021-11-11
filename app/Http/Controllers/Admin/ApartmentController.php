<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
        $apartments = Apartment::where('user_id', $user_id)->get();
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
                'description' => 'required|string|min:10',
                'n_rooms' => 'required|numeric|min:1',
                'n_beds' => 'required|numeric|min:1',
                'n_baths' => 'required|numeric|min:1',
                'sqrmt' => 'required|numeric|min:1',
                'image' => 'required|image',
                'services' => 'nullable|exists:tags,id'
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
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();

        //recupero id del post che voglio editare
        $service_ids = $apartment->services->pluck('id')->toArray();

        return view('admin.apartments.edit', compact('services', 'apartment', 'service_ids'));
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
                'description' => 'required|string|min:10',
                'n_rooms' => 'required|numeric|min:1',
                'n_beds' => 'required|numeric|min:1',
                'n_baths' => 'required|numeric|min:1',
                'image' => 'nullable|image',
                'services' => 'nullable|exists:tags,id'
            ]
        );

        $data = $request->all();

        if (!array_key_exists('services', $data) && $apartment->services) $apartment->services()->detach();
        else $apartment->services()->sync($data['services']);


        if (array_key_exists('image', $data)) {
            if ($apartment->image) Storage::delete($apartment->image);
            $img_url = Storage::put('apartment_images', $data['image']);
            $data['image'] = url("storage/$img_url");
        }

        $apartment->update($data);

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
        if (count($apartment->services)) $apartment->services()->detach();
        if ($apartment->image) Storage::delete($apartment->image);
        $apartment->delete();
        return redirect()->route('admin.apartments.index')->with('alert-message', 'Appartamento eliminato con successo.')->with('alert-type', 'success');
    }
}
