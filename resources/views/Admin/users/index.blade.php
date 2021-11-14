@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Servizi</h1>
            <a class="btn btn-info" href="{{ route('admin.users.create') }}">Aggiungi nuovo utente</a>
        </div>

        {{-- alert delete post --}}
        @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">
                {{ session('alert-message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary">Vai</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="btn btn-secondary mx-2">Modifica</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Non ci sono utenti</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
