@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('admin.apartments.update', $apartment->id) }}" enctype="multipart/form-data">
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
              {{-- indirizzo --}}
              <div class="form-row">
                <div class="form-group col-12  col-md-2">
                    <label for="street" class="h5">Via</label>
                    <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="">
                    @error('street')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="number"class="h5">Numero</label>
                    <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="">
                    @error('number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="cap"class="h5">CAP</label>
                    <input type="text" class="form-control @error('cap') is-invalid @enderror" id="cap" name="cap" value="">
                    @error('cap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="city"class="h5">Città</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" min="1" value="">
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="province"class="h5">Provincia</label>
                    <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="">
                    @error('province')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-12  col-md-2">
                    <label for="region"class="h5">Regione</label>
                    <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="">
                    @error('region')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
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
                <input type="number" class="form-control @error('sqrmt') is-invalid @enderror" id="n_baths" name="sqrmt" min="0" value="{{$apartment->sqrmt}}">
                @error('sqrmt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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