  <div class="cabangs">
    <div class="row">
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[5]->status_pendaftaran==0 || $pendaftarLomba[5] >=  $listLomba[5]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imsso/men-basketball')}}">
          <div class="cabang">
        @endif
            Men Basketball
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[6]->status_pendaftaran==0 || $pendaftarLomba[6] >=  $listLomba[6]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imsso/women-basketball')}}">
          <div class="cabang">
        @endif
            Women Basketball
          </div>
        </a>
      </div>
      <div class="col-md-4 col-12 mb-2">
        @if($listLomba[7]->status_pendaftaran==0 || $pendaftarLomba[7] >=  $listLomba[7]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imsso/men-futsal')}}">
          <div class="cabang">
        @endif
            Mini Soccer
          </div>
        </a>
      </div>
  </div>