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
      @if(Auth::user()->can_join_final == 0)
        <strong class="text-danger">Congratulations, your team was chosen to be a finalist, please fill this form to confirm your attendance at finals</strong><br>
        <p>Can you attend the final event at Universitas Indonesia on August 22-25, 2019?</p>
        <form action="{{ route('final.attendance') }}" id="can_join_finals" method="POST">
            <div class="form-group-row">
              <label for=""  class="col-sm-2 col-form-label">Final Attendance: </label>
              <div class="col-sm-4">
                <select class="custom-select text-muted" id="attendance" name="attendance" required>
                  <option value="1" selected>Yes</option>
                  <option value="-1">No</option>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group ml-3">
              <button type="button" class="saveattendance btn btn-primary btn-sm">Save</button><br>
              <small class="text-muted color-danger">Once submitted you cant change your answer!</small>
            </div>
            {{ csrf_field() }}
        </form>
      @elseif(Auth::user()->can_join_final == 1)
        <strong class="text-danger">Congratulations, your team was chosen to be a finalist, please fill finalists requirements <a href="{{url('users/travel-plan')}}">Here</a></strong>
      @else
        <strong class="text-danger">We are sad to see you unable to attend the Final event. thank you for being a part of Liga Medika 2019. For further inquiries please contact our committee.</strong>
      @endif
    @elseif(Auth::user()->status_lolos == -1)
      <strong class="text-danger">Sorry, your team cannot proceed to the next round, thanks for joining Liga Medika 2019</strong>
    @endif
  </div>
@endif
