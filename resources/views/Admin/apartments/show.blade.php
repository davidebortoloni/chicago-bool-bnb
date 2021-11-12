@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <figure class="col-12 col-md-6">
                <img src="{{ $apartment->image }}" alt="" class="img-fluid">
            </figure>
            <div class="col-12 col-md-6">
                <div id="description" class="mb-2">{{$apartment->description}}</div>
                <div>Proprietario: <strong>{{$apartment->user->name}}</strong></div>
                <div id="info" class="d-flex justify-content-between align-items-center">
                    <div>Numero stanze: <strong>{{$apartment->n_rooms}}</strong></div>
                    <div>Numero letti: <strong>{{$apartment->n_beds}}</strong></div>
                    <div>Numero bagni: <strong>{{$apartment->n_baths}}</strong></div>
                    <div>Metri quadri: <strong>{{$apartment->sqrmt}}</strong></div> 
                </div>
                <div id="address">Indirizzo: 
                    @if ($apartment->address)
                        <strong>{{$apartment->address->street}}, {{$apartment->address->number}}. {{$apartment->address->cap}} {{$apartment->address->city}}, {{$apartment->address->province}} {{$apartment->address->region}}</strong></div>
                    @else
                        <strong> - </strong>
                    @endif
                </div>  
                <div id="availability"><strong>@if ($apartment->visibility) Disponibile @else Non disponibile @endif</strong></div>
            </div>
        </div>
        <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary">Lista delle tue case</a>
        <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-warning">Modifica</a>
        <form class="d-inline" action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Elimina" class="btn btn-danger">
          </form>
    </div>
@endsection