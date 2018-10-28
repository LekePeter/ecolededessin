@extends('layouts.app')
@section('content')
    <section>
        <div class="parallax project text-center">
            <div class="container">
                <h1 class="display-4 text-white">A Handful of Projects</h1>
                <p class="lead mb-5 text-white">Ecole De Dessin projects, <br>more to come .</p>
            </div>
        </div>
    </section>
    
<section>
    <div class="container">
    <div class="card-group my-4">
    <div class="col-xs-4 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/project/noImage.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">June 12 with Nigeria Contemporary Artist.</h4>
                    <p class="card-text">June 12 with Nigeria Contemporary Artist. The event was a bridge to link the visual, performing and literary arm of the entertainment industry together with the aim of promoting Art from the grassroots.It featured artistes from the different genres and they had the opportunity to interact with children with each ambassador highlighting the importance of their trade to the overall development of the entertainment industry.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Details</a>
                        <a href="#" class="btn btn-primary">Sponsor</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-4 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/project/1.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">The Deputy Governor of Lagos State read in commemoration of the World Literacy day</h4>
                    <p class="card-text">The Deputy Governor of Lagos State read in commemoration of the World Literacy day, which set a new Guinness World Record with 4222 children reading with an adult.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Details</a>
                        <a href="#" class="btn btn-primary">Sponsor</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/project/2.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">The Nigeria I See painting competition to celebrate Nigeria at 50</h4>
                    <p class="card-text">FCMB and UNICEF (The Nigeria I See painting competition to celebrate Nigeria at 50). The aim of this event was to actively involve young Nigerians to appreciate the beauty and exciting possibilities that they have in the country.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Details</a>
                        <a href="#" class="btn btn-primary">Sponsor</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="card-group my-4">
        <div class="col-xs-4 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/project/3.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">World Largest palm print to celebrate Nigeria at 52.</h4>
                    <p class="card-text">World Largest palm print to celebrate Nigeria at 52.This was an art exhibition and workshop for children to celebrate Nigeria independence day.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                    <a href="#" class="btn btn-primary">Sponsor</a>
                </div>
            </div>
        </div>

        <div class="col-xs-4 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/project/4.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Project 100 School Survey with Lifebuoy Soap on hand washing.</h5>
                    <p class="card-text">Project 100 School Survey with Lifebuoy Soap on hand washing. This event was activated to teach children in selected schools on how to effectively wash their hands. One hundred primary schools benefitted from this exercise. Not only were they taught how to wash their hands for the moment, they children were also encouraged to make a pledge to make hand washing a lifestyle.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                    <a href="#" class="btn btn-primary">Sponsor</a>
                </div>
            </div>
        </div>

        <div class="col-xs-4 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img/project/5.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Survival of the Nigerian Child</h5>
                    <p class="card-text">Survival of the Nigerian Child: A Photography to Painting Competition. This event was used to support UNICEF in commemoration of the International Day of the African Child.The focus of the event was to draw attention of the plight of the underprivileged Nigerian child using a picture to painting competition. Students from selected primary schools took pictures that capture their plight. These pictures were later drawn to give an artistic essence to the event.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                    <a href="#" class="btn btn-primary">Sponsor</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection