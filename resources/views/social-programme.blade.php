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

	</style>
@endsection
@section('content')
	<!-- start banner Area -->
<section class="banner-area-social-programme relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12 inamsc-mobile">
					<h2 class="text-white">
						Social Programme
					</h2>	
				<p class="text-white link-nav mb-5"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('social-programme')}}"> Social Programme</a></p>
				<p class="text-justify  text-white about" style="font-size: 16px">
					Social Programme is an additional program of Liga Medika 2019. The aims of this event are to facilitate the participants to get to know more about other participants and also to introduce some of Indonesia culture and iconic place in Jakarta. This program consist of two main events which is Indonesian Medical Education Research and Institute (IMERI) museum and lab tour, and Jakarta city tour.
				</p>
				</div>											
			</div>
		</div>
	</section>



	<section class="upcoming-event-area" id="events" style="padding-top: 120px">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-60 col-lg-10">
						<div class="title text-center mb-10">
							<h1>Social Programme event:</h1>
							<hr>		
						</div>
					</div>
				</div>
				<div class="row my-5 wow slideInLeft">
					<div class="col-lg-5 quote-left">
						<img class="img-fluid" src="{{asset('img/ligmed/city-tour/IMG_7279.JPG')}}" alt="city tour" style="width: 100%;">
					</div>
					<div class="col-lg-7 quote-right">
						<h1 class="text-info mb-3">City Tour</h1>
						<p class="justify text-justify">
							City Tour Liga Medika adalah sebuah acara yang bertujuan mengenalkan keindahan kota Jakarta kepada para peserta. Tahun ini, acara kami membawakan sebuah konsep baru yaitu "Social Act" dimana para peserta tidak hanya akan mengunjungi tempat-tempat wisata namun juga berkesempatan berkenalan dengan anak-anak dari sebuah yayasan yang bergerak di bidang kesehatan jiwa. City Tour Liga Medika 2019 akan membawa peserta ke Museum Kebangkitan Nasional, Galeri Nasional, dan Monumen Nasional. Tentunya, acara ini menjanjikan kenangan tak terlupakan bagi peserta yang mengikuti Liga Medika 2019.
						</p>
					</div>
				</div>
				<hr>
							
			</div>
	

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