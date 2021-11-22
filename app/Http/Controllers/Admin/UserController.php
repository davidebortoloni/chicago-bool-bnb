<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
            $users = User::all();
            return view('admin.users.index', compact('users'));
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
            return view('admin.users.create');
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
                'email' => 'required|unique:users',
                'name' => 'required',
                'lastname' => 'required',
                'birth_date' => 'required',
            ], [
                'required' => 'Il contenuto è obbligatorio',
                'email.unique' => 'Email già in uso',
            ]);

            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $user = new User();
            $user->fill($data);
            $user->is_owner = 0;

            $user->save();

            return redirect()->route('admin.users.show', compact('user'));
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
    public function show(User $user)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            return view('admin.users.show', compact('user'));
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
    public function edit(User $user)
    {
        $user_id = Auth::id();

        if ($user_id == 1 or $user_id == $user->id) {
            return view('admin.users.edit', compact('user'));
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
    public function update(Request $request, User $user)
    {
        $user_id = Auth::id();

        if ($user_id == 1 or $user_id == $user->id) {
            $data = $request->all();

            $data = $request->all();
            $user->update($data);

            return redirect()->route('admin.users.show', compact('user'));
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
    public function destroy(User $user)
    {
        $user_id = Auth::id();

        if ($user_id == 1) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('alert-message', 'Utente eliminato con successo.')->with('alert-type', 'success');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
}
