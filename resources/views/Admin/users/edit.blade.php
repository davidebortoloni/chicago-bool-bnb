@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica utente</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lastname">Cognome</label>
                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname"
                    value="{{ old('lastname', $user->lastname) }}">
                @error('lastname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Invia</button>
        </form>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('admin.users.index', $user->id) }}" class="btn btn-secondary">Indietro</a>
        </div>
    </div>

@endsection
