@extends('layouts.admin')

@section('content')
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
        <div class="col-md-12 col-lg-8 m-auto">
            <!--Form with header-->
            <div class="card border-primary rounded-0">
                <div class="card-body p-3">

                    <!--Body-->
                    <form action="{{url('/dashboard/store')}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title*</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Project Title" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">SubTitle*</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="subtitle" placeholder="Project Subtitle" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Details Extract</label>
                            <textarea class="form-control" id="exampleInputEmail1" name="extract" row=2 placeholder="Details extract" maxLength=50></textarea>
                            <small id="emailHelp" class="form-text text-muted" required>Max: 50</small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Details Summary</label>
                            <textarea class="form-control" id="exampleInputEmail1" name="summary" row=2 placeholder="Details summary" maxLength=180></textarea>
                            <small id="emailHelp" class="form-text text-muted">Max: 180</small>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2 mb-sm-0">
                                <textarea class="form-control" rows="10" name="body" placeholder="Project Full Details" id="article-ckeditor" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label for="">For HomePage 200x200</label>
                                <input type="file" class="form-control-file" id="inlineFormInputGroupUsername" name="image">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control-file" id="inlineFormInputGroupUsername">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control-file" id="inlineFormInputGroupUsername">
                            </div>
                        </div> -->

                        <div class="text-center">
                            <button class="btn btn-primary rounded-0 py-2">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
            <!--Form with header-->
            </div>
            </div>
        </div>
    </section>
    <script src="vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

@endsection