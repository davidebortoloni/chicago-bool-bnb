<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Arr;
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
        if ($request->lat && $request->lon && $request->distance) {
            $lat = $request->lat;
            $lon = $request->lon;
            $distance = $request->distance;

            // switch ($distance) {
            //     case '5':
            //         $range_lat = (1 / 111) * 5;
            //         $range_lon = (1 / 85) * 5;
            //         break;
            //     case '10':
            //         $range_lat = (1 / 111) * 10;
            //         $range_lon = (1 / 85) * 10;
            //         break;
            //     case '20':
            //         $range_lat = (1 / 111) * 20;
            //         $range_lon = (1 / 85) * 20;
            //         break;
            //     case '50':
            //         $range_lat = (1 / 111) * 50;
            //         $range_lon = (1 / 85) * 50;

            //         break;
            //     default:
            //         $range_lat = (1 / 111) * 10;
            //         $range_lon = (1 / 85) * 10;
            // }
            if ($distance == 5) {
                $range_lat = (1 / 111) * 5;
                $range_lon = (1 / 85) * 5;
            } else if ($distance == 10) {
                $range_lat = (1 / 111) * 10;
                $range_lon = (1 / 85) * 10;
            } else if ($distance == 20) {
                $range_lat = (1 / 111) * 20;
                $range_lon = (1 / 85) * 20;
            } else if ($distance == 50) {
                $range_lat = (1 / 111) * 50;
                $range_lon = (1 / 85) * 50;
            } else {
                $range_lat = (1 / 111) * 10;
                $range_lon = (1 / 85) * 10;
            }
            $min_lat = $lat - $range_lat;
            $max_lat = $lat + $range_lat;
            $min_lon = $lon - $range_lon;
            $max_lon = $lon + $range_lon;
            // $city = 'quasi';
            $apartments = Apartment::join('addresses', 'apartments.id', '=', 'addresses.apartment_id')
                ->with('services')
                ->with('sponsorships')
                ->where([
                    ['lat', '>', $min_lat],
                    ['lat', '<', $max_lat],
                    ['lon', '>', $min_lon],
                    ['lon', '<', $max_lon]
                ])
                ->paginate(12)->toArray();
        } else {
            $apartments = Apartment::join('addresses', 'apartments.id', '=', 'addresses.apartment_id')
                ->with('services')
                ->with('sponsorships')
                ->paginate(12)->toArray();
        }

        return response()->json($apartments);
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
