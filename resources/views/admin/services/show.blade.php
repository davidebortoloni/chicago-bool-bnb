@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $services->name }}</h1>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Indietro</a>
            <a href="{{ route('admin.services.edit', $services->id) }}" class="btn btn-secondary mx-2">Modifica</a>
            <form action="{{ route('admin.services.destroy', $services->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Cancella</button>
            </form>
        </div>
    </div>

@endsection
