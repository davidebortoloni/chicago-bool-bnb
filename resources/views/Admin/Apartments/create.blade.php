@extends('layouts.app')

@section('content')
<div class="container">

    @include('includes.errors_alert')

    <header>
        <h1>Aggiungi appartamento</h1>
    </header>
        <section id="form">
            @include("includes.admin.apartment.form")
        </section>

</div>
@endsection 