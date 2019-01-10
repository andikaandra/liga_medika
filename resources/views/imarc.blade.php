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
		color: #295F51 !important;
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
<section class="banner-area-imarc relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12 inamsc-mobile">
					<h2 class="text-white">
					Indonesian Medical Arts Competition
					</h2>	
				<p class="text-white link-nav mb-5"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('imarc')}}"> IMARC</a></p>
				<p class="text-justify text-white about mb-3" style="font-size: 16px">
					IMARC (Indonesian Medical Arts Competition) merupakan kompetisi seni tingkat nasional yang tergabung dalam rangkaian acara Liga Medika 2019. Tahun ini, IMARC terdiri dari empat cabang untuk dilombakan, yaitu Tari Tradisional, Vocal Group, Band, dan Fotografi dan akan diadakan pada tanggal 27-28 April 2019. Seperti namanya, IMARC bertujuan untuk memfasilitasi minat dan bakat mahasiswa kesehatan di seluruh Indonesia dalam bidang seni. IMARC juga memiliki harapan untuk dapat meningkatkan kesadaran masyarakat akan  kesehatan jiwa melalui bidang seni dengan dibukanya beberapa cabang kepada mahasiswa umum, yaitu cabang Band dan cabang Fotografi.
				</p>

				<a href="{{url('register')}}" class="imarc-btn">Register IMARC</a>
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
						<h1>The competitions held in IMARC 2019 are:</h1>
						<hr>		
					</div>
				</div>
			</div>
			<div class="umum">
				<h2 class="mb-10">Mahasiswa Umum</h2>
				<div class="row my-5 wow slideInLeft">
					<div class="col-lg-5 quote-left">
						<img class="img-fluid" src="{{asset('img/ligmed/imarc/imarc1.jpg')}}" alt="band" style="width: 100%;">
					</div>
					<div class="col-lg-7 quote-right">
						<h1 class="text-info mb-3">Band</h1>
						<p class="justify text-justify">
							Cabang Band akan diadakan pada hari Minggu, sebelum HFGM Closing Ceremony. Peserta akan diminta untuk membawakan dua lagu, lagu wajib yang sudah ditentukan panitia dan lagu bebas yang merupakan pilihan dari para peserta. Pemenang dari cabang ini akan mendapatkan hadiah berupa uang beserta fasilitas distribusi musik digital serta tampil di acara closing Liga Medika (memperebutkan juara I, II, III)
						</p>
					</div>
				</div>
				<hr>
				
				<div class="row my-5 wow slideInRight">					
					<div class="col-lg-7 quote-left">
							<h1 class="text-info mb-3">Fotografi</h1>
						<p class="justify text-justify">
							Cabang Fotografi akan diadakan bersamaan dengan HFGM Closing Ceremony. Hasil foto dari peserta akan disajikan dalam bentuk pameran foto dan dipamerkan bersamaan dengan acara HFGM dan penutupan dari HFGM. Dalam lomba foto akan ada tambahan mata acara lain berupa photo rally untuk para peserta HFGM. Pemenang dari cabang ini akan mendapatkan hadiah berupa uang (memperebutkan juara I, II, dan III)
						</p>
					</div>
					<div class="col-lg-5 quote-right">
							<img class="img-fluid" src="{{asset('img/ligmed/imarc/imarc5.jpg')}}" alt="fotografi" style="width: 100%;">
						</div>
				</div>
				<hr>
			</div>

			<div class="kesehatan">
					<h2 class="mb-10">Mahasiswa Kesehatan</h2>
				<div class="row my-5 wow slideInLeft">

						<div class="col-lg-5 quote-left">
								<img class="img-fluid" src="{{asset('img/ligmed/imarc/imarc3.jpg')}}" alt="vocal group" style="width: 100%;">
							</div>
					<div class="col-lg-7 quote-right">
						<h1 class="text-info mb-3" style="font-weight: bold; font-size: 36px">Vocal Group</h1>
						<p class="justify text-justify">
							Cabang Vocal Group akan diadakan pada hari Sabtu. Acara pada cabang ini adalah kompetisi vocal group. Pemenang dari cabang ini akan mendapatkan hadiah berupa uang (memperebutkan juara I, II, III)
						</p>
					</div>
				</div>
				<hr>
				<div class="row my-5 wow slideInRight">
					<div class="col-lg-7 quote-left">
						<h1 class="text-info mb-3" style="font-weight: bold; font-size: 36px">Tari Tradisional</h1>
						<p class="justify text-justify">
							Cabang Tari Tradisional akan diadakan pada hari Sabtu. Terdapat dua mata acara pada cabang ini, yaitu lomba tari tradisional dan workshop tari tradisional bagi para peserta lomba. Pemenang dari cabang ini akan mendapatkan hadiah berupa uang (memperebutkan juara I, II, III)
						</p>
					</div>
					<div class="col-lg-5 quote-right">
						<img class="img-fluid" src="{{asset('img/ligmed/imarc/imarc2.jpg')}}" alt="tari tradisional" style="width: 100%;">
					</div>
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
		$("#nav-imarc").addClass("menu-active");
	</script>
@endsection