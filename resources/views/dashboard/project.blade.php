@extends('layouts.admin')
@section('content')
    <section>
        <div class="container">
            <div class="col-xs-4 col-md-10">
                <div class="card">
                    <img class="card-img-top" src="storage/images/{{$project->img_url}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{$project->title}}</h4>
                        <p class="card-text">{!!$project->body!!}</p>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger float-right">Delete</button>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection