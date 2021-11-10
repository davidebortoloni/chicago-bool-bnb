@extends('layouts.app')

@section('content')
<div class="container">

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Proprietario</th>
        <th scope="col">Stanze</th>
        <th scope="col">MQ</th>
        <th scope="col">Disponibilità</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($apartments as $apartment)
      <tr>
        <th>{{$apartment->id}}</th>
        <td>{{$apartment->user->name}}</td>
        <td>{{$apartment->n_rooms}}</td>
        <td>{{$apartment->sqrmt}}</td>
        <td>@if ($apartment->visibility) Disponibile @else Non disponibile @endif</td>
        <td><a href="{{route('apartments.show', $apartment->id)}}" class="btn btn-primary">Vedi</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>    
</div>
@endsection