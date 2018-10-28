@extends('dashboard.index')
@section('dash_content')
    <section>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
        <div class="container">        
        <div class="row">
        <div class="col-md-12 col-lg-8 m-auto text-center">
            <!--Form with header-->
            <div class="card border-primary rounded-0">

                <div class="card-header p-0">
                    <div class="bg-default text-center py-2">
                        <h3><i class="fa fa-plus"></i> Add New Project </h3>
                        <p class="m-0"></p>
                    </div>
                </div>
                <div class="card-body p-3">

                    <!--Body-->
                    <form action="{{url('/dashboard/store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="title" placeholder="Project Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2 mb-sm-0">
                                <textarea class="form-control" rows="10" name="body" placeholder="Project Title"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control-file" id="inlineFormInputGroupUsername">
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary btn-block rounded-0 py-2">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
            <!--Form with header-->
            </div>
            </div>
        </div>
    </section>

@endsection