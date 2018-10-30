@extends('layouts.admin')

@section('content')
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
                                <img class="card-img-top" src="storage/images/{{$project->img_url}}" alt="Card image cap" width="200" height="200">
                                <div class="card-body">
                                    <h4 class="card-title">{{str_limit($project->title, 50)}}</h4>
                                    <p class="card-text">{!!str_limit($project->body, 50)!!}</p>
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="dashboard/project/{{$project->id}}">Details</a>
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