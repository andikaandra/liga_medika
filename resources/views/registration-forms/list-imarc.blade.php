  <div class="cabangs">
    <div class="row">
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[8]->status_pendaftaran==0 || $pendaftarLomba[8] >=  $listLomba[8]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imarc/photography')}}">
          <div class="cabang">
        @endif
            Photography
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[9]->status_pendaftaran==0 || $pendaftarLomba[9] >=  $listLomba[9]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imarc/traditional-dance')}}">
          <div class="cabang">
        @endif
            Traditional Dance
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[10]->status_pendaftaran==0 || $pendaftarLomba[10] >=  $listLomba[10]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imarc/vocal-group')}}">
          <div class="cabang">
        @endif
            Vocal Group
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[11]->status_pendaftaran==0 || $pendaftarLomba[11] >=  $listLomba[11]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imarc/band')}}">
          <div class="cabang">
        @endif
            Band
          </div>
        </a>
      </div>
  </div>