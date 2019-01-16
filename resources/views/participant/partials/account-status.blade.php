@if (Auth::user()->lomba_verified == -1)
  <div class="alert alert-danger">
      <p class="card-text">Your registration has been declined. You can contact contact our committee at: 
        <strong>
        <br> Sheila Fajarina Safety, Phone: 0812 3447 172, ID Line: Sheifsty
        <br> Amirah Yasmin, Phone: 0811 9408 949, ID Line: amirahyasmin
        <br> Nur Zakiah Syahsah, Phone: 0812 8365 1868, ID Line: Zakiahsy
        <br>
        </strong>
        for more information.</p>
  </div>

@elseif (Auth::user()->lomba_verified == 0)
  <div class="alert alert-warning">
    <p class="card-text">Your registration is being reviewed by the committe. Please be patient. You can contact our committee at: 
        <strong>
        <br> Sheila Fajarina Safety, Phone: 0812 3447 172, ID Line: Sheifsty
        <br> Amirah Yasmin, Phone: 0811 9408 949, ID Line: amirahyasmin
        <br> Nur Zakiah Syahsah, Phone: 0812 8365 1868, ID Line: Zakiahsy
        <br></strong>
      
      for more information.</p>
  </div>
@else
  <div class="alert alert-success">
    <p class="card-text">Your registration has been accepted by the committe. You can contact our committee at: 
        <strong>
        <br> Sheila Fajarina Safety, Phone: 0812 3447 172, ID Line: Sheifsty
        <br> Amirah Yasmin, Phone: 0811 9408 949, ID Line: amirahyasmin
        <br> Nur Zakiah Syahsah, Phone: 0812 8365 1868, ID Line: Zakiahsy
        <br></strong>

      for more information.</p>
  </div>
@endif
