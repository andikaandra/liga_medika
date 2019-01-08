@extends('layouts.app2')
@section('style')
<style>
	.footer-area {
		margin-top: 0px !important;
	}

	#gallery {
		background-color: rgba(128, 37, 19, 1);
		padding: 0;
	}

		.overlay-inamsc {
			background-color: rgba(0, 0, 0, 0.7);
			height: 100%;
			padding: 120px 0;
		}

        .image-hover {
            opacity: 0.6;
        }

        .image-hover:hover {
            opacity: 1;
        }
	</style>
@endsection
@section('content')
	<!-- start banner Area -->
<section class="banner-area-social-programme relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12 inamsc-mobile">
					<h1 class="text-white">
						Social Programme
					</h1>	
				<p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('social-programme')}}"> Social Programme</a></p>
				<p class="text-white about" style="font-size: 18px">
					Social Programme is an additional program of INAMSC 2019. The aims of this event are to facilitate the participants to get to know more about other participants and also to introduce some of Indonesia culture and iconic place in Jakarta. This program consist of two main events which is Indonesian Medical Education Research and Institute (IMERI) museum and lab tour, and Jakarta city tour.
				</p>
				</div>											
			</div>
		</div>
	</section>
	

	<section class="gallery-area section-gap" id="gallery">
		<div class="overlay-inamsc">
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
				<a class="single-gallery image-hover wow flipInX" href="img/ligmed/city-tour/IMG_7279.JPG"><img class="grid-item" src="{{asset('img/ligmed/city-tour/IMG_7279.JPG')}}"></a>
				<a class="single-gallery image-hover wow flipInX" href="img/ligmed/city-tour/IMG_7941.JPG"><img class="grid-item" src="{{asset('img/ligmed/city-tour/IMG_7941.JPG')}}"></a>
				<a class="single-gallery image-hover wow flipInX" href="img/ligmed/city-tour/IMG_7392.JPG"><img class="grid-item" src="{{asset('img/ligmed/city-tour/IMG_7392.JPG')}}"></a>
				<a class="single-gallery image-hover wow flipInX" href="img/ligmed/city-tour/IMG_7993.JPG"><img class="grid-item" src="{{asset('img/ligmed/city-tour/IMG_7993.JPG')}}"></a>
		
			</div>	
		</div>	
	</div>
	</section>

	
	

	
@endsection


@section('script')
	<script>
		$("#nav-social-programme").addClass("menu-active");
	</script>
@endsection