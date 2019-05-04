<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131788430-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-131788430-1');
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <!-- Author Meta -->
    <meta name="author" content="Software Silo">
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


    <link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">					        
    <link rel="stylesheet" href="{{asset('css/main.css')}}?v=2.0">
    <link rel="stylesheet" href="{{asset('wow/css/libs/animate.css')}}">
        
        @yield('style')

        <style>
            p {
                font-size: 16px !important;
            }
            .heart {
                animation: beat .25s infinite alternate;
	            transform-origin: center;
            }
            @keyframes beat{
                to { transform: scale(1.2); }
            }
        </style>
    </head>
    <body>
        <header id="header" id="home">
            <div class="container header-top">
                <div class="row">
                    <div class="col-6 top-head-left">
                        <ul>
                        </ul>
                    </div>
                    <div class="col-6 top-head-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/liga_medika" target="_blank"><i class="fa fa-twitter"></i></a></li>
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
                        <img id="logo-white" src="{{asset('img/logo.png')}}" alt="" title="" style="width: 60px; margin-top: -5px; display: none" />
                        <img id="logo-black" src="{{asset('img/logo-black.png')}}" alt="" title="" style="width: 60px; margin-top: -5px;"  />
                        Liga Medika 2019
                    </a>
                    
                    </div>
                    <nav id="nav-menu-container">
                    <ul class="nav-menu">
                    <li class="" id="nav-home"><a href="{{url('/')}}">Home</a></li>
                    <li id="nav-inamsc"><a href="{{url('inamsc')}}" >INAMSC</a></li>
                    <li id="nav-imarc"><a href="{{url('imarc')}}" >IMARC</a></li>
                    <li id="nav-imsso"><a href="{{url('imsso')}}" >IMSSO</a></li>
                    <li id="nav-hfgm"><a href="{{url('hfgm')}}" >HFGM</a></li>
                    <li id="nav-social-programme"><a href="{{url('social-programme')}}">SOCIAL PROGRAMME</a></li>
                    <li id="nav-gallery"><a href="{{url('gallery')}}">Gallery</a></li>
                    <li id="nav-faq"><a href="{{url('faq')}}">FAQ</a></li>
                    
                    @guest                  
                        <li id="nav-login"><a href="{{('login')}}"><strong>Login</strong></a></li>
                    @else
                        @if (Auth::user()->role == 1)
                        <li id="nav-dashboard"><a href="{{url('users')}}">Dashboard</a></li>      
                        @else
                        <li id="nav-dashboard"><a href="{{url('admin')}}">Dashboard</a></li>      
                        @endif
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <strong>{{ __('Logout') }}</strong>
                            </a>
                    </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    @endguest
                    </ul>
                    </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </header>
        <!-- #header -->

        <div class="animated fadeIn">
        @yield('content')
    </div>

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
                        <p class="text-justify">
                            No VI, Jl. Salemba Raya, RW.5, Kenari, Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10430
                        </p>
                        <hr>
                        <p class="text-justify">
                            Rumpun Ilmu Kesehatan, Universitas Indonesia, Beji, Kota Depok, Jawa Barat - 16424
                            {{-- Kampus Baru UI Depok, Pondok Cina, Beji, Kota Depok, Jawa Barat 16424 --}}
                        </p>
                        <hr>
                        <p class="footer-text">
                            Copyright Liga Medika &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 
                            Handcrafted & Nurtured with huge <i class="fa fa-heart-o heart" aria-hidden="true"></i> by <a href="#">Software Silo</a> 

                        </p>
                    </div>
                </div>	
                <div class="col-md-4 social-widget">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p class="text-justify">Let us be social - Get our latest updates</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/liga_medika" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/ligamedika/?hl=id" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>	
                
                <div class="col-md-4">
                    <img src="{{asset('img/logo-fk-ui.jpg')}}" alt="" style="width: 100%">
                </div>
            </div>
        </div>
    </footer>	
        <!-- End footer Area -->		

        <script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>			            
        <script src="{{asset('js/superfish.min.js')}}"></script>	
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>	
        <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('js/justified.min.js')}}"></script>	
        <script src="{{asset('js/main.js')}}"></script>	
        <script src="{{asset('wow/dist/wow.min.js')}}"></script>
        <script>
            new WOW().init();
            $(document).ready(function(){            
            });
        </script>

        @yield('script')
    </body>
</html>