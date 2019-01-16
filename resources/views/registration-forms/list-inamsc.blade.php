  <div class="cabangs">
    <div class="row">
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[0]->status_pendaftaran==0 || $pendaftarLomba[0] >=  $listLomba[0]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/inamsc/symposium')}}">
          <div class="cabang">
        @endif
            Symposium & Workshop
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[1]->status_pendaftaran==0 || $pendaftarLomba[1] >=  $listLomba[1]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/inamsc/education-video')}}">
          <div class="cabang">
        @endif
            Educational Video
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[2]->status_pendaftaran==0 || $pendaftarLomba[2] >=  $listLomba[2]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/inamsc/poster-publication')}}">
          <div class="cabang">
        @endif
            Public Poster
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[3]->status_pendaftaran==0 || $pendaftarLomba[3] >=  $listLomba[3]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/inamsc/literature-review')}}">
          <div class="cabang">
        @endif
            Literature Review
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[4]->status_pendaftaran==0 || $pendaftarLomba[4] >=  $listLomba[4]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/inamsc/research-paper')}}">
          <div class="cabang">
        @endif
            Research Paper & Poster
          </div>
        </a>
      </div>
    </div>
  </div>
