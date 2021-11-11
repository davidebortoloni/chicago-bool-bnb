@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center">
    <h1>Le tue case</h1>
    <a class="btn btn-info" href="{{ route('admin.apartments.create') }}">Inserisci casa</a>
  </div>
  @if (session('alert-message'))
    <div class="alert alert-{{ session('alert-type') }}">
      {{ session('alert-message') }}
    </div>
  @endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Stanze</th>
        <th scope="col">MQ</th>
        <th scope="col">Disponibilità</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @forelse($apartments as $apartment)
      <tr>
        <th>{{$apartment->id}}</th>
        <td>{{$apartment->n_rooms}}</td>
        <td>{{$apartment->sqrmt}}</td>
        <td>@if ($apartment->visibility) Disponibile @else Non disponibile @endif</td>
        <td class="d-flex justify-content-end">
          <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="btn btn-primary">Vedi</a>
          <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-warning mx-2">Modifica</a>
          <form class="d-inline" action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Elimina" class="btn btn-danger">
          </form>
        </td>
      </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center">Non ci sono case inserite</td>
        </tr>
      @endforelse
    </tbody>
  </table>    
</div>
@endsection