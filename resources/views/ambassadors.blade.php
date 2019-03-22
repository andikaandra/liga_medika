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

	.text-info {
		color: #ee2427 !important;
	}

	img.zoom {
	    width: 100%;
	    height: 250px;
	    border-radius:5px;
	    object-fit:cover;
	    -webkit-transition: all .3s ease-in-out;
	    -moz-transition: all .3s ease-in-out;
	    -o-transition: all .3s ease-in-out;
	    -ms-transition: all .3s ease-in-out;
	}

	.transition {
	    -webkit-transform: scale(1.1); 
	    -moz-transform: scale(1.1);
	    -o-transform: scale(1.1);
	    transform: scale(1.1);
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
<section class="banner-area-inamsc-ambassador relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12 inamsc-mobile">
					<h2 class="text-white">INAMSC Ambassadors Program</h2>

				<br><br><br><br>
			</div>
		</div>
		</div>
	</section>
	<!-- End banner Area -->	
	

	<!-- Start upcoming-event Area -->
	<section class="upcoming-event-area section-gap" id="events" >
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center mb-10">
						<h1></h1>
						<hr>		
					</div>
				</div>
			</div>
			<div class="international-comp">
				<div class="row my-5 wow slideInLeft justify-content-center">
					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Aakriti_R_Gogireddy_United_States_of_America.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Aakriti R Gogireddy</h4>
						<p class="text-center font-weight-lighter">United States of America</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Abdiqani_Ainan_Somalia.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Abdiqani Ainan</h4>
						<p class="text-center font-weight-lighter">Somalia</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Abhimanyu_Agrawal_India.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Abhimanyu Agrawal</h4>
						<p class="text-center font-weight-lighter">India</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Abu_Talha_bin_Fokhrul_Bangladesh.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Abu Talha bin Fokhrul</h4>
						<p class="text-center font-weight-lighter">Bangladesh</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Belma_Strugalioska_Austria.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Belma Strugalioska</h4>
						<p class="text-center font-weight-lighter">Austria</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Christos_Tsagkaris_Greece.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Christos Tsagkaris</h4>
						<p class="text-center font-weight-lighter">Greece</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Faizan_Akram_Pakistan.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Faizan Akram</h4>
						<p class="text-center font-weight-lighter">Pakistan</p>
					</div>					

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Mashkur_Isa_Ukraine.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Mashkur Isa</h4>
						<p class="text-center font-weight-lighter">Ukraine</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Muhammad_Umair_Ihsan_Pakistan.jpg')}}" alt="literature review" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Muhammad Umair Ihsan</h4>
						<p class="text-center font-weight-lighter">Pakistan</p>
					</div>

					
				</div>
				<hr>
			</div>
		</div>
	</section>


@endsection


@section('script')
	<script>
		$("#nav-inamsc").addClass("menu-active");
		$(document).ready(function(){
		    $(".zoom").hover(function(){
				$(this).addClass('transition');
			}, function(){
				$(this).removeClass('transition');
			});
		});
	</script>
@endsection
