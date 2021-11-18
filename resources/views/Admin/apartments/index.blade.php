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
        <th scope="col" class="d-none d-md-table-cell">Stanze</th>
        <th scope="col" class="d-none d-md-table-cell">MQ</th>
        <th scope="col">Disponibilità</th>
        <th scope="col">Azioni</th>
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
        <td class="d-none d-md-table-cell">{{$apartment->n_rooms}}</td>
        <td class="d-none d-md-table-cell">{{$apartment->sqrmt}}</td>
        <td>@if ($apartment->visibility) Disponibile @else Non disponibile @endif</td>
        <td class="">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="dropdown-item">Vedi</a>
              <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class=" dropdown-item">Modifica</a>
            <form class="d-inline delete-button" action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Elimina" class="dropdown-item">
            </form>
            </div>
          </div>
            
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
<div class="d-flex justify-content-center">
  {{ $apartments->links() }}
</div>
@endsection

@section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection