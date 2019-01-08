@extends('layouts.app2')

@section('style')
    <style>
        .single-service {
            height: 340px !important;
        }

        .image-hover {
            opacity: 0.6;
        }

        .image-hover:hover {
            opacity: 1;
        }

        @media only screen and (max-width: 1200px) {  

            #typed {
            height: 100px;
            margin-bottom: 10px;
            }

        }
    </style>
@endsection

@section('content')
    <!-- start banner Area -->
<section class="banner-area relative mobile" id="home">
    <div class="overlay overlay-bg"></div>	
    <div class="container">        
        <div class="row flex-fill d-flex align-items-center justify-content-center" id="home2">    
            <div class="banner-content col-lg-12 mobile">                
                <h1 class="text-white">
                    Liga Medika 2019			
                </h1>
                <p class="pt-20 pb-20 text-white" style="font-size:16px">
                    Liga Medika is the biggest event held by the students of Faculty of Medicine University Indonesia. Liga Medika was held for the first time in 2006 and still held annually until this year. Liga Medika consists of scientific competitions, arts competitions, and sports competition. We also want to raise public awareness about our theme with our campaign project and held a concert as the closing ceremony.
                </p>
                <h3 class="text-white pb-10">This year's theme</h3>
                <h3 class="text-white pb-10 uppercase" id="theme" style="font-size: 72px;">Psychiatry</h3>
                <h3 class="text-white pb-20">with our tagline</h3>
                <h3 class="text-white pb-20 uppercase" style="font-size: 48px" id="tagline"><i>#KenaliJiwa</i></h3>
{{--                 <h2 class="text-inamsc pb-20"> --}}
                <h2 class=" pb-20">
                    Registration for INAMSC is now Open!
                </h2>
                <a href="{{url('register')}}" class="primary-btn text-uppercase">Register Here</a>
  
            </div>											
        </div>
    </div>					
</section>
<!-- End banner Area -->	

<!-- Start service Area -->
<section class="exibition-area service-area pt-100" id="about">
    <div class="container">
            <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h2 class="mb-10">Events</h2>                            
                        </div>
                    </div>
                </div>	
        <div class="row">
            <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="single-service">
                            <span class="lnr lnr-pencil"></span>
                            <h4>INAMSC</h4>
                            <p>
                            <strong>First Wave Submission:</strong><br> 23 rd December 2018 – 20 th January
                            2019 <br>
                            <strong>Second Wave Submission:</strong> <br> 21 st January 2019 – 17 th February 2019
                            </p>						 	
                            <div class="overlay">
                            <div class="text">
                            <p class="text-justify">
                                    INAMSC (Indonesian international (bio)medical student's congress) is the biggest scientific event and competition for biomedic students in indonesia. INAMSC is open not only for national participants, but INAMSC is also open for international participants.
                                </p>
                                <a href="{{url('inamsc/guidelines')}}" target="_blank" class="mb-1"><strong>Read Guidelines</strong></a> <br>
                            <a href="{{url('inamsc')}}" class="text-uppercase primary-btn">Info</a>
                            </div>
                            </div>
                        </div>							
                    </div>
                    <div class="item">
                        <div class="single-service">                  
                            <span class="fa fa-paint-brush"></span>
                            <h4>IMARC</h4>
                            <p>
                            <i>Hover for info</i>
                            </p>						 	
                            <div class="overlay">
                            <div class="text">
                                <p class="text-justify">
                                        IMARC (Indonesian Medical Art Competition) is a reputable medical arts competition the biggest kind  in Indonesia, comprised of traditional dance & vocal group for health science faculty students and band & photography for students from any kind of faculty
                                </p>
                                <a href="#" class="text-uppercase primary-btn">Info</a>
                            </div>
                            </div>
                        </div>							
                    </div>            
                    <div class="item">
                        <div class="single-service">
                            <span class="fa fa-futbol-o"></span>
                            <h4>IMSSO</h4>
                            <p>
                                <i>Hover for info</i>
                            </p>						 	
                            <div class="overlay">
                            <div class="text">
                                <p class="text-justify">
                                        IMSSO is a renowned sports competition aimed for medicine and dental medicine university students in Indonesia. This year we have basketball and futsal.
                                </p>
                                <a href="#" class="text-uppercase primary-btn">Info</a>
                            </div>
                            </div>
                        </div>							
                    </div>			
                    <div class="item">
                        <div class="single-service">
                                <span class="lnr lnr-music-note"></span>
                            <h4>HFGM</h4>
                            <p>
                                <i>Hover for info</i>
                            </p>						 	
                            <div class="overlay">
                            <div class="text">
                                <p class="text-justify">
                                    HFGM is a celebrated event comprised of health campaign activites to raise the awareness about the mental health, and the final event including a concert and exhibition
                                </p>
                                <a href="#" class="text-uppercase primary-btn">Info</a>
                            </div>
                            </div>
                        </div>							
                    </div>

                    <div class="item">
                        <div class="single-service">
                                <span class="fa fa-building-o"></span>
                            <h4>INAMSC SOCIAL PROGRAMME</h4>
                            <p>
                                <i>Hover for info</i>
                            </p>						 	
                            <div class="overlay">
                            <div class="text">
                                <p class="text-justify">
                                    Social Programme is an additional program of INAMSC 2019. The aims of this event are to facilitate the participants to get to know more about other participants and also to introduce some of Indonesia culture and iconic place in Jakarta. This program consist of two main events which is Indonesian Medical Education Research and Institute (IMERI) museum and lab tour, and Jakarta city tour.
                                </p>
                                <a href="#" class="text-uppercase primary-btn">Info</a>
                            </div>
                            </div>
                        </div>							
                    </div>


            </div>

            										
        </div>
    </div>	
</section>


<section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h2 class="mb-10 text-white">Our Exhibition Gallery</h2>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p> --}}
                    </div>
                </div>
            </div>						
            <div id="grid-container" class="row">
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/litrev.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/litrev.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/litrev2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/litrev2.JPG')}}"></a>

                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/pposter.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/pposter.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/pposter2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/pposter2.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/rpp.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/rpp.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/rpp2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/rpp2.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/sym.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/sym.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/workshop.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/workshop.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/inamsc/workshop2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/workshop2.JPG')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/hfgm/hfgm2.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm2.jpg')}}"></a>
                <a class="single-gallery image-hover  wow slideInUp" href="img/ligmed/hfgm/hfgm3.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm3.jpg')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/hfgm/hfgm3.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm1.jpg')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/imsso/imsso1.jpg"><img class="grid-item" src="{{asset('img/ligmed/imsso/imsso1.jpg')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/imsso/imsso2.jpg"><img class="grid-item" src="{{asset('img/ligmed/imsso/imsso2.jpg')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/imarc/imarc1.jpg"><img class="grid-item" src="{{asset('img/ligmed/imarc/imarc1.jpg')}}"></a>
                <a class="single-gallery image-hover wow slideInUp" href="img/ligmed/imarc/imarc2.jpg"><img class="grid-item" src="{{asset('img/ligmed/imarc/imarc2.jpg')}}"></a>

            </div>	
        </div>	
    </section>

@section('script')
<script src="https://unpkg.com/typewriter-effect/dist/core.js"></script>
<script>
  var app = document.getElementById('typed');

    var typewriter = new Typewriter(app, {
        loop: true,
        strings: ['Registration for INAMSC is now Open!'],
        autoStart: true,
    });

  $("#nav-home").addClass("menu-active");

  $('.owl-carousel').owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    responsive: {
        0:{
            items:1,
            nav:false
        },
        600:{
            items:3,
            nav:false
        }, 
        1000: {
            items: 3
        }
    },
    dots: true
});
    
</script>    
        

@endsection
<!-- End service Area -->

{{-- TODO: --}}
{{-- 
<!-- Start quote Area -->
<section class="quote-area section-gap">
    <div class="container">				
        <div class="row">
            <div class="col-lg-6 quote-left">
                <h1>
                    <span>Music</span> gives soul to the universe, <br>
                    wings to the <span>mind</span>, flight <br>
                    to the <span>imagination</span>.
                </h1>
            </div>
            <div class="col-lg-6 quote-right">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
        </div>
    </div>	
</section>
<!-- End quote Area -->

<!-- Start exibition Area -->
<section class="exibition-area section-gap" id="exhibitions">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Ongoing Exhibitions from the scratch</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>						
        <div class="row">
            <div class="active-exibition-carusel">
                <div class="single-exibition item">
                    <img src="img/e1.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>

                <div class="single-exibition item">
                    <img src="img/e2.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>

                <div class="single-exibition item">
                    <img src="img/e3.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>							
                <div class="single-exibition item">
                    <img src="img/e1.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>

                <div class="single-exibition item">
                    <img src="img/e2.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>

                <div class="single-exibition item">
                    <img src="img/e3.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>							
                <div class="single-exibition item">
                    <img src="img/e1.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>

                <div class="single-exibition item">
                    <img class="img-fluid" src="img/e2.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>

                <div class="single-exibition item">
                    <img class="img-fluid" src="img/e3.jpg" alt="">
                    <ul class="tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Life style</a></li>
                    </ul>
                    <a href="#"><h4>Portable latest blog for women</h4></a>
                    <p>
                        Lorem ipsum dolor sit amet, consec teturadip isicing elit, sed do eiusmod tempor.
                    </p>
                    <h6 class="date">31st January, 2018</h6>
                </div>
            </div>													
        </div>
    </div>	
</section>
<!-- End exibition Area -->			

<!-- Start upcoming-event Area -->
<section class="upcoming-event-area section-gap" id="events">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Checkout our Upcoming Events</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>						
        <div class="row">
            <div class="col-lg-6 event-left">
                <div class="single-events">
                    <img class="img-fluid" src="img/u1.jpg" alt="">
                    <a href="#"><h4>Event on the rock solid carbon</h4></a>
                    <h6><span>21st February</span> at Central government museum</h6>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">View Details</a>
                </div>
                <div class="single-events">
                    <img class="img-fluid" src="img/u3.jpg" alt="">
                    <a href="#"><h4>Event on the rock solid carbon</h4></a>
                    <h6><span>21st February</span> at Central government museum</h6>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">View Details</a>
                </div>							
            </div>
            <div class="col-lg-6 event-right">
                <div class="single-events">
                    <a href="#"><h4>Event on the rock solid carbon</h4></a>
                    <h6><span>21st February</span> at Central government museum</h6>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">View Details</a>
                    <img class="img-fluid" src="img/u2.jpg" alt="">
                </div>
                <div class="single-events">
                    
                    <a href="#"><h4>Event on the rock solid carbon</h4></a>
                    <h6><span>21st February</span> at Central government museum</h6>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">View Details</a>
                    <img class="img-fluid" src="img/u4.jpg" alt="">
                </div>							
            </div>
        </div>
    </div>	
</section>
<!-- End upcoming-event Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Latest From Our Blog</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
                </div>
            </div>
        </div>					
        <div class="row">
            <div class="item col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b1.jpg" alt="">								
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="#"><h4>Addiction When Gambling
                Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>									
            </div>
            <div class="item col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b2.jpg" alt="">								
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="#"><h4>Addiction When Gambling
                Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>									
            </div>
            <div class="item col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b3.jpg" alt="">								
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="#"><h4>Addiction When Gambling
                Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>									
            </div>
            <div class="item col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="img/b4.jpg" alt="">								
                </div>
                <p class="date">10 Jan 2018</p>
                <a href="#"><h4>Addiction When Gambling
                Becomes A Problem</h4></a>
                <p>
                    inappropriate behavior ipsum dolor sit amet, consectetur.
                </p>
                <div class="meta-bottom d-flex justify-content-between">
                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                </div>									
            </div>							
        </div>
    </div>	
</section> --}}
<!-- End blog Area -->



<!-- Start gallery Area -->
{{-- <section class="gallery-area section-gap" id="gallery">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10 text-white">Our Exhibition Gallery</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
                </div>
            </div>
        </div>						
        <div id="grid-container" class="row">
            <a class="single-gallery " href="img/g1.jpg"><img class="grid-item" src="img/g1.jpg"></a>
            <a class="single-gallery " href="img/g2.jpg"><img class="grid-item" src="img/g2.jpg"></a>
            <a class="single-gallery " href="img/g3.jpg"><img class="grid-item" src="img/g3.jpg"></a>
            <a class="single-gallery " href="img/g4.jpg"><img class="grid-item" src="img/g4.jpg"></a>
            <a class="single-gallery " href="img/g5.jpg"><img class="grid-item" src="img/g5.jpg"></a>
            <a class="single-gallery " href="img/g6.jpg"><img class="grid-item" src="img/g6.jpg"></a>
            <a class="single-gallery " href="img/g7.jpg"><img class="grid-item" src="img/g7.jpg"></a>
            <a class="single-gallery " href="img/g8.jpg"><img class="grid-item" src="img/g8.jpg"></a>
            <a class="single-gallery " href="img/g9.jpg"><img class="grid-item" src="img/g9.jpg"></a>
            <a class="single-gallery " href="img/g10.jpg"><img class="grid-item" src="img/g10.jpg"></a>
            <a class="single-gallery " href="img/g11.jpg"><img class="grid-item" src="img/g11.jpg"></a>
            <a class="single-gallery " href="img/g12.jpg"><img class="grid-item" src="img/g12.jpg"></a>
            <a class="single-gallery " href="img/g4.jpg"><img class="grid-item" src="img/g4.jpg"></a>
            <a class="single-gallery " href="img/g5.jpg"><img class="grid-item" src="img/g5.jpg"></a>						
        </div>	
    </div>	
</section> --}}
<!-- End gallery Area -->    
@endsection

