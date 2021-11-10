@extends('layouts.app')

@section('content')
<div class="container">

    @include('includes.errors_alert')

    <header>
        <h1>Modifica appartamento</h1>
    </header>
        <section id="form">
            @include("includes.admin.apartments.form")
        </section>

</div>
@endsection 