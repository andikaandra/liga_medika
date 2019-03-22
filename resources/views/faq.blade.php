@extends('layouts.app2')


@section('style')
    <style>
    
    .text-info-inamsc {
		color: #ee2427 !important;
	}
    
    </style>
@endsection

@section('content')
<!-- start banner Area -->
<section class="banner-area-faq relative " id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12 inamsc-mobile">
                <h2 class="text-white">
                Frequently Asked Questions
                </h2>	                    
        </div>
    </div>
    </div>
</section>
<br>

<section class="inamsc-faq section-gap">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-6">
                <div class="title text-center mb-10">
                    <h1>INAMSC</h1>
                    <hr>		
                </div>
            </div>
        </div>
    <div class="container">
        <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link text-info-inamsc" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What faculties are allowed to join INAMSC 2019? 
                </button>
            </h5>
            </div>
        
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <p>Faculties that belong to biomedical major and psychology, 
                Here is the list: </p>
                <ul>
                    <li>General medicine and dentistry </li>
                    <li>Nursing</li>
                    <li>Public health</li>
                    <li>Pharmacy</li>
                    <li>Biomedical engineering </li>
                    <li>Biology </li>
                    <li>Psychology</li>
                </ul>						
                    
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed text-info-inamsc" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Can a clinical student participate on the INAMSC competition? 
                </button>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <p>Clinical student who has not got their medical degree or other profession degree can participate in Research Paper and Poster (RPP) competition, but is not allowed in other competition branches. </p>
                    <p>Due to schedule rearrangement from INAMSC competition, we allow clinical student who has just entered clinical phase after April 2019 to join all of our competition branches including RPP, Literature Review, Public Poster, and Educational Video. </p>						
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed text-info-inamsc" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Where can I download documents that required for INAMSC registration? 
                </button>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <p>
                    All of the registration files can be downloaded on the Liga Medika website or after you filled the registration form on the Liga Medika website ( <a href="https://ligamedika.com/inamsc" target="_blank">
                        ligamedika.com/inamsc</a> ). 
                </p>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed text-info-inamsc" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Do I need visa to come to Indonesia? 
                </button>
            </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <p>
                    You can visit the link bellow for more detail information. 
                    <a href="https://en.wikipedia.org/wiki/Visa_policy_of_Indonesia" target="_blank">
                        en.wikipedia.org/Visa_policy_of_Indonesia 				
                    </a>	
                </p>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingFive">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed text-info-inamsc" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    How long does it take to get the email confirmation after my registration?
                </button>
            </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
                <p>
                    You will get email confirmation 1-2 days after your registration process. If you haven't get the email confirmation after 1-2 days you can contact the contact person (CP) for registration line id/wa: amirahyasmin/+628119408949	
                </p>
            </div>
            </div>
        </div>

        <div class="card">
                <div class="card-header" id="headingSix">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-info-inamsc" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        For further information
                    </button>
                </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                <div class="card-body">
                    <p>
                        inamsc2019@gmail.com <br>
                        www.facebook.com/inamsc <br>
                        For partnership and sponsorship offers: <br>
                        inamsc.pr@gmail.com <br>
                        #kenalijiwa															
                    </p>
                </div>
                </div>
            </div>

        </div>
    </div>		
</section>

<br>
@endsection

@section('script')
    
@endsection