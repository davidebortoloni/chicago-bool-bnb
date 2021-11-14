@extends('layouts.app')

@section('content')
    <div class="container">
        <h1><strong>{{ $user->name }}</strong></h1>
        <p>Nome: <strong>{{ $user->name }}</strong></p>
        <p>Cognome: <strong>{{ $user->lastname }}</strong></p>
        <p>Email: <strong>{{ $user->email }}</strong></p>
        <p>Data di nascita: <strong>{{ $user->birth_date }}</strong></p>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Lista utenti</a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary mx-2">Modifica</a>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Cancella</button>
            </form>
        </div>
    </div>

@endsection
