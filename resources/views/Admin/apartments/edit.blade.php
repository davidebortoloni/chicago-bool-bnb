@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('admin.apartments.update', $apartment->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="description" class="h5">Descrizione appartamento</label>
                <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" rows="8">{{$apartment->description}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image"class="h5">Inserisci immagine</label>
                <input type="file" class="form-control-file  @error('image') is-invalid @enderror" id="image" name="image" value="{{$apartment->image}}">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
              </div>
              <div class="form-row">
            <div class="form-group col-12  col-md-3">
                <label for="n_rooms" class="h5">Numero Stanze</label>
                <input type="number" class="form-control  @error('n_rooms') is-invalid @enderror" id="n_rooms" name="n_rooms" min="0" value="{{$apartment->n_rooms}}">
                @error('n_rooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="n_beds"class="h5">Numero Letti</label>
                <input type="number" class="form-control  @error('n_beds') is-invalid @enderror" id="n_beds" name="n_beds" min="0" value="{{$apartment->n_beds}}">
                @error('n_beds')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="n_baths"class="h5">Numero Bagni</label>
                <input type="number" class="form-control" id="n_baths" name="n_baths" min="0" value="{{$apartment->n_baths}}">
                @error('n_baths')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="sqrmt"class="h5">Metri quadri</label>
                <input type="number" class="form-control" id="n_baths" name="sqrmt" min="0" value="{{$apartment->sqrmt}}">
            </div>
            </div>
            <div class="h5">Servizi</div>  
            @foreach($services as $service)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="" value="{{$service->id}}" @if(in_array($service->id, $service_ids)) checked @endif>
                <label class="form-check-label" name="{{$service->name}}" for="{{$service->name}}">{{$service->name}}</label>
              </div>
              @endforeach
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="1" name="visibility" id="visibility" @if($apartment->visibility) checked @endif>
                <label class="form-check-label" for="defaultCheck1">
                  Disponibile
                </label>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
    </div>
@endsection