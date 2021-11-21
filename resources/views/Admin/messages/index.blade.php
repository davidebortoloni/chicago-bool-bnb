@extends('layouts.app')

@section('content')
<div class="container">
  
  @forelse ($apartments as $apartment)
    <div class="card my-5">
      <div class="card-header h4">
        {{ $apartment->title }}
      </div>
      @forelse ($apartment->messages as $message)
        <div class="card-body border-bottom">
          <h5 class="card-title h6"><span class="font-italic">E-mail:</span> {{ $message->email }}</h5>
          <p class="card-text"><span class="font-italic">Messaggio:</span> {{ $message->text }}</p>
        </div>
      @empty
        <div class="card-body border-bottom">Non ci sono messaggi</div>
      @endforelse
    </div>
  @empty
      <div class="card">Non ci sono appartamenti</div>
  @endforelse

</div>
@endsection