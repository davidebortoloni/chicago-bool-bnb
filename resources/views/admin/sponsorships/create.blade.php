@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea nuova sponsorizzazione</h1>

    <form action="{{ route('admin.sponsorships.store') }}" method="POST">
        @csrf
        {{-- nome sponsorship --}}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', '') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>

        {{-- durata sponsorship --}}
        <div class="form-group">
            <label for="duration">Durata</label>
            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', '') }}">
            @error('duration')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>

        {{-- prezzo sponsorship --}}
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', '') }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Invia</button>
    </form>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-secondary">Indietro</a>
    </div>
</div>
    
@endsection