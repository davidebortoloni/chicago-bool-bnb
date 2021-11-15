@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Sponsorizzazioni</h1>
        <a class="btn btn-info" href="{{ route('admin.sponsorships.create') }}">Aggiungi nuova</a>
    </div>
    
    {{-- alert delete post--}}
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
                <th scope='col'>Durata (Ore)</th>
                <th scope='col'>Prezzo (&euro;)</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sponsorships as $sponsorship)
                <tr>
                    <td>{{ $sponsorship->id }}</td>
                    <td>{{ $sponsorship->name }}</td>
                    <td> {{ $sponsorship->duration }}</td>
                    <td> {{ $sponsorship->price }}</td>
                    <td class="d-flex justify-content-end">
                        {{-- <a href="{{ route('admin.sponsorships.show', $sponsorship->id) }}" class="btn btn-primary">Vai</a> --}}
                        <a href="{{ route('admin.sponsorships.edit', $sponsorship->id) }}" class="btn btn-secondary mx-2">Modifica</a>
                        <form class="delete-button" action="{{ route('admin.sponsorships.destroy', $sponsorship->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Cancella</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Non ci sono sponsorizzazioni</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection