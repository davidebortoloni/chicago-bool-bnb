<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
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
        $sponsorships = Sponsorship::all();

        return view('admin.sponsorships.index', compact('sponsorships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsorships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsorship $sponsorship)
    {
        return view('admin.sponsorships.show', compact('sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsorship $sponsorship)
    {
        return view('admin.sponsorships.edit', compact('sponsorship'));
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


        return redirect()->route('admin.sponsorships.show', $sponsorship->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsorship $sponsorship)
    {
        $sponsorship->delete();

        return redirect()->route('admin.sponsorships.index')->with('delete', $sponsorship->name);
    }
}
