@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $service->name }}</h1>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Lista servizi</a>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning mx-2">Modifica</a>
            <form class="delete-button" action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Cancella</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection