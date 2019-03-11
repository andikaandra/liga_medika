  <div class="cabangs">
    <div class="row">
      <div class="col">
        @if($listLomba[12]->status_pendaftaran==0 || $pendaftarLomba[12] >=  $listLomba[12]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/hfgm/campaign')}}">
          <div class="cabang">
        @endif
            Campaign
          </div>
        </a>
      </div>
      <div class="col">
        @if($listLomba[13]->status_pendaftaran==0 || $pendaftarLomba[13] >=  $listLomba[13]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/hfgm/concert')}}">
          <div class="cabang">
        @endif
            Concert
          </div>
        </a>
      </div>
    </div>
  </div>