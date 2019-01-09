@extends('layouts.app2')

@section('style')
    <style>
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
<section class="banner-area relative" id="gallery">	
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h2 class="text-white">
						Gallery				
					</h2>	
				<p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('gallery')}}"> Gallery</a></p>
				</div>											
			</div>
		</div>
	</section>
	<!-- End banner Area -->	
	
	

	<section class="gallery-area section-gap" id="gallery">
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
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/litrev.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/litrev.JPG')}}"></a>
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/litrev2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/litrev2.JPG')}}"></a>
	
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/pposter.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/pposter.JPG')}}"></a>
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/pposter2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/pposter2.JPG')}}"></a>
	                
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/rpp.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/rpp.JPG')}}"></a>
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/rpp2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/rpp2.JPG')}}"></a>
	                
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/sym.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/sym.JPG')}}"></a>
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/workshop.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/workshop.JPG')}}"></a>
	
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/inamsc/workshop2.JPG"><img class="grid-item" src="{{asset('img/ligmed/inamsc/workshop2.JPG')}}"></a>
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/hfgm/hfgm2.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm2.jpg')}}"></a>

					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/hfgm/hfgm3.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm3.jpg')}}"></a>
	
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/hfgm/hfgm1.jpg"><img class="grid-item" src="{{asset('img/ligmed/hfgm/hfgm1.jpg')}}"></a>
	
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/imsso/imsso1.jpg"><img class="grid-item" src="{{asset('img/ligmed/imsso/imsso1.jpg')}}"></a>
	
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/imsso/imsso2.jpg"><img class="grid-item" src="{{asset('img/ligmed/imsso/imsso2.jpg')}}"></a>
	
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/imarc/imarc1.jpg"><img class="grid-item" src="{{asset('img/ligmed/imarc/imarc1.jpg')}}"></a>
	
					<a class="single-gallery wow fadeIn image-hover" href="img/ligmed/imarc/imarc2.jpg"><img class="grid-item" src="{{asset('img/ligmed/imarc/imarc2.jpg')}}"></a>

				</div>	
			</div>	
		</section>
	
@endsection


@section('script')
	<script>
		$("#nav-gallery").addClass("menu-active");
	</script>
@endsection