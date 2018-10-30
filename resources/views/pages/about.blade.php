@extends('layouts.app')
@section('content')
    <section>
        <div class="about parallax text-center">
            <h1 class="display-4 text-white">About Us</h1>
            <p class="lead mb-5 text-white">As the saying goes, "Time is Money" we don't want you lossing anything <br>so we work with the specified time to meet your deadline.</p>
        </div>
    </section>

    <section class=" item-page  clearfix">
        <div class="container">
            <div class="m-auto text-center">
                <h2 class="mt-5 my-5 display-4">Ecole de Dessin.</h2>
                <div class="row">
                    <div class="col-md-10 col-lg-6 text-justify">                    
                        <p class="lead">is a French word meaning “School of Art”. We are an Exponential Marketing Consulting firm, which is a specialised marketing consultancy helping small to medium enterprises, corporate companies develop and deliver practical growth strategies that achieve bottom-line outcomes. Our mission to help clients unleash the maximum market potentials that exist in the market.</p>
                        <p class="lead">They are experiencing events like new product development and roll-out, geographic expansion, brand repositioning that puts an amount of stress on management.</p>
                        <p class="lead">We provide solutions from strategy development to implementation that delivers value to our clients in the areas of; market assessment, marketing plan & strategy development, market research, strategic brand development, customer retainship strategy, business development, turnaround & growth strategy, mentorship & coaching and capital formation.</p>
                    </div>
                    <div class="col-md-10 col-lg-6 text-justify">                    
                        <p class="lead">We also have significant and proven experience building and growing both new and existing businesses in a variety of industries including retail and consumer products, healthcare, manufacturing, high-tech and ICT and professional firms.</p>
                        <p class="lead">Ecole de Dessin is a multiple Guinness World Record holder with a wealth of proven expertise in world class events and PR activation conferences, exhibitions, workshops, launches, corporate theatre, and hospitality, in this regards, it is set up with the aim of strategically inputting an event in the mind of people, using children art as the major communicative tool for social economic change in our society.Our team offers the creative vision, professionalism, and event expertise to create winning events—with a constant eye towards detail, quality, originality, and results.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    
    <section>
        <div class="container">
        <div class="row">
            <div class="item col-xs-4 col-lg-4">
                <div class="thumbnail card">
                    <div class="img-event text-center m-auto">
                        <img class="group list-group-image img-fluid mt-4 my-4" src="{{asset('img/vision.png')}}" alt="" height=50 width=200/>
                    </div>
                    <div class="caption card-body text-center">
                        <h4 class="group card-title inner list-group-item-heading ">VISION</h4>
                        <p class="group inner list-group-item-text">
                        To instill the product in the mind of many. <br>To rank higher than other competing product in the market. <br>Bringing the product to the knowledge of international community.<br>To pronounce the protection of its hygiene
                         </div>
                </div>
            </div>
            <div class="item col-xs-4 col-lg-4">
                <div class="thumbnail card">
                    <div class="img-event text-center m-auto">
                        <img class="group list-group-image img-fluid" src="{{asset('img/mission.png')}}" alt="" height=50 width=200/>
                    </div>
                    <div class="caption card-body text-center">
                        <h4 class="group card-title inner list-group-item-heading">OUR MISSION</h4>
                        <p class="group inner list-group-item-text">
                        To create a platform through which Nigerian Art Students can contribute to the development of the country, and also where art can be used as a tool to positively affect lives.</p>
                    </div>
                </div>
            </div>
            <div class="item col-xs-4 col-lg-4">
                <div class="thumbnail card">
                    <div class="img-event text-center m-auto">
                        <img class="group list-group-image img-fluid mt-4" src="{{asset('img/value.png')}}" alt="" height=30 width=100/>
                    </div>
                    <div class="caption card-body text-center">
                        <h4 class="group card-title inner list-group-item-heading">CORE VALUE</h4>                        
                        <p class="group inner list-group-item-text">
                        To evoke in the minds of all those who love Visual and Creative art, to have a feel of inspiration to create beautiful-artful things with their hands and minds. In addition, there is a perpetual need for adequate dissemination of information on climate change through Visual art and various cultures to students and the state at large in ways not previously explored.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section>
    <div class="container">        
        <div class="row">
            <div class="col-md-10 col-lg-6 m-auto text-center">
                <h2 class="mt-5 my-5 display-4">Why work with us?</h2>   
            </div>
        </div>
    </div>
    </section>  

    <section>
        <div class="container">
            <div class="row">
                <div class="item col-xs-4 col-lg-4">
                    <div class="img-event text-center m-auto">
                        <img class="group list-group-image img-fluid" src="{{asset('img/time.jpg')}}" alt="" />
                        <hr>
                    </div>
                    <div class="caption text-center">
                        <h4 class="">Save Time</h4>
                        <p class="group inner list-group-item-text">As they saying goes, "Time is Money" we don't want you lossing anything so we work with the specified time to meet your deadline.</p>
                    </div>
                </div>

                <div class="item col-xs-4 col-lg-4">
                    <div class="img-event text-center m-auto">
                        <img class="group list-group-image img-fluid" src="{{asset('img/job.jpg')}}" alt="" />
                        <hr>
                    </div>
                    <div class="caption text-center">
                        <h4 class="">Get the job done by professionals</h4>
                        <p class="group inner list-group-item-text">Our team is made up of qualified people who can deliver in their various fields, that is what make us special, every single one of us contributes to make you dream a reality.</p>
                    </div>
                </div>
                
                <div class="item col-xs-4 col-lg-4">
                    <div class="img-event text-center m-auto">
                        <img class="group list-group-image img-fluid" src="{{asset('img/standard.jpg')}}" alt="" />
                        <hr>
                    </div>
                    <div class="caption text-center">
                        <h4 class="">We meet your standard</h4>
                        <p class="group inner list-group-item-text">People always have a standard expected when is job is to be done, that is why we aim higher than your expectation, so we don't fall short.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
    <div class="container text-center">        
        <div class="row">
            <div class="col-md-10 col-lg-6 m-auto">
                <h2 class="mt-5 my-4 display-4">Technical Experience</h2>
                <p>Lets throw a trackie dacks also it'll be gutta. You little ripper avos flamin lets throw a lizard drinking. Gutful of jug where as busy as a big smoke.</p>  
            </div>
        </div>
    </div>
    </section>

    <section>
        <div class="container">
            <div class="box circle clearfix">
                <div class="container text-center">
                <div class="row">
                    <div class="col-xs-4 col-lg-4">
                        <div class="circle-content blue">
                            <h4>Branding</h4>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-4">
                        <div class="circle-content yellow">
                            <h4>Events Mgt</h4>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-4">
                        <div class="circle-content black">
                            <h4>Project Mgt</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-lg-4">
                        <div class="circle-content blue">
                            <h4>Web Design</h4>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-4">
                        <div class="circle-content yellow">
                            <h4>Training</h4>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-4">
                        <div class="circle-content black">
                            <h4>Graphics</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
    <div class="container">        
        <div class="row">
            <div class="col-md-10 col-lg-6 m-auto text-center">
                <h2 class="mt-5 my-4 display-4">Meet the Awesome People</h2>
                <p class="my-4">Our team is made up of qualified people who can deliver in their various fields, that is what make us special, every single one of us contributes to make you dream a reality.</p>  
            </div>
        </div>
    </div>
    </section>


    <section>
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image"><img src="{{ asset('img/team/2.jpg') }}" alt="">
                        <div class="team-wrap">
                            <div class="team-content">
                                <div class="team-name">Emma Connor</div>
                                <div class="team-role">Designer</div>
                            </div>
                            <div class="team-content-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image"><img src="{{ asset('img/team/3.jpg') }}" alt="">
                        <div class="team-wrap">
                            <div class="team-content">
                                <div class="team-name">Richard Bauer</div>
                                <div class="team-role">Developer</div>
                            </div>
                            <div class="team-content-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image"><img src="{{ asset('img/team/1.jpg') }}" alt="">
                        <div class="team-wrap">
                            <div class="team-content">
                                <div class="team-name">Emma Connor</div>
                                <div class="team-role">Designer</div>
                            </div>
                            <div class="team-content-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image"><img src="{{ asset('img/team/4.jpg') }}" alt="">
                        <div class="team-wrap">
                            <div class="team-content">
                                <div class="team-name">Richard Bauer</div>
                                <div class="team-role">Developer</div>
                            </div>
                            <div class="team-content-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image"><img src="{{ asset('img/team/5.jpg') }}" alt="">
                        <div class="team-wrap">
                            <div class="team-content">
                                <div class="team-name">Richard Bauer</div>
                                <div class="team-role">Developer</div>
                            </div>
                            <div class="team-content-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-item">
                    <div class="team-image"><img src="{{ asset('img/team/6.jpg') }}" alt="">
                        <div class="team-wrap">
                            <div class="team-content">
                                <div class="team-name">Richard Bauer</div>
                                <div class="team-role">Developer</div>
                            </div>
                            <div class="team-content-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection