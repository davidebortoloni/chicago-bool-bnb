@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('admin.apartments.update', $apartment->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="description" class="h5">Descrizione appartamento</label>
                <textarea class="form-control" id="description" name="description" rows="8"></textarea>
            </div>
            <div class="form-group">
                <label for="image"class="h5">Inserisci immagine</label>
                <input type="file" class="form-control-file" id="image" name="image">
              </div>
              <div class="form-row">
            <div class="form-group col-12  col-md-3">
                <label for="n_rooms" class="h5">Numero Stanze</label>
                <input type="number" class="form-control" id="n_rooms" name="n_rooms" min="0">
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="n_beds"class="h5">Numero Letti</label>
                <input type="number" class="form-control" id="n_beds" name="n_beds" min="0">
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="n_baths"class="h5">Numero Bagni</label>
                <input type="number" class="form-control" id="n_baths" name="n_baths" min="0">
            </div>
            <div class="form-group col-12  col-md-3">
                <label for="n_baths"class="h5">Metri quadri</label>
                <input type="number" class="form-control" id="n_baths" name="n_baths" min="0">
            </div>
            </div>
            <div class="h5">Servizi</div>  
            @foreach($services as $service)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="" value="{{$service->id}}">
                <label class="form-check-label" name="{{$service->name}}" for="{{$service->name}}">{{$service->name}}</label>
              </div>
              @endforeach
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="1" name="visibility"id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Disponibile
                </label>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
    </div>
@endsection