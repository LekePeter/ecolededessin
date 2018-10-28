@extends('layouts.app')
@section('content')
<section>
    <div class="">
        <div class="parallax home text-center">
            <h1 class="display-4 text-white">Hello!<br>Have a feel of inspiration</h1>
            <p class="lead mb-5 text-white">Ecole De Dessin Our team of Writers, Art Directors, <br>Web Developers and Project Managers.</p>
            <a class="btn btn-lg btn-primary active" href="project" role="button">Project</a>
            <a class="btn btn-lg btn-outline-primary" href="service" role="button">Service</a>
        </div>
    </div>
</section>
@include('inc.clients')
@endsection
