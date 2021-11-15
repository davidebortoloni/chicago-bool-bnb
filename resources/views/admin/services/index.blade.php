@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Servizi</h1>
            <a class="btn btn-info" href="{{ route('admin.services.create') }}">Aggiungi nuovo</a>
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
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td class="d-flex justify-content-end">
                            {{-- <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary">Vai</a> --}}
                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                class="btn btn-warning mx-2">Modifica</a>
                            <form class="delete-button" action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Non ci sono servizi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection