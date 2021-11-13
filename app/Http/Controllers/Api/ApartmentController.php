<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Arr;
use App\Models\Service;
use App\Models\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if ($request) $city = $request->city;
        // $city = 'quasi';
        $apartments = Apartment::join('addresses', 'apartments.id', '=', 'addresses.apartment_id')
            ->with('services')
            ->with('sponsorships')
            ->where('city', 'LIKE', "%$city%")
            ->get()->toArray();
        return response()->json(['apartments' => $apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $address = $apartment->address;
        $services = $apartment->services;
        $views = $apartment->views;
        $total_views = 0;
        foreach ($views as $view) {
            $total_views = $total_views + $view->count;
        }
        return response()->json(['apartment' => $apartment, 'address' => $address, 'services' => $services, 'views' => $total_views]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
