@extends('layouts.app')

@section('content')
<div class="container">
  
  @forelse ($apartments as $apartment)
    <div class="card">
      <div class="card-header">
        {{ $apartment->title }}
      </div>
      @forelse ($apartment->messages as $message)
        <div class="card-body">
          <h5 class="card-title">{{ $message->email }}</h5>
          <p class="card-text">{{ $message->text }}</p>
        </div>
      @empty
        <div class="card-body">Non ci sono messaggi</div>
      @endforelse
    </div>
  @empty
      <div class="card">Non ci sono appartamenti</div>
  @endforelse

</div>
@endsection