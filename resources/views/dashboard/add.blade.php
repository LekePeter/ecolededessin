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
        <div class="col-md-12 col-lg-8">
            <!--Form with header-->
            <div class="card rounded-0">
                <div class="card-body p-3">

                    <!--Body-->
                    <form action="{{url('/dashboard/store')}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-muted"><b>Project title*</b></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-muted"><b>Project subtitle*</b></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="subtitle" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-muted"><b>Details extract</b> <small class="text-muted">(for homepage display)</small></label>
                            <textarea class="form-control" id="exampleInputEmail1" name="extract" row=2 maxLength=50></textarea>
                            <small id="emailHelp" class="form-text text-muted" required>Max: 50</small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-muted"><b>Details summary</b> <small class="text-muted">(for projects display)</small></label>
                            <textarea class="form-control" id="exampleInputEmail1" name="summary" row=2 maxLength=180></textarea>
                            <small id="emailHelp" class="form-text text-muted">Max: 180</small>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2 mb-sm-0">
                            <label for="exampleInputEmail1" class="text-muted"><b>Full details</b></label>                                
                                <textarea class="form-control" rows="10" name="body" placeholder="Project Full Details" id="article-ckeditor" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group">
                                        <label for=""><small>For homepage 300x300</small></label>
                                        <input type="file" class="form-control-file" id="inlineFormInputGroupUsername" name="image1">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <label for=""><small>For project listing 320x200</small></label>
                                        <input type="file" class="form-control-file" id="inlineFormInputGroupUsername" name="image2">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <label for=""><small>For project full details 1200x600</small></label>
                                        <input type="file" class="form-control-file" id="inlineFormInputGroupUsername" name="image3">
                                    </div>
                                </div>
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