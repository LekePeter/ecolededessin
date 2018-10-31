@extends('layouts.app')

<section>
<div class="row">
	<div id="t3-content" class="t3-content span12">
		<div class="main-content">
			<div id="system-message-container" style="display: none;">
				<div id="system-message"></div>
			</div>
			<div class="item-page  clearfix">
				<!-- Article -->
				<article>
					<header class="article-header clearfix">
						<h1 class="article-title">
						</h1>
					</header>
					<!-- Aside -->
					<aside class="article-aside clearfix">
						<dl class="article-info pull-left">
							<dd class="published"> 
				on 30 July 2013 
			</dd>
						</dl>
					</aside>
					<!-- //Aside -->
					<section class="article-content clearfix" style="margin-left: 0">
						<div class="box clearfix">
                        </div>
</div>
					
					

</section>
@section('content')
    <section>
        <div class="t1-content span12">
            <div class="item-page  clearfix">
                <div class="article-content clearfix">
                    <div class="container" style="padding:3em !important;">
                        <div class="col-xs-4 col-lg-10">
                            <div class="card">
                                <img class="card-img-top" src="storage/images/{{$project->img1}}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">{{$project->title}}</h4>
                                    <p class="card-text">{!!$project->body!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection