@extends('layouts.app2')

@section('style')
    <link rel="stylesheet" href="{{asset('FlipClock/compiled/flipclock.css')}}">
    <style>
        .clock{
            zoom: 0.75;
            -moz-transform: scale(0.75);
        }
        .single-service {
            height: 340px !important;
            margin-bottom: 20px;
        }

        .about-us-banner, .theme-banner {
            width: 100%;
            border-bottom: solid 1px #f1b739;
            margin-bottom: 20px;
        }

        .exibition-area, .gallery-area {
            border-bottom: solid 4px #f1b739;
        }

        .theme-banner {
            padding-bottom: 20px;
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

        .image-overlay {
            margin-bottom: -30px;
        }
        .img-container {
            position: relative;
        }

        .text-block {
            position: absolute;
            /* bottom: 20px;
            right: 20px; */
            /* background-color: black; */
            color: white;            
            bottom: 0;
            margin-left: 15px;
            /* width: 100%; */
        }

        hr.yellow {
            color: #fff;
            border-top: none !important;
            border-bottom: solid 1px #f1b739 !important;
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

                <div class="about-us-banner" style="padding-bottom: 10px">
                    <h1 class="text-white">
                        Liga Medika 2019			
                    </h1>
                </div>  
                <h2 class="text-white mb-3">COMING SOON AUGUST 17-25 2019</h2>
                <div style="text-align: center;" class="d-none d-md-block">
                    <div class="clock" style="display: inline-block; width: auto; margin:2em;"></div>
                </div>
                <a href="{{url('register')}}" class="primary-btn text-uppercase">Register Here</a>
                
  
            </div>											
        </div>
    </div>					
</section>
<!-- End banner Area -->	

<section class="quote-area section-gap wow slideInUp">
    <div class="container">             
        <div class="row justify-content-center">
            <h2 class="font-weight-bold">About Us</h2>
        </div>
        <hr class="yellow">
        <div class="row mt-5">
            <div class="col-lg-5 quote-left">
                    <h1 class="">This year's theme</h1>
                    <h1 class=" text-danger mb-3" style="font-size: 56px">Psychiatry</h1>
                    <h1 class="">with our tagline</h1>
                    <h1 class=" text-info" id="tagline"><i>#KenaliJiwa</i></h1>
            </div>
            <div class="col-lg-7 quote-right">
                <p class="justify">
                    Liga Medika is the biggest event held by the students of Faculty of Medicine University Indonesia. Liga Medika was held for the first time in 2006 and still held annually until this year. Liga Medika consists of scientific competitions, arts competitions, and sports competition. We also want to raise public awareness about our theme with our campaign project and held a concert as the closing ceremony.
                </p>
            </div>
        </div>
    </div>  
</section>

<section class="exibition-area service-area" id="about">
    <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="menu-content col-lg-10">
            <div class="title text-center">
                <h2 class="font-weight-bold">Events</h2>                            
            </div>
        </div>
    </div>  
    <hr class="yellow">
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="single-service wow slideInLeft">
                <span class="lnr lnr-pencil"></span>
                <h4>INAMSC</h4>
                
                <p>
                    <strong>First Wave Submission:</strong><br> 23 rd December 2018 – 17 th March
                    2019 <br>
                    <strong>Second Wave Submission:</strong> <br> 18 th March 2019 – 26 th May 2019
                </p>	
                                
                <div class="overlay">
                <div class="text">
                    <p class="text-justify">
                        INAMSC (Indonesian international (bio)medical student's congress) is the biggest scientific event and competition for biomedic students in indonesia. INAMSC is open not only for national participants, but INAMSC is also open for international participants.
                    </p>
                    <a href="{{url('inamsc/guidelines')}}" target="_blank" class="mb-1"><strong>Read Guidelines</strong></a> <br> <br>
                <a href="{{url('inamsc')}}" class="text-uppercase primary-btn">Info</a>
                </div>
                </div>
            </div>							
        </div>
        <div class="col-lg-6">
            <div class="single-service wow slideInRight">
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
                    <a href="{{url('imarc')}}" class="text-uppercase primary-btn">Info</a>
                </div>
                </div>
            </div>									
        </div>
        </div>
        <div class="row">
    
            <div class="col-lg-6">
                <div class="single-service wow slideInLeft">
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
                        <a href="{{url('imsso')}}" class="text-uppercase primary-btn">Info</a>
                    </div>
                    </div>
                </div>						
            </div>	
            <div class="col-lg-6">
                <div class="single-service wow slideInRight">
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
                        <a href="{{url('hfgm')}}" class="text-uppercase primary-btn">Info</a>
                    </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                    <div class="single-service wow slideInUp">
                            <span class="fa fa-building-o"></span>
                        <h4>SOCIAL PROGRAMME</h4>
                        <p>
                            <i>Hover for info</i>
                        </p>				
                                                                    
                        <div class="overlay">
                        <div class="text">
                            <p class="text-justify">
                                Social Programme is an additional program of Liga Medika 2019. The aims of this event are to facilitate the participants to get to know more about other participants and also to introduce some of Indonesia culture and iconic place in Jakarta. This program consist of two main events which is Indonesian Medical Education Research and Institute (IMERI) museum and lab tour, and Jakarta city tour.
                            </p>
                            <a href="{{url('social-programme')}}" class="text-uppercase primary-btn">Info</a>
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
            <div class="menu-content col-lg-8">
                <div class="title text-center">
                    <h2 class="text-white">Last Year's Euphoria</h2>                        
                </div>
            </div>
        </div>
        <hr class="yellow">
        
        <div id="grid-container" class="row mt-5">
                
            <div class="img-container">
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/inamsc/rpp2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/rpp2.JPG')}}"></a>
                <div class="text-block">                        
                <p>INAMSC</p>
                </div>
            </div>

            <div class="img-container">
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/hfgm/hfgm1.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm1.jpg')}}"></a>
                <div class="text-block">                        
                <p>HFGM</p>
                </div>
            </div>
            <div class="img-container">
                    
            <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/imsso/imsso2.jpg"><img class="grid-item" src="{{asset('img/ligmed/imsso/imsso2.jpg')}}"></a>        
                <div class="text-block">                        
                <p>IMSSO</p>
                </div>
            </div>



            <div class="img-container">
                    <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/imarc/imarc1.jpg"><img class="grid-item" src="{{asset('img/ligmed/imarc/imarc1.jpg')}}"></a>
                    <div class="text-block">                        
                    <p>IMARC</p>
                     </div>
                </div>
    
                <div class="img-container">
                    <a class="single-gallery image-hover wow flipInX" href="img/ligmed/city-tour/IMG_7993.JPG"><img class="grid-item" src="{{asset('img/ligmed/city-tour/IMG_7993.JPG')}}" style="max-width: 277.854px; max-height: 184.076px"></a>
                    <div class="text-block">                        
                    <p>Social Programme</p>
                </div>
            </div>              
        </div>
            
        
    
        <div class="row" style="padding: 25px">            
            <a href="{{url('gallery')}}" style="color:white; font-size: 16px">See more photos</a>
        </div>
    </div>	
</section>
@endsection

@section('script')
<script>
  $("#nav-home").addClass("menu-active");
</script>    
<script src="{{asset('FlipClock/compiled/flipclock.js')}}"></script>
<script type="text/javascript">
    var clock;

    $(document).ready(function() {
        var currentDate = new Date();

        var futureDate  = new Date(currentDate.getFullYear(), 8, 17);

        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

        if (diff>0) {
            clock = $('.clock').FlipClock(diff, {
                clockFace: 'DailyCounter',
                countdown: true
            });            
        }
    });
</script>
@endsection
