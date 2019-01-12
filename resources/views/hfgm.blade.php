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
	<section class="banner-area-inamsc relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12 inamsc-mobile">
					<h2 class="text-white">
					Have Fun Go Med
					</h2>
				<p class="text-white link-nav mb-5"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('hfgm')}}"> HFGM</a></p>
				<p class="text-justify text-white about mb-3" style="font-size: 16px">
					Have Fun Go Med atau HFGM merupakan acara pembuka dan penutup Liga Medika dengan disertai oleh kampanye kesehatan. Adapun tagline HFGM 2019 adalah #KenaliJiwa. Rangkaian acara HFGM sendiri meliputi Opening Liga Medika, Viral Campaign, Exhibition, dan Closing Ceremony Liga Medika.
				</p>
{{-- 				<a class="guideline-btn mr-3 mb-3" href="{{url('inamsc/guidelines')}}" data-toggle="tooltip" data-placement="top" title="Rules and relevant information are here" target="_blank">Read Guidelines</a> --}}
				<a href="{{url('register')}}" class="imarc-btn">Register HFGM</a>
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
						<h1>The competitions held in HFGM 2019 are:</h1>
						<hr>		
					</div>
				</div>
			</div>
	        <div class="row my-5 wow slideInLeft">
	            <div class="col-lg-5 quote-left">
					<img class="img-fluid" src="{{asset('img/ligmed/hfgm/hfgm1.jpg')}}" alt="campaign" style="width: 100%;">
	            </div>
	            <div class="col-lg-7 quote-right">
	                <h1 class="text-info mb-3">Campaign HFGM</h1>
	                <p class="justify text-justify">
						Divisi Campaign HFGM akan membawakan kampanye kesehatan yang bertujuan untuk mengurangi stigma dan mengedukasi masyarakat umum mengenai kesehatan jiwa. HFGM akan bekerja sama dengan lembaga dan organisasi yang menaungi permasalahan kesehatan jiwa dalam hal pembentukan konten edukasi dan gerakan bersama untuk meningkatkan kepedulian terhadap kesehatan jiwa. Harapannya kerja sama ini dapat menghasilkan karya bersama yang sesuai dengan tagline #KenaliJiwa di mana melalui karya ini masyarakat dapat lebih peduli tentang kesehatan jiwa. Karya ini dan segala bentuk edukasi lainnya akan dipertunjukkan di “#KenaliJiwa Exhibition” yang diselenggarakan pada penutupan Liga Medika. Exhibition dan Closing Liga Medika yang dilakukan pada saat penutupan acara HFGM juga diharapkan dapat menjadi media promosi dan edukasi mengenai kesehatan jiwa yang dapat dinikmati oleh masyarakat luas.
	                </p>
	            </div>
	        </div>
	        <hr>
	        <div class="row my-5 wow slideInRight">
	            <div class="col-lg-7 quote-left">
	                <h1 class="text-info mb-3" style="font-weight: bold; font-size: 36px">Concert</h1>
	                <p class="justify text-justify">
	                	TODO
	                </p>
	            </div>
	            <div class="col-lg-5 quote-right">
					<img class="img-fluid" src="{{asset('img/ligmed/hfgm/hfgm2.jpg')}}" alt="vocal group" style="width: 100%;">
	            </div>
	        </div>
	        <div class="row my-5 wow slideInUp justify-content-center slow">
				<a href="{{url('register')}}" class="imarc-btn">Register NOW</a>
	        </div>
		</div>
	</section>
@endsection


@section('script')
	<script>
		$("#nav-hfgm").addClass("menu-active");
	</script>
@endsection