@extends('layouts.app')
@section('content')

    <section>
        <div class="jumbotron text-center">
            <h1 class="display-4 text-white">Contact Us</h1>
            <p class="lead mb-5 text-white">You can use our contact form on the left to send your inquiries directly to us.<br>Ecole De Dessin team want to hear from you</p>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-10 col-lg-6 m-auto text-center">
                <h2>Let's talk.</h2>
                <p class="lead">Our team is made up of qualified people who can deliver in their various fields, that is what make us special, every single one of us contributes to make <br>you dream a reality.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="my-5 text-center">        
        <div class="row">
        <div class="col-md-10 col-lg-6 m-auto text-center">
            <!--Form with header-->
            <div class="card border-primary rounded-0">

                <div class="card-header p-0">
                    <div class="bg-primary text-white text-center py-2">
                        <h3><i class="fa fa-envelope"></i> Write to us:</h3>
                        <p class="m-0">We'll write rarely, but only the best content.</p>
                    </div>
                </div>
                <div class="card-body p-3">

                    <!--Body-->
                    <div class="form-group">
                        <label>Name*</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email*</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject*</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <textarea class="form-control" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary btn-block rounded-0 py-2">Submit</button>
                    </div>

                </div>

            </div>
            <!--Form with header-->
            </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row text-center">
            <div class="col-md-4">
                <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                <p>77 Itire Road , Surulere, <br>Lagos, Nigeria.</p>
                
            </div>

            <div class="col-md-4">
                <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                <p>+234-8059994834, <br> +234(01)875 9962</p>
            </div>

            <div class="col-md-4">
                <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                <p> info@ecolededessin.org <br></p>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=77%20Itire%20Road%20%2C%20Surulere%2C%20Lagos%2C%20Nigeria.+(Ecole%20De%20Dessin)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>    
    </section>
    

@endsection