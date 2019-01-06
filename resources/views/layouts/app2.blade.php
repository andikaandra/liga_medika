<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="Liga Medika 2019, Universitas Indonesia">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Title -->
    <title>Liga Medika 2019</title>

    
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">


    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">

        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">					
        <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        
        @yield('style')
    </head>
    <body class="animated fadeIn">

          <header id="header" id="home">
              <div class="container header-top">
                  <div class="row">
                      <div class="col-6 top-head-left">
                          <ul>
                              {{-- <li><a href="#">Visit Us</a></li>
                              <li><a href="#">Buy Ticket</a></li> --}}
                          </ul>
                      </div>
                      <div class="col-6 top-head-right">
                          <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/ligamedika/?hl=id"><i class="fa fa-instagram"></i></a></li>                            
                          </ul>
                      </div>			  			
                  </div>
              </div>
              <hr>
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                  <div id="logo">
                    <a href="{{url('/')}}" style="color:white; text-decoration: none; font-size: 24px">
                        <img src="img/logo.jpg" alt="" title="" style="width: 60px; margin-top: -5px"  />
                        Liga Medika 2019
                    </a>
                    
                  </div>
                  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                    <li class="menu-active"><a href="{{url('/')}}">Home</a></li>
                    <li class="menu-has-children"><a href="#">INAMSC</a>
                        <ul>
                            <li><a class="dropdown-item" href="{{url('inamsc')}}">Educational Video</a></li>
                            <li><a class="dropdown-item" href="{{url('inamsc')}}">Literature Review</a></li>
                            <li><a class="dropdown-item" href="{{url('inamsc')}}">Public Poster</a></li>
                            <li><a class="dropdown-item" href="{{url('inamsc')}}">Research Paper</a></li>
                            <li><a class="dropdown-item" href="{{url('inamsc')}}">Symposium & Workshop</a></li>
                            <li><a class="dropdown-item" href="{{url('inamsc/guidelines')}}" target="_blank">
                                <strong>Read Guidelines</strong></a></li>
                        </ul>
                      </li>	
                      <li class="menu-has-children"><a href="#">IMARC</a>
                        <ul>
                            <li><a class="dropdown-item" href="{{url('#')}}">Photography</a></li>
                          <li><a class="dropdown-item" href="{{url('#')}}">Traditional Dance</a></li>
                          <li><a class="dropdown-item" href="{{url('#')}}">Vocal Group</a></li>
                          <li><a class="dropdown-item" href="{{url('#')}}">Band</a></li>
                        </ul>
                      </li>	

                      <li class="menu-has-children"><a href="#">IMSSO</a>
                        <ul>
                          <li><a class="dropdown-item" href="{{url('#')}}">Men Basketball</a></li>
                          <li><a class="dropdown-item" href="{{url('#')}}">Women Basketball</a></li>
                          <li><a class="dropdown-item" href="{{url('#')}}">Men Futsal</a></li>
                        </ul>
                      </li>	
                    <li><a href="#">HFGM</a></li>          
                    <li><a href="#">About</a></li>
                      <li><a href="#">Gallery</a></li>
                      <li><a href="#">Events</a></li>                      
                    <li><a href="{{('login')}}"><strong>Login</strong></a></li>                                	          
                    </ul>
                  </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
          </header><!-- #header -->


          
                                
          
          
          
                                


          @yield('content')


        
        

        <!-- start footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-footer-widget">
                            <h6>Address</h6>
                            <p style="font-weight: bold">
                                Faculty of Medicine University Indonesia
                            </p>
                            <p>
                                No VI, Jl. Salemba Raya, RW.5, Kenari, Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10430
                            </p>
                            <p class="footer-text">
                                
                                Copyright Liga Medika &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 
                                Handcrafted & Nurtured with huge <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Software Silo</a> 

                            </p>
                        </div>
                    </div>
                    {{-- <div class="col-lg-5  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Newsletter</h6>`
                            <p>Stay update with our latest</p>
                            <div class="" id="mc_embed_signup">
                                <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                        <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>

                                    <div class="info"></div>
                                </form>
                            </div>
                        </div>
                    </div>						 --}}
                    <div class="col-md-4 social-widget">
                        <div class="single-footer-widget">
                            <h6>Follow Us</h6>
                            <p>Let us be social - Get our latest updates</p>
                            <div class="footer-social d-flex align-items-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/ligamedika/?hl=id" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>	
                    
                    <div class="col-md-4">
                     <img src="{{asset('img/logo-bem-fk-ui.jpg')}}" alt="" style="width: 350px">
                    </div>
                </div>
            </div>
        </footer>	
        <!-- End footer Area -->		

        <script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>			
        {{-- TODO: --}}
        {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> --}}
        <script src="{{asset('js/easing.min.js')}}"></script>			
        <script src="{{asset('js/hoverIntent.js')}}"></script>
        <script src="{{asset('js/superfish.min.js')}}"></script>	
        <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>	
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>	
        <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('js/justified.min.js')}}"></script>					
        <script src="{{asset('js/jquery.sticky.js')}}"></script>
        <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>			
        <script src="{{asset('js/parallax.min.js')}}"></script>		        
        <script src="{{asset('js/main.js')}}"></script>	
        <script src="{{asset('js/typed.min.js')}}"></script>	

        @yield('script')
    </body>
</html>