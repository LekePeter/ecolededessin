@extends('dashboard.index')
@section('dash_content')
    <section>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </section>
    <section>
        <div class="container">
            <div class="card-group my-4">            
                @if($projects)
                    @foreach($projects as $project)     
                        <div class="col-xs-4 col-lg-4">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('img/project').'/'.$project->img_url}}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{$project->title}}</h4>
                                    <p class="card-text">{{$project->body}}</p>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-warning">Edit</a>
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