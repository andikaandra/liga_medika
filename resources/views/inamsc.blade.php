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
					Indonesian International (Bio)Medical Students’ Congress	
					</h2>	
				<p class="text-white link-nav mb-5"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('inamsc')}}"> INAMSC</a></p>
				<p class="text-justify text-white about mb-3" style="font-size: 16px">
					INAMSC (Indonesian International (Bio)Medical Students’ Congress) 2019 is the seventh annual scientific subprogram of Liga Medika 2019. INAMSC is the biggest scientific event held by medical students in Indonesia. INAMSC 2019 is going to be held in Faculty of Medicine University of Indonesia, Jakarta in Thursday- Sunday, 25th – 28th April 2019. As the biggest scientific platform in Indonesia intended for international and national medical and biomedical students, INAMSC offers the opportunity for students majoring in medical and biomedical sciences all across the globe to engage in scientific discussions and to exchange knowledge. Research enthusiasts around the world are welcomed to participate in this event. 
					This year INAMSC 2019 theme is <strong style="font-weight: 1000; font-size: 16px; ; padding: 2px">Psychiatry</strong>
					With the theme of Psychiatry, we wish to raise awareness on Mental Health prevention, diagnosis, and therapy. 
					INAMSC 2019 consists of four competitions, symposium workshop, and social program.
				</p>
				<a class="guideline-btn mb-3" href="{{url('inamsc/guidelines')}}" data-toggle="tooltip" data-placement="top" title="Rules and relevant information are here" target="_blank">Read Guidelines</a>
				<a href="{{url('register')}}" class="inamsc-btn">Register INAMSC</a>							
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
						<h1>The competitions held in INAMSC 2019 are:</h1>
						<hr>		
					</div>
				</div>
			</div>
			<div class="international-comp">
				<h2 class="mb-10">International Competitions</h2>
				<div class="row my-5 wow slideInLeft">
					<div class="col-lg-5 quote-left">
						<img class="img-fluid" src="{{asset('img/ligmed/inamsc/litrev2.JPG')}}" alt="literature review" style="width: 100%;">
					</div>
					<div class="col-lg-7 quote-right">
						<h1 class="text-info mb-3">Literature Review</h1>
						<p class="justify text-justify">
							Literature Review Competition is an international competition, part of INAMSC 2019, a student conference held by Faculty of Medicine, University of Indonesia. The aim of the competition is to promote understanding in recent medical innovations and discoveries, as reviewing recent studies is the basis of a new breakthrough in science. Therefore, we encourage biomedical students from all over the world to submit their work(s). This year's literature review theme is 'Current Updates on Neuropsychiatric Diseases and Neurobehavioral Medicine'.
						</p>
					</div>
				</div>
				<hr>
				
				<div class="row my-5 wow slideInRight">					
					<div class="col-lg-7 quote-left">
							<h1 class="text-info mb-3">Research Paper and Poster</h1>
						<p class="justify text-justify">
							Research paper and poster (RPP) competition is an international competition, part of INAMSC 2019, a student conference held by Faculty of Medicine, University of Indonesia. This competition intended for young researchers from health and/or biomedical science-related fields to submit their original research paper. The aims of this competition are to appreciate the importance of research as the fundamental aspect of medical development and facilitate young researchers to present their researches and to exchange knowledge with other participants.
						</p>
					</div>
					<div class="col-lg-5 quote-right">
							<img class="img-fluid" src="{{asset('img/ligmed/inamsc/rpp2.JPG')}}" alt="research paper and poster" style="width: 100%;">
						</div>
				</div>
				<hr>
			</div>

			<div class="national-comp">
					<h2 class="mb-10">National Competitions</h2>
				<div class="row my-5 wow slideInLeft">

						<div class="col-lg-5 quote-left">
								<img class="img-fluid" src="{{asset('img/ligmed/inamsc/pposter2.JPG')}}" alt="public poster" style="width: 100%;">
							</div>
					<div class="col-lg-7 quote-right">
						<h1 class="text-info mb-3" style="font-weight: bold; font-size: 36px">Public Poster</h1>
						<p class="justify text-justify">
							Public Poster is a national competition that is part of INAMSC Liga Medika 2019. Public posters as one of the art forms that can be enjoyed by the community. The aims of this competition are to present creative and different ways of promotive and preventive effort to support the government and the community for better Indonesian health.
						</p>
					</div>
				</div>
				<hr>
				<div class="row my-5 wow slideInRight">
					<div class="col-lg-7 quote-left">
						<h1 class="text-info mb-3" style="font-weight: bold; font-size: 36px">Educational Video</h1>
						<p class="justify text-justify">
							Educational video is a new national competition branch that is part of INAMSC Liga Medika 2019. Educational video as one of the art forms that can be enjoyed by the community. The aims of this competition are to present creative and different ways of promotive and preventive effort to support the government and the community for better Indonesian health.
						</p>
					</div>
					<div class="col-lg-5 quote-right">
						<img class="img-fluid" src="{{asset('img/ligmed/inamsc/edvid.JPG')}}" alt="educational video" style="width: 100%;">
					</div>
				</div>		
			</div>

			<div class="additional-comp">
				<h2 class="mb-10">Additional Event</h2>
			<div class="row my-5 wow slideInLeft">

					<div class="col-lg-5 quote-left">
							<img class="img-fluid" src="{{asset('img/ligmed/inamsc/pposter2.JPG')}}" alt="public poster" style="width: 100%;">
						</div>
				<div class="col-lg-7 quote-right">
					<h1 class="text-info mb-3" style="font-weight: bold; font-size: 36px">Symposium and Workshop</h1>
					<p class="justify text-justify">
						The symposium consists of three continual sessions, meanwhile, workshop consists of three parallel sessions. Participants are encouraged to actively participate at the end of every session. Then, participants are facilitated to implement their knowledge from Symposium sessions in Workshop sessions. The workshop allows participants to learn and enhance their case-based clinical skill. All knowledge given in Symposium and Workshop is relevant especially for biomedical student and general practitioner.
					</p>
				</div>
			</div>	
		</div>


	        <div class="row my-5 wow slideInUp justify-content-center slow">
				<a href="{{url('register')}}" class="inamsc-btn">Register NOW</a>
	        </div>
		</div>
	</section>


@endsection


@section('script')
	<script>
		$("#nav-inamsc").addClass("menu-active");
	</script>
@endsection