@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica servizio</h1>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @method('PATCH')
        @csrf
        {{-- nome service --}}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $service->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>   
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Invia</button>
    </form>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.services.index', $service->id) }}" class="btn btn-secondary">Indietro</a>
    </div>
</div>
    
@endsection