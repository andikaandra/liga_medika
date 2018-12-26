  <div class="cabangs">
    <div class="row">
      <div class="col">
        @if($listLomba[6]->status_pendaftaran==0 || $pendaftarLomba[6] >=  $listLomba[6]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imarc')}}">
          <div class="cabang">
        @endif
            IMARC
          </div>
        </a>
    </div>
  </div>