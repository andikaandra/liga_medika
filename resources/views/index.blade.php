@extends('layouts.app2')

@section('style')
    <style>
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
    </style>
@endsection

@section('content')
    <!-- start banner Area -->
<section class="banner-area relative mobile" id="home">
    <div class="overlay overlay-bg"></div>	
    <div class="container">        
        <div class="row flex-fill d-flex align-items-center justify-content-center" id="home2">    
            <div class="banner-content col-lg-12 mobile">   

                <div class="about-us-banner">
                    <h1 class="text-white">
                        Liga Medika 2019			
                    </h1>
                    <h3 class="text-white pb-10">About us</h3>
                    <p class="pt-20 pb-20 text-white justify" style="font-size:16px;">
                        Liga Medika is the biggest event held by the students of Faculty of Medicine University Indonesia. Liga Medika was held for the first time in 2006 and still held annually until this year. Liga Medika consists of scientific competitions, arts competitions, and sports competition. We also want to raise public awareness about our theme with our campaign project and held a concert as the closing ceremony.
                    </p>
                </div>  
                
                <div class="theme-banner">
                    <h3 class="text-white pb-10">This year's theme</h3>
                    <h3 class="text-white pb-50 uppercase" id="theme" style="font-size: 72px;">Psychiatry</h3>
                    <h3 class="text-white pb-20">with our tagline</h3>
                    <h3 class="text-white pb-20 uppercase" style="font-size: 48px" id="tagline"><i>#KenaliJiwa</i></h3>
                    
                </div>
                <h2 class="text-inamsc pb-20" id="typed">
                    Registration for INAMSC is now Open!
                </h2>
                <a href="{{url('register')}}" class="primary-btn text-uppercase">Register Here</a>
                
  
            </div>											
        </div>
    </div>					
</section>
<!-- End banner Area -->	



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
                <div class="col-lg-6">
                    <div class="single-service wow slideInLeft">
                        <span class="lnr lnr-pencil"></span>
                        <h4>INAMSC</h4>
                        
                        <p>
                            <strong>First Wave Submission:</strong><br> 23 rd December 2018 – 20 th January
                            2019 <br>
                            <strong>Second Wave Submission:</strong> <br> 21 st January 2019 – 17 th February 2019
                        </p>	
                        
                        
                        {{-- <div class="contacts" style="float: left">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                            <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                        </div> --}}
                        
                        <div class="overlay">
                        <div class="text">
                            <p>
                                INAMSC (Indonesian international (bio)medical student's congress) is the biggest scientific event and competition for biomedic students in indonesia. INAMSC is open not only for national participants, but INAMSC is also open for international participants.
                            </p>
                            <a href="{{url('inamsc/guidelines')}}" target="_blank" class="mb-1"><strong>Read Guidelines</strong></a> <br>
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

                        {{-- <div class="contacts" style="float: left">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                            <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                        </div> --}}
                                         
                        <div class="overlay">
                        <div class="text">
                            <p>
                                    IMARC (Indonesian Medical Art Competition) is a reputable medical arts competition the biggest kind  in Indonesia, comprised of traditional dance & vocal group for health science faculty students and band & photography for students from any kind of faculty
                            </p>
                            <a href="#" class="text-uppercase primary-btn">Info</a>
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
                            
                            {{-- <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div> --}}
                                                        
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
                    <div class="col-lg-6">
                        <div class="single-service wow slideInRight">
                                <span class="lnr lnr-music-note"></span>
                            <h4>HFGM</h4>
                            <p>
                                <i>Hover for info</i>
                            </p>		
                            {{-- <div class="contacts" style="float: left">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                                </div> --}}
                                                    
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
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                            <div class="single-service wow slideInUp">
                                    <span class="fa fa-building-o"></span>
                                <h4>SOCIAL PROGRAMME</h4>
                                <p>
                                    <i>Hover for info</i>
                                </p>				
                                {{-- <div class="contacts" style="float: left">
                                        <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                                    </div> --}}
                                                    
                                <div class="overlay">
                                <div class="text">
                                    <p>
                                        Social Programme is an additional event of INAMSC 2019. The aims of this event are to facilitate the participants to get to know more about other participants and also to introduce some of Indonesia culture and iconic place in Jakarta. This program consist of two main events which is Indonesian Medical Education Research and Institute (IMERI) museum and lab tour, and Jakarta city tour.
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
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h2 class="mb-10 text-white">Last Year's Euphoria</h2>
                        {{-- <a href="https://www.instagram.com/ligamedika/?hl=id" target="_blank" style="font-size: 20px"><i class="fa fa-instagram"></i> : @liga_medika</a> --}}

                    </div>
                </div>
            </div>						
            <div id="grid-container" class="row">
                <a class="single-gallery image-hover wow flipInX" href="img/ligmed/inamsc/litrev.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/litrev.JPG')}}"></a>
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/inamsc/litrev2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/litrev2.JPG')}}"></a>
  
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/inamsc/pposter.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/pposter.JPG')}}"></a>
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/inamsc/pposter2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/pposter2.JPG')}}"></a>
  
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/inamsc/workshop2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/workshop2.JPG')}}"></a>
                  
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/hfgm/hfgm1.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm1.jpg')}}"></a>
  
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/imsso/imsso2.jpg"><img class="grid-item" src="{{asset('img/ligmed/imsso/imsso2.jpg')}}"></a>
  
                <a class="single-gallery  image-hover wow flipInX" href="img/ligmed/imarc/imarc1.jpg"><img class="grid-item" src="{{asset('img/ligmed/imarc/imarc1.jpg')}}"></a>

                <a href="{{url('gallery')}}" style="color:white; font-size: 16px">See more photos</a>
            </div>	
        </div>	
    </section>
    


{{-- DO NOT DELETE --}}

{{-- <section class="exibition-area service-area pt-100" id="about">
        <div class="container">
                <h1>1</h1>

            <div class="row">
                <div class="col-lg-4">
                    <div class="single-service">
                        <span class="lnr lnr-pencil"></span>
                        <h4>INAMSC</h4>
                        
                        <p>
                            <strong>First Wave Submission:</strong><br> 23 rd December 2018 – 20 th January
                            2019 <br>
                            <strong>Second Wave Submission:</strong> <br> 21 st January 2019 – 17 th February 2019
                        </p>	
                        
                        
                        <div class="contacts" style="float: left">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                            <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                        </div>
                        
                        <div class="overlay">
                        <div class="text">
                            <p>
                                INAMSC (Indonesian international (bio)medical student's congress) is the biggest scientific event and competition for biomedic students in indonesia. INAMSC is open not only for national participants, but INAMSC is also open for international participants.
                            </p>
                            <a href="{{url('inamsc/guidelines')}}" target="_blank" class="mb-1"><strong>Read Guidelines</strong></a> <br>
                        <a href="{{url('inamsc')}}" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>							
                </div>
                <div class="col-lg-4">
                    <div class="single-service">                  
                        <span class="fa fa-paint-brush"></span>
                        <h4>IMARC</h4>
                        <p>
                        <i>Hover for info</i>
                        </p>				
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                         
                        <div class="overlay">
                        <div class="text">
                            <p>
                                    IMARC (INdonesian Medical Art Competition) is a reputable medical arts competition the biggest kind  in Indonesia, comprised of traditional dance & vocal group for health science faculty students and band & photography for students from any kind of faculty
                            </p>
                            <a href="#" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>									
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                        <span class="fa fa-futbol-o"></span>
                        <h4>IMSSO</h4>
                        <p>
                            <i>Hover for info</i>
                        </p>	
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                                     
                        <div class="overlay">
                        <div class="text">
                            <p>
                                    IMSSO is a renowned sports competition aimed for medicine and dental medicine university students in Indonesia. This year we have basketball and futsal.
                            </p>
                            <a href="#" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>						
                </div>	
                <div class="col-lg-4">
                    <div class="single-service">
                            <span class="lnr lnr-music-note"></span>
                        <h4>HFGM</h4>
                        <p>
                            <i>Hover for info</i>
                        </p>		
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                                 
                        <div class="overlay">
                        <div class="text">
                            <p>
                                HFGM is a celebrated event comprised of health campaign activites to raise the awareness about the mental health, and the final event including a concert and exhibition
                            </p>
                            <a href="#" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-4">
                    <div class="single-service">
                            <span class="fa fa-building-o"></span>
                        <h4>SOCIAL PROGRAMME</h4>
                        <p>
                            <i>Hover for info</i>
                        </p>				
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                         
                        <div class="overlay">
                        <div class="text">
                            <p>
                                Social Programme is an additional program of INAMSC 2019. The aims of this event are to facilitate the participants to get to know more about other participants and also to introduce some of Indonesia culture and iconic place in Jakarta. This program consist of two main events which is Indonesian Medical Education Research and Institute (IMERI) museum and lab tour, and Jakarta city tour.
                            </p>
                            <a href="{{url('social-programme')}}" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>	
                </div>											
            </div>
        </div>	
    </section> --}}

{{-- DO NOT DELETE --}}

{{-- 
<section class="exibition-area service-area pt-100" id="about">
        <div class="container">
                <h1>3</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="single-service">
                        <span class="lnr lnr-pencil"></span>
                        <h4>INAMSC</h4>
                        
                        <p>
                            <strong>First Wave Submission:</strong><br> 23 rd December 2018 – 20 th January
                            2019 <br>
                            <strong>Second Wave Submission:</strong> <br> 21 st January 2019 – 17 th February 2019
                        </p>	
                        
                        
                        <div class="contacts" style="float: left">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                            <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                        </div>
                        
                        <div class="overlay">
                        <div class="text">
                            <p>
                                INAMSC (Indonesian international (bio)medical student's congress) is the biggest scientific event and competition for biomedic students in indonesia. INAMSC is open not only for national participants, but INAMSC is also open for international participants.
                            </p>
                            <a href="{{url('inamsc/guidelines')}}" target="_blank" class="mb-1"><strong>Read Guidelines</strong></a> <br>
                        <a href="{{url('inamsc')}}" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>							
                </div>
                <div class="col-lg-12">
                    <div class="single-service">                  
                        <span class="fa fa-paint-brush"></span>
                        <h4>IMARC</h4>
                        <p>
                        <i>Hover for info</i>
                        </p>				
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                         
                        <div class="overlay">
                        <div class="text">
                            <p>
                                    IMARC (INdonesian Medical Art Competition) is a reputable medical arts competition the biggest kind  in Indonesia, comprised of traditional dance & vocal group for health science faculty students and band & photography for students from any kind of faculty
                            </p>
                            <a href="#" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>									
                </div>
                <div class="col-lg-12">
                    <div class="single-service">
                        <span class="fa fa-futbol-o"></span>
                        <h4>IMSSO</h4>
                        <p>
                            <i>Hover for info</i>
                        </p>	
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                                     
                        <div class="overlay">
                        <div class="text">
                            <p>
                                    IMSSO is a renowned sports competition aimed for medicine and dental medicine university students in Indonesia. This year we have basketball and futsal.
                            </p>
                            <a href="#" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>						
                </div>	
                <div class="col-lg-12">
                    <div class="single-service">
                            <span class="lnr lnr-music-note"></span>
                        <h4>HFGM</h4>
                        <p>
                            <i>Hover for info</i>
                        </p>		
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                                 
                        <div class="overlay">
                        <div class="text">
                            <p>
                                HFGM is a celebrated event comprised of health campaign activites to raise the awareness about the mental health, and the final event including a concert and exhibition
                            </p>
                            <a href="#" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-12">
                    <div class="single-service">
                            <span class="fa fa-building-o"></span>
                        <h4>SOCIAL PROGRAMME</h4>
                        <p>
                            <i>Hover for info</i>
                        </p>				
                        <div class="contacts" style="float: left">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                            </div>
                                         
                        <div class="overlay">
                        <div class="text">
                            <p>
                                Social Programme is an additional program of INAMSC 2019. The aims of this event are to facilitate the participants to get to know more about other participants and also to introduce some of Indonesia culture and iconic place in Jakarta. This program consist of two main events which is Indonesian Medical Education Research and Institute (IMERI) museum and lab tour, and Jakarta city tour.
                            </p>
                            <a href="{{url('social-programme')}}" class="text-uppercase primary-btn">Info</a>
                        </div>
                        </div>
                    </div>	
                </div>											
            </div>
        </div>	
    </section>



    <section class="exibition-area service-area pt-100" id="about">
            <div class="container">
                <h1>4</h1>
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
                                    <div class="contacts" style="float: left">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                            <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                                    </div>					 	
                                    <div class="overlay">
                                    <div class="text">
                                        <p>
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
                                    <div class="contacts" style="float: left">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                            <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                                    </div>			 	
                                    <div class="overlay">
                                    <div class="text">
                                        <p>
                                                IMARC (INdonesian Medical Art Competition) is a reputable medical arts competition the biggest kind  in Indonesia, comprised of traditional dance & vocal group for health science faculty students and band & photography for students from any kind of faculty
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
                                    <div class="contacts" style="float: left">
                                        <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                                    </div>			 	
                                    <div class="overlay">
                                    <div class="text">
                                        <p>
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
                                    
                                    <div class="contacts" style="float: left">
                                        <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                                    </div>

                                    <div class="overlay">
                                    <div class="text">
                                        <p>
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

                                    <div class="contacts" style="float: left">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i> ____		<br>
                                            <i class="fa fa-envelope" aria-hidden="true"></i> ____		
                                    </div>
                                    
                                    <div class="overlay">
                                    <div class="text">
                                        <p>
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
        </section> --}}



    @endsection

@section('script')
<script src="https://unpkg.com/typewriter-effect/dist/core.js"></script>
<script>
//   var app = document.getElementById('typed');

    // var typewriter = new Typewriter(app, {
    //     loop: true,
    //     strings: ['Registration for INAMSC is now Open!'],
    //     autoStart: true,
    // });

  $("#nav-home").addClass("menu-active");

  $('.owl-carousel').owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2500,
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
    
});
    
</script>    
        

@endsection
