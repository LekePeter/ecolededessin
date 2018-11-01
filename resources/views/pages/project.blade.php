@extends('layouts.app')
@section('content')
<section style="background:#fff; width: 90%; padding: 30px">
    <div class="row">                     
        @if($project)
			<div class="span10">
				<div>
					<a href="project/{{$project->id}}">
						<img src="storage/images/{{$project->img1}}">
					</a>
					<div class="caption">
						<h4>{!!$project->title!!}</h4>
						<p>{!!$project->body!!}</p>
						<p style="text-align: center;">
							<a href="#" class="btn btn-danger pull-right">Sponsor</a>
						</p>
					</div>
				</div>
			</div>
        @endif
</div>            
</section>

@endsection