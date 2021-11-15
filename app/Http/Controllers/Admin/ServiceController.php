<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
            $services = Service::all();
            return view('admin.services.index', compact('services'));
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
            $service = new Service();
            return view('admin.services.create', compact('service'));
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
            $data = $request->all();

            $service = new Service();
            $service->fill($data);

            $service->save();

            return redirect()->route('admin.services.show', compact('service'));
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
    public function show(Service $service)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.services.show', compact('service'));
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
    public function edit(Service $service)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.services.edit', compact('service'));
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
    public function update(Request $request, Service $service)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $data = $request->all();

            $data = $request->all();
            $service->update($data);

            // return redirect()->route('admin.services.show', compact('service'));
            return redirect()->route('admin.services.index');
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
    public function destroy(Service $service)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $service->delete();
            return redirect()->route('admin.services.index')->with('alert-message', 'Servizio eliminato con successo.')->with('alert-type', 'success');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
}
