@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Services</h1>
            <a class="btn btn-info" href="{{ route('admin.services.create') }}">Aggiungi nuovo</a>
        </div>

        {{-- alert delete post --}}
        @if (session('delete'))
            <div class="my-3">
                <div class="alert alert-danger" role="alert">
                    Servizio eliminato con successo "{{ session('delete') }}"
                </div>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope='col'>Durata (Ore)</th>
                    <th scope='col'>Prezzo (&euro;)</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.services.show', $sponsorship->id) }}" class="btn btn-primary">Vai</a>
                            <a href="{{ route('admin.services.edit', $sponsorship->id) }}"
                                class="btn btn-secondary mx-2">Modifica</a>
                            <form action="{{ route('admin.services.destroy', $sponsorship->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Non ci sono servizi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection