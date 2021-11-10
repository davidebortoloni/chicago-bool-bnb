@if($apartment->exists)
<form method="POST" action="{{ route("admin.apartments.update", $apartment->id) }}">
    @method("PATCH")
    @else
    <form method="POST" action="{{route("admin.apartments.store")}}">
    @endif
    
    @csrf

    {{-- address section --}}
    <section class="address">

        <div class="form-group">
            <label for="region">Regione</label>
            <input type="text" class="form-control @error("region") is-invalid @enderror" id="region" name="region" placeholder="Regione" value="{{$address->region}}">
        </div> 
        
        <div class="form-group">
            <label for="province">Provincia</label>
            <input type="text" class="form-control @error("province") is-invalid @enderror" id="province" name="province" placeholder="Provincia" value="{{$address->province}}">
        </div> 
        
        <div class="form-group">
            <label for="city">Città</label>
            <input type="text" class="form-control @error("city") is-invalid @enderror" id="city" name="city" placeholder="Città" value="{{$address->city}}">
        </div>

        <div class="form-group">
            <label for="street">Via</label>
            <input type="text" class="form-control @error("street") is-invalid @enderror" id="street" name="street" placeholder="Via/Viale/Piazza" value="{{$address->street}}">
        </div>

        <div class="form-group">
            <label for="number">Numero</label>
            <input type="text" class="form-control @error("number") is-invalid @enderror" id="number" name="number" placeholder="Numero" value="{{$address->number}}">
        </div>

        <div class="form-group">
            <label for="cap">Cap</label>
            <input type="text" class="form-control @error("cap") is-invalid @enderror" id="cap" name="cap" placeholder="Cap" value="{{$address->cap}}">
        </div>

        <div class="form-group">
            <label for="lat">lat</label>
            <input type="text" class="form-control @error("lat") is-invalid @enderror" id="lat" name="lat" placeholder="lat" value="{{$address->lat}}">
        </div>

        <div class="form-group">
            <label for="lon">lon</label>
            <input type="text" class="form-control @error("lon") is-invalid @enderror" id="lon" name="lon" placeholder="lon" value="{{$address->lon}}">
        </div>

    </section>

    {{-- apartment section --}}

    <section class="apartment">

        <div class="form-group">
            <label for="n_rooms">Camere</label>
            <input type="text" class="form-control @error("n_rooms") is-invalid @enderror" id="n_rooms" name="Numero camere" placeholder="n_rooms" value="{{$address->lon}}">
        </div>

        <div class="form-group">
            <label for="n_beds">Posti letto</label>
            <input type="text" class="form-control @error("n_beds") is-invalid @enderror" id="n_beds" name="Numero posti letto" placeholder="n_beds" value="{{$address->lon}}">
        </div>

        <div class="form-group">
            <label for="n_baths">Bagni</label>
            <input type="text" class="form-control @error("n_baths") is-invalid @enderror" id="n_baths" name="Numero bagni" placeholder="n_baths" value="{{$address->lon}}">
        </div>

        <div class="form-group">
            <label for="sqrmt">Metri quadrati</label>
            <input type="text" class="form-control @error("sqrmt") is-invalid @enderror" id="sqrmt" name="Metri quadrati" placeholder="sqrmt" value="{{$address->lon}}">
        </div>

        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Inserisci l'Url dell'immagine" value="{{$apartment->image}}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control  @error("description") is-invalid @enderror" id="description" name="description" rows="5">{{$apartment->description}}</textarea>
        </div>

    </section>


    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">{{$save}}</button>
        <a href="{{route("admin.apartments.index")}}" class="btn btn-secondary">Indietro</a>
    </div>
</form>