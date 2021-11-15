@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
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
        @if (auth()->user()->id == 1)
        <th scope="col">Proprietario</th>
        @endif
        <th scope="col">Nome casa</th>
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
        @if (auth()->user()->id == 1)
        <td>{{$apartment->user->name}} {{$apartment->user->lastname}}</td>
        @endif
        <td class="text-capitalize">{{$apartment->title}}</td>
        <td>{{$apartment->n_rooms}}</td>
        <td>{{$apartment->sqrmt}}</td>
        <td>@if ($apartment->visibility) Disponibile @else Non disponibile @endif</td>
        <td class="d-flex justify-content-end">
          <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="btn btn-primary">Vedi</a>
          <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-warning mx-2">Modifica</a>
          <form class="d-inline delete-button" action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Elimina" class="btn btn-danger">
          </form>
        </td>
      </tr>
      @empty
        <tr>
          <td @if (auth()->user()->id == 1) colspan="7" @else colspan="6" @endif class="text-center">Non ci sono case inserite</td>
        </tr>
      @endforelse
    </tbody>
  </table>    
</div>
@endsection

@section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection