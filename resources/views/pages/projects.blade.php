@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/bootstrap-grid.css">            
    <section>
        <div class="parallax project text-center">
            <div class="container">
                <h1 class="display-4 text-white">A Handful of Projects</h1>
                <p class="lead mb-5 text-white">Ecole De Dessin projects, <br>more to come .</p>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="card-group my-4">            
                @if($projects)
                    @foreach($projects as $project)     
                        <div class="col-xs-4 col-lg-4">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('img/project').'/'.$project->img1}}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{$project->title}}</h4>
                                    <p class="card-text">{{$project->body}}</p>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="project/{{$project->id}}">Details</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection