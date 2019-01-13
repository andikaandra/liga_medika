@extends('layouts.app2')


@section('style')
<style>
	#last {
		text-align: center !important;
		justify-content: center;
	}

	.international, .national {
		margin-bottom: 20px;
	}

	.single-events {
		margin-bottom: 10px;
	}


	@media only screen and (max-width: 768px) {  
		#last img {
		width: 100% !important;
	}

	}
</style>	
@endsection

@section('content')
	<!-- start banner Area -->
<section class="banner-area-imsso relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12 inamsc-mobile">
					<h2 class="text-white">
					Indonesian Medical Student Sports Olympiad
					</h2>	
				<p class="text-white link-nav mb-5"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('imsso')}}"> IMSSO</a></p>
				<p class="text-justify text-white about mb-3" style="font-size: 16px">
					Indonesian Medical Student Sports Olympiad (IMSSO) IMSSO merupakan kompetisi olahraga tingkat nasional yang terdiri dari 3 cabang untuk dilombakan, yaitu Basket Putra, Basket Putri dan Futsal Putra dengan sasaran mahasiswa Kedokteran dan Kedokteran Gigi se-Indonesia. Acara akan berlangsung selama 8 hari.
				</p>
{{-- 				<a class="guideline-btn mr-3 mb-3" href="{{url('inamsc/guidelines')}}" data-toggle="tooltip" data-placement="top" title="Rules and relevant information are here" target="_blank">Read Guidelines</a> --}}
				<a href="{{url('register')}}" class="imsso-btn">Register IMSSO</a>
			</div>
		</div>
		</div>
	</section>
	<!-- End banner Area -->	
	
	<!-- Start upcoming-event Area -->
	<section class="upcoming-event-area section-gap" id="events">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center mb-10">
						<h1>The competitions held in IMSSO 2019 are:</h1>
						<hr>		
					</div>
				</div>
			</div>
	        <div class="row my-5 wow slideInLeft">
	            <div class="col-lg-5 quote-left">
					<img class="img-fluid" src="{{asset('img/ligmed/imsso/imsso1.jpg')}}" alt="basket putra" style="width: 100%;">
	            </div>
	            <div class="col-lg-7 quote-right">
	                <h1 class="text-info mb-3">Basket Putra</h1>
	                <p class="justify text-justify">
						Cabang Basket Putra akan diadakan bersamaan dengan Basket Putri. Acara ini adalah kompetisi olahraga Basket 5x5. Kompetisi akan berupa sistem Pool. Kompetisi akan berlangsung selama 8 harı. Pemenang dari cabang ini akan mendapatkan hadiah berupa uang dan piala (memperebutkan juara I, II, dan III) 
	                </p>
	            </div>
	        </div>
	        <hr>
	        <div class="row my-5 wow slideInRight">
	            <div class="col-lg-7 quote-left">
	                <h1 class="text-info mb-3" style="font-weight: bold; font-size: 36px">Basket Putri</h1>
	                <p class="justify text-justify">
						Cabang Basket Putri akan diadakan bersamaan dengan Basket Putra. Acara ini adalah kompetisi olahraga Basket 5x5. Kompetisi akan berupa sistem Pool. Kompetisi akan berlangsung selama 8 harı. Pemenang dari cabang ini akan mendapatkan hadiah berupa uang dan piala (memperebutkan juara I, II, dan III) 
	                </p>
	            </div>
	            <div class="col-lg-5 quote-right">
					<img class="img-fluid" src="{{asset('img/ligmed/imsso/basket-pi.JPG')}}" alt="basket putri" style="width: 100%;">
	            </div>
	        </div>
	        <hr>
	        <div class="row my-5 wow slideInLeft">
	            <div class="col-lg-5 quote-left">
					<img class="img-fluid" src="{{asset('img/ligmed/imsso/imsso3.jpg')}}" alt="futsal" style="width: 100%;">
	            </div>
	            <div class="col-lg-7 quote-right">
	                <h1 class="text-info mb-3">Futsal</h1>
	                <p class="justify text-justify">
						Cabang Futsal Putra akan diadakan selama 5 hari. Acara pada cabang ini adalah kompetisi futsal. Pemenang dari cabang ini akan mendapatkan hadiah berupa uang dan piala (memperebutkan juara I, II, III)
	                </p>
	            </div>
	        </div>
	        <div class="row my-5 wow slideInUp justify-content-center slow">
				<a href="{{url('register')}}" class="imsso-btn">Register NOW</a>
	        </div>
		</div>
	</section>
@endsection


@section('script')
	<script>
		$("#nav-imsso").addClass("menu-active");
	</script>
@endsection