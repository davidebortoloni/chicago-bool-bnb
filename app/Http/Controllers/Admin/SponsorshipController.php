<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SponsorshipController extends Controller
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
            $sponsorships = Sponsorship::all();
            return view('admin.sponsorships.index', compact('sponsorships'));
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.sponsorships.create');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $request->validate([
                'name' => 'required|unique:sponsorships|max:50',
                'duration' => 'required|numeric',
                'price' => 'required|numeric',
            ], [
                'required' => 'Il contenuto è obbligatorio',
                'name.unique' => 'Il nome già esiste',
                'name.max' => 'Il numero massimo di caratteri per il nome è :max',
                'numeric' => 'Il contenuto deve essere un numero',
            ]);

            $data = $request->all();
            $sponsorship = new Sponsorship();
            $sponsorship->fill($data);
            $sponsorship->save();

            return redirect()->route('admin.sponsorships.show', $sponsorship->id);
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsorship $sponsorship)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.sponsorships.show', compact('sponsorship'));
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
    public function edit(Sponsorship $sponsorship)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.sponsorships.edit', compact('sponsorship'));
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
    public function update(Request $request, Sponsorship $sponsorship)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $request->validate([
                'name' => ['required', Rule::unique('sponsorships')->ignore($sponsorship->id), 'max:50'],
                'duration' => 'required|numeric',
                'price' => 'required|numeric',
            ], [
                'required' => 'Il contenuto è obbligatorio',
                'name.unique' => 'Il nome già esiste',
                'name.max' => 'Il numero massimo di caratteri per il nome è :max',
                'numeric' => 'Il contenuto deve essere un numero',
            ]);

            $data = $request->all();
            $sponsorship->update($data);


            // return redirect()->route('admin.sponsorships.show', $sponsorship->id);
            return redirect()->route('admin.sponsorships.index');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsorship $sponsorship)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $sponsorship->delete();

            return redirect()->route('admin.sponsorships.index')->with('alert-message', 'Sponsorizzazione eliminata con successo.')->with('alert-type', 'success');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function purchase(Apartment $apartment)
    {
        $sponsorships = Sponsorship::all();
        return view('admin.sponsorships.purchase', compact('sponsorships', 'apartment'));
    }
}
