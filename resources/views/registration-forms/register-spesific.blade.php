

<div class="symposium progress-section">
  <ul class="progressbar">
      <li class="active">Choose cabang</li>
      <li>Fill in self data and payment</li>
      <li>Data and payment verification by Admin</li>

      {{-- <li>View map</li> --}}
  </ul>
</div>


<div class="card-body">
  <div class="page-header">
    <h3 class="page-title">
      Register {{$lomba->nama}}
    </h3>
  </div>
  <p>Please choose a sub competition/ event you would like to register</p>

  @if(Auth::user()->cabang==1) {{-- IMSSO --}}
    @include('registration-forms.list-imsso')
  @elseif(Auth::user()->cabang==2) {{-- IMARC --}}
    @include('registration-forms.list-imarc')
  @elseif(Auth::user()->cabang==3) {{-- INAMSC --}}
    @include('registration-forms.list-inamsc')
  @elseif(Auth::user()->cabang==4) {{-- HFGM --}}
    @include('registration-forms.list-hfgm')
  @endif
</div>
