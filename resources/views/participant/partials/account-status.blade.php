@if (Auth::user()->lomba_verified == -1)
  <div class="alert alert-danger">
      <p class="card-text">Your registration has been declined. You can contact contact our committee at: 
        <strong>
        <br> Amirah Yasmin (INAMSC), Phone: 0811 9408 949, ID Line: amirahyasmin
        <br> Nur Zakiah Syahsah (IMARC), Phone: 0812 8365 1868, ID Line: Zakiahsy
        <br> Afiyatul Mardiyah (IMSSO), Phone: 0896 5805 5704, ID Line: fia24yb
        <br>
        </strong>
        for more information.</p>
  </div>

@elseif (Auth::user()->lomba_verified == 0)
  <div class="alert alert-warning">
    <p class="card-text">Your registration is being reviewed by the committe. Please be patient. You can contact our committee at: 
        <strong>
        <br> Amirah Yasmin (INAMSC), Phone: 0811 9408 949, ID Line: amirahyasmin
        <br> Nur Zakiah Syahsah (IMARC), Phone: 0812 8365 1868, ID Line: Zakiahsy
        <br> Afiyatul Mardiyah (IMSSO), Phone: 0896 5805 5704, ID Line: fia24yb
        <br></strong>
      
      for more information.</p>
  </div>
@else
  <div class="alert alert-success">
    <p class="card-text">Your registration has been accepted by the committe. You can contact our committee at: 
        <strong>
        <br> Amirah Yasmin (INAMSC), Phone: 0811 9408 949, ID Line: amirahyasmin
        <br> Nur Zakiah Syahsah (IMARC), Phone: 0812 8365 1868, ID Line: Zakiahsy
        <br> Afiyatul Mardiyah (IMSSO), Phone: 0896 5805 5704, ID Line: fia24yb
        <br></strong>

      for more information.</p>
    <hr>
    @if(Auth::user()->status_lolos == 1)
      <strong class="text-danger">Congratulations, your team was chosen to be a finalist, please fill your travel plan and choose your workshop <a href="{{url('users/travel-plan')}}">Here</a></strong>
    @elseif(Auth::user()->status_lolos == -1)
      <strong class="text-danger">Sorry, your team cannot proceed to the next round, thanks for joining Liga Medika 2019</strong>
    @endif
  </div>
@endif
