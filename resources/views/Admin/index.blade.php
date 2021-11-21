@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if ($user->id == 1)
                            <h2>Benvenuto nel profilo amministratore</h2>
                        @else
                            <h2>Ecco il tuo profilo, {{ $user->name }} {{ $user->lastname }}</h2>
                        @endif
                    </div>

                    <div class="card-body">
                        @if ($user->id == 1)
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Utenti</a>
                            <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary">Tutte le case</a>
                            <a href="{{ route('admin.sponsorships.index') }}"
                                class="btn btn-secondary">Sponsorizzazioni</a>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Servizi</a>
                            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Messaggi</a>
                        @else
                            <ul class="list-unstyled">
                                <li><strong>Data di nascita:</strong> {{ $user->birth_date }}</li>
                                <li><strong>Email:</strong> {{ $user->email }}</li>
                                <li><strong>Case inserite sulla piattaforma:</strong>
                                    {{ count($user->apartments) }}({{ count($user->apartments->where('visibility', '=', '1')) }}
                                    disponibili)</li>
                            </ul>
                            <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary">Le tue case</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary">Modifica i tuoi dati</a>
                            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Messaggi</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
