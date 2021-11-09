@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $sponsorship->name }}</h1>
        <p>Durata: {{ $sponsorship->duration }} ore</p>
        <p>Prezzo: {{ $sponsorship->price }} euro</p>
       
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-primary">Indietro</a>
            <a href="{{ route('admin.sponsorships.edit', $sponsorship->id) }}" class="btn btn-secondary mx-2">Modifica</a>
            <form action="{{ route('admin.sponsorships.destroy', $sponsorship->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Cancella</button>
            </form>
        </div>
    </div>

@endsection
