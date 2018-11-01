@extends('layouts.app')
@section('content')    
<section style="background:#fff; width: 90%;">
    <ul class="thumbnails">                     
        @if($projects)
            @foreach($projects as $project)     
                <li class="span5">
                    <div class="thumbnail">
                        <a href="project/{{$project->id}}" class="thumbnail" data-aos="zoom-out">
                            <img src="storage/images/{{$project->img1}}" alt="" style="width: 300px; height: 200px;">
                        </a>
                        <div class="caption" data-aos="flip-right">
                            <h4>{!!str_limit($project->title, 20)!!}</h4>
                            <p>{!!str_limit($project->body, 70)!!}</p>
                            <br />
                            <small>
                                <span> 1.1k Views</span>
                                <span>  </span>
                                <span> 3 Sponsors</span>
                            </small>
                            <small style="text-align: right;" class="pull-right">
                                <a class="btn btn-mini btn-primary" href="project/{{$project->id}}">Details</a>
                                <a href="#" class="btn btn-mini btn-danger">Sponsor</a>
                            </small>
                        </div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>            
</section>
@endsection