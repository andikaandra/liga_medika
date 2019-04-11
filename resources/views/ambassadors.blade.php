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
					<h2 class="text-white">INAMSC Ambassador Programme</h2>
					<br><br>
					<p class="text-justify text-white about mb-3" style="font-size: 16px">
						INAMSC ambassadors are biomedical students from all over the world that helps promote INAMSC in their own faculty/country. With this system of ambassadorship, we are able to inform international students about the upcoming INAMSC and attract them to attend our congress.
					</p><br>
					<p class="text-justify text-white about mb-3" style="font-size: 16px">
					INAMSC ambassadors have to be enthusiastic about INAMSC, as well as being creative in promoting our congress. It is not necessary for them to previously attended to our congress(es) before. However, they should tell as many biomedical students as possible about the upcoming INAMSC 2019 and hopefully most of them will join our INAMSC family. The digital promotion materials will be given by the committee and the ambassadors are expected to share them in their Facebook, Twitter and/or other social media and website. The most enthusiastic and creative ambassador will get the Best Ambassador prize.
					</p>
				<br><br>
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
						<h1>The Ambassadors</h1>
						<hr>		
					</div>
				</div>
			</div>
			<div class="international-comp">
				<div class="row my-5 wow slideInLeft justify-content-center">
					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Aakriti_R_Gogireddy_United_States_of_America.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Aakriti R Gogireddy</h4>
						<p class="text-center font-weight-lighter">United States of America</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Abdiqani_Ainan_Somalia.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Abdiqani Ainan</h4>
						<p class="text-center font-weight-lighter">Somalia</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Abhimanyu_Agrawal_India.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Abhimanyu Agrawal</h4>
						<p class="text-center font-weight-lighter">India</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Abu_Talha_bin_Fokhrul_Bangladesh.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Abu Talha bin Fokhrul</h4>
						<p class="text-center font-weight-lighter">Bangladesh</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Ali_Raza_China.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Ali Raza</h4>
						<p class="text-center font-weight-lighter">China</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Ann_Nazmul_Islam_Bangladesh.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Ann Nazmul Islam</h4>
						<p class="text-center font-weight-lighter">Bangladesh</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Belma_Strugalioska_Austria.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Belma Strugalioska</h4>
						<p class="text-center font-weight-lighter">Austria</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Christos_Tsagkaris_Greece.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Christos Tsagkaris</h4>
						<p class="text-center font-weight-lighter">Greece</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Faizan_Akram_Pakistan.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Faizan Akram</h4>
						<p class="text-center font-weight-lighter">Pakistan</p>
					</div>					

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Mashkur_Isa_Ukraine.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Mashkur Isa</h4>
						<p class="text-center font-weight-lighter">Ukraine</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Muhammad_Umair_Ihsan_Pakistan.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Muhammad Umair Ihsan</h4>
						<p class="text-center font-weight-lighter">Pakistan</p>
					</div>

					<div class="col-lg-3 col-md-4 col-xs-6 ">
						<img src="{{asset('img/ligmed/inamsc/Sergillees_Jeeph_Haiti.jpg')}}" alt="ambassador" style="width: 100%;" class="zoom img-fluid mb-3">
						<h4 class="text-center">Sergillees Jeeph</h4>
						<p class="text-center font-weight-lighter">Haiti</p>
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
