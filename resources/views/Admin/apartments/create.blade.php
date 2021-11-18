@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="h5">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', '') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="h5">Descrizione casa</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="8">{{ old('description', '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image"class="h5">Inserisci foto</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              {{-- indirizzo --}}
              <div class="form-row">
                <div class="form-group col-12  col-md-2">
                    <label for="street" class="h5">Indirizzo</label>
                    <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ old('street', '') }}">
                    @error('street')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="number"class="h5">Numero</label>
                    <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number', '') }}">
                    @error('number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="cap"class="h5">CAP</label>
                    <input type="number" class="form-control @error('cap') is-invalid @enderror" id="cap" name="cap" value="{{ old('cap', '') }}">
                    @error('cap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="city"class="h5">Città</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" min="1" value="{{ old('city', '') }}">
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="province"class="h5">Provincia</label>
                    <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province', '') }}">
                    @error('province')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="region"class="h5">Regione</label>
                    <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="{{ old('region', '') }}">
                    @error('region')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

              <div class="form-row">
            <div class="form-group col-12  col-md-3">
                <label for="n_rooms" class="h5">Numero Stanze</label>
                <input type="number" class="form-control @error('n_rooms') is-invalid @enderror" id="n_rooms" name="n_rooms" min="1" value="{{ old('n_rooms', '') }}">
                @error('n_rooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="n_beds"class="h5">Numero Letti</label>
                <input type="number" class="form-control @error('n_beds') is-invalid @enderror" id="n_beds" name="n_beds" min="1" value="{{ old('n_beds', '') }}">
                @error('n_beds')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="n_baths"class="h5">Numero Bagni</label>
                <input type="number" class="form-control @error('n_baths') is-invalid @enderror" id="n_baths" name="n_baths" min="1" value="{{ old('n_baths', '') }}">
                @error('n_baths')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="sqrmt"class="h5">Metri quadri</label>
                <input type="number" class="form-control @error('sqrmt') is-invalid @enderror" id="sqrmt" name="sqrmt" min="1" value="{{ old('sqrmt', '') }}">
                @error('sqrmt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="h5">Servizi</div>  
            @foreach($services as $service)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}" name="services[]" @if(in_array($service->id, old('services', []))) checked @endif>
                <label class="form-check-label" for="service-{{$service->id}}">{{$service->name}}</label>
              </div>
              @endforeach
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="1" name="visibility" id="visibility">
                <label class="form-check-label" for="visibility">
                  Disponibile
                </label>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
    </div>
@endsection