@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $service->name }}</h1>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Lista servizi</a>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-secondary mx-2">Modifica</a>
            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Cancella</button>
            </form>
        </div>
    </div>

@endsection
