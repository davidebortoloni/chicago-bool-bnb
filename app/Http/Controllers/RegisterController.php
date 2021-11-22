<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
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

        return redirect()->route('admin.dashboard');
    }
}
