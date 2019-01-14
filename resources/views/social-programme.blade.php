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
							
			</div>
	</section>


	<section class="upcoming-event-area" id="events" style="padding-top: 120px">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center mb-10">
						<h2>Places of Interests:</h2>
						<hr>		
					</div>
				</div>
			</div>
			<div class="row my-5 wow slideInLeft">
				<div class="col-lg-5 quote-left">
					<img class="img-fluid" src="{{asset('img/ligmed/city-tour/museum.jpg')}}" alt="city tour" style="width: 100%;">
				</div>
				<div class="col-lg-7 quote-right">
					<h1 class="text-info mb-3">Museum Kebangkitan Nasional</h1>
					<p class="justify text-justify">
						Museum of National Awakening atau yang sering disebut sebagai Museum Kebangkitan Nasional merupakan gedung yang dibangun sebagai monumen dari tempat lahir dan berkembangnya kesadaran nasional serta ditemukannya organisasi pergerakan yang dikenal sebagai Boedi Oetomo. Dahulu, bangunan ini merupakan sekolah kedokteran yang didirikan Belanda dengan nama Sekolah Dokter Bumiputra atau disebut STOVIA yang merupakan singkatan dari School tot Opleiding van Inlandsche Artsen.</p>
				</div>
			</div>
<hr>
			<div class="row my-5 wow slideInRight">
				<div class="col-lg-7 quote-left">
					<h1 class="text-info mb-3">Galeri Nasional Indonesia</h1>
					<p class="justify text-justify">
						Galeri Nasional Indonesia atau yang sering disingkat menjadi GALNAS adalah suatu lembaga museum dan pusat dari kegiatan seni rupa yang ada di Indonesia dengan tujuan untuk melindungi, memanfaatkan, dan mengembangkan koleksi seni rupa sebagai sebuah sarana edukasi-kultural, rekreasi, dan sebagai media untuk meningkatkan kreativitas dan juga apresiasi terhadap seni.</p>
				</div>
				<div class="col-lg-5 quote-right">
					<img class="img-fluid" src="{{asset('img/ligmed/city-tour/gaalnas.jpg')}}" alt="city tour" style="width: 100%;">
				</div>
			</div>
<hr>
			<div class="row my-5 wow slideInLeft">
				<div class="col-lg-5 quote-left">
					<img class="img-fluid" src="{{asset('img/ligmed/city-tour/monas.jpg')}}" alt="city tour" style="width: 100%;">
				</div>
				<div class="col-lg-7 quote-right">
					<h1 class="text-info mb-3">Monumen Nasional</h1>
					<p class="justify text-justify">
						Monas yang merupakan singkatan dari Monumen Nasional ialah monumen peringatan dengan tinggi 132 meter yang didirikan guna mengenang perjuangan dan perlawanan dari rakyat Indonesia dalam memperebutkan kemerdekaan dari pemerintahan kolonial Hindia Belanda. Pembangunan monas dimulai dari tanggal 17 Agustus 1961 dan selesai pada tanggal 12 Juli 2075 pada pemerintahan Soekarno. Di atas tugu terdapat lidah api yang dilapisi lembaran emas yang menggambarkan semangat perjuangan rakyat Indonesia yang berapi-api.
					</p>
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