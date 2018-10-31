@extends('layouts.admin')

@section('content')
 
            <section>
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-warning mb-3" data-aos="flip-left" style="max-width: 18rem;">
                            <div class="card-header">Projects & Events</div>
                            <div class="card-body">
                                <h5 class="card-title">50 Projects Done</h5>
                                <p class="card-text"><?php date('Y')?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-primary mb-3" data-aos="zoom-out" style="max-width: 18rem;">
                            <div class="card-header">Sponsor</div>
                            <div class="card-body">
                                <h5 class="card-title">10 project sponsored</h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-danger mb-3" data-aos="zoom-in" style="max-width: 18rem;">
                            <div class="card-header">Last Project</div>
                            <div class="card-body">
                                <h5 class="card-title">Frank Edo</h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-secondary mb-3" data-aos="flip-right" style="max-width: 18rem;">
                            <div class="card-header">Team</div>
                            <div class="card-body">
                                <h5 class="card-title">Team of Four</h5>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <section class="mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-white bg-info mb-3" data-aos="flip-right">
                            <div class="card-header">Coming up events</div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 offset-md-3">
                        <div class="card text-white bg-success mb-3" data-aos="flip-right">
                            <div class="card-header">Past events</div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection
