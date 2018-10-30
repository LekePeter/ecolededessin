@extends('layouts.app')
@section('content')
<section id="t3-mainbody" class="container t3-mainbody">
            <!-- MAIN CONTENT -->
            <div id="t3-content" class="t3-content">
                <div id="system-message-container">
                    <div id="system-message"></div>
                </div>
                <div class="fixel-grid-wrapper">
                    <div id="fixel-grid" class="fixel-grid blog-featured clearfix">
                        <div class="items  grid-2x2 grid-pos-1 highlight big-padding">
                            <article>
                                <div class="t3-module module   highlight big-padding " id="Mod90">
                                    <div class="module-inner">
                                        <div class="module-ct">
                                            <div class="jamasshead grid-2x2 grid-pos-1 highlight big-padding">
                                                <h3 class="jamasshead-title">Hello</h3>
                                                <div class="jamasshead-description">
                                                    <h3></br>Have a feel of inspiration </h3>
                                                    Ecole De Dessin
                                                    Our team of Writers, Art Directors, Web Developers and Project Managers.
                                                </div>
                                                <div class="jamasshead-description">
                                                    <br>
                                                    <button class="btn btn-primary">Project & Events </button>
                                                    <button class="btn btn-primary">Services </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @if($projects)
                            @foreach($projects as $project)                       
                        <div class="items print-design rotateX image grid-1x1">
                            <!-- Article -->
                            <article>
                                <div class="item-image-wrap flipper">
                                    <div class="item-image front">
                                        <a class="article-link" href="/88-demo-contents/print-design/126-a-day-with-frank-edoho" title="A day with Frank Edoho">
                                        <img title="A day with Frank Edoho" src="storage/images/{{$project->img_url}}" alt="A day with Frank Edoho" />
                                        </a>
                                    </div>
                                    <div class="item-desc back">
                                        <h2 class="article-title">
                                            <a class="article-link" href="/88-demo-contents/print-design/126-a-day-with-frank-edoho">{{$project->title}}</a>
                                        </h2>
                                        <section class="article-intro clearfix">
                                            <p class="MsoNormal">{!!str_limit($project->body, 50)!!}</p>
                                        </section>
                                        <div class="jamasshead-description" style="text-align: center;">
                                            <br>
                                            <a class="btn btn-primary" href="project/{{$project->id}}">Details</a>
                                            <a class="btn btn-primary">Sponsor </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- //Article -->
                        </div>
                            @endforeach
                        @endif                        
                    </div>
                    <div id="fixel-placeholder" class="fixel-placeholder">
                        <div class="ajax-indicator">Loading...</div>
                    </div>
                </div>
            </div>
            <!-- //MAIN CONTENT -->
        </section>
@endsection
