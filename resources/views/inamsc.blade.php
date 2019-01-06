@extends('layouts.app2')

@section('content')
	<!-- start banner Area -->
<section class="banner-area-inamsc relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
					Indonesian International (Bio)Medical Students’ Congress	
					</h1>	
				<p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('inamsc')}}"> INAMSC</a></p>
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
					<div class="title text-center">
						<h1 class="mb-10">The competitions held in INAMSC
								2019 are:</h1>
						{{-- <p>Who are in extremely love with eco friendly system.</p> --}}
					</div>
				</div>
			</div>						
			<div class="row">
				<div class="col-lg-6 event-left">
					<div class="single-events inamsc">
						<img class="img-fluid" src="img/u1.jpg" alt="">
						<h4>Literature Review</h4>
						{{-- <h6><span>21st February</span> at Central government museum</h6> --}}
						<p>
							Competition for making scientific paper from the study of several previous literature studies with the theme of mental health which was opened for health and biomedical students at national and international levels. 

							The literature review branch consists of three stages. The first stage is the preliminary round where participants are required to submit their abstracts online. For the second stage, after passing the first selection, the participants will be asked to send a full paper and be invited to make a poster presentation. Participants who pass the semifinal stage will be asked to make oral presentations in front of the judges at the final stage in Jakarta. The winner will get placards and money
						</p>
						{{-- <a href="#" class="primary-btn text-uppercase">View Details</a> --}}
					</div>
					<div class="single-events inamsc">
						<img class="img-fluid" src="img/u3.jpg" alt="">
						<h4>Research Paper and Poster</h4>
						{{-- <h6><span>21st February</span> at Central government museum</h6> --}}
						<p>
							International competition for research papers and original posters that can be followed by young researchers from all fields of health and biomedicine.The theme chosen by the participant's work is not limited to only Liga Medika's theme. Abstract sent by each them will be judged by the judge in the preliminary stage. Teams that manage to pass the preliminary stage will be invited to Jakarta to take part in the next stage.
						</p>
						{{-- <a href="#" class="primary-btn text-uppercase">View Details</a> --}}
					</div>	

					<div class="single-events inamsc">
						<h4>Social Program</h4>
						{{-- <h6><span>21st February</span> at Central government museum</h6> --}}
						<p>
							A relaxed schedule to showcase the wonders of Jakarta's culture and monuments for Liga Medika's participants. It will be
							held on the last day of Liga Medika 2019.
						</p>						
						<img class="img-fluid" src="img/u2.jpg" alt="" style="   display: block;
						margin: 0 auto;"> 
						{{-- <a href="#" class="primary-btn text-uppercase">View Details</a> --}}
					</div>		
											
				</div>
				<div class="col-lg-6 event-right">
					<div class="single-events inamsc">
						<h4>Public Poster</h4>
						{{-- <h6><span>21st February</span> at Central government museum</h6> --}}
						<p>
							Public poster is a poster making competition that appeals the community. Public posters are made based on Liga Medika's theme which is mental health and opened to health science students at the national level. The public poster branch consists of two stages, the first stage is to post the poster online and oral presentation at the final stage. The winner will get placards and money as the prizes.
						</p>
						{{-- <a href="#" class="primary-btn text-uppercase">View Details</a> --}}
						<img class="img-fluid" src="img/u2.jpg" alt="">
					</div>
					<div class="single-events inamsc">
						
						<h4>Educational Video</h4>
						{{-- <h6><span>21st February</span> at Central government museum</h6> --}}
						<p>
							Competition for making scientific paper from the study of several previous literature studies with the theme of mental health which was opened for health and biomedical students at national and international levels. 
							inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
						</p>
						{{-- <a href="#" class="primary-btn text-uppercase">View Details</a> --}}
						<img class="img-fluid" src="img/u4.jpg" alt="">
					</div>	

					<div class="single-events inamsc">
						<h4>Symposium and Workshop</h4>
						{{-- <h6><span>21st February</span> at Central government museum</h6> --}}
						<p>
							Symposium & workshop consists of seminars and trainings that discuss topics about mental health for medical students at national and international levels. Semifinalists and finalists in each branch of the competition will also participate as the participants of symposium & workshop. The series of events consist of 3 symposium seminars followed by 3 workshops running parallel. For the symposium, the committee plans to invite international speakers as one of the speakers.
						</p>						
						<img class="img-fluid" src="img/u2.jpg" alt="" style="   display: block;
						margin: 0 auto;"> 
						{{-- <a href="#" class="primary-btn text-uppercase">View Details</a> --}}
					</div>	
												
				</div>

		
			</div>
		</div>

	</section>

	<section id="inamsc-info">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a class="btn btn-info mr-3" href="{{url('inamsc/guidelines')}}" data-toggle="tooltip" data-placement="top" title="Rules and relevant information are here" target="_blank">Read Guidelines</a>
					<a href="{{url('register')}}" class="btn btn-inamsc">Register INAMSC</a>
				</div>	
							
			</div>
		</div>
	</section>
	

	
@endsection
