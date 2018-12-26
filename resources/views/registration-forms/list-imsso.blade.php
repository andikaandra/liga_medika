  <div class="cabangs">
    <div class="row">
      <div class="col">
        @if($listLomba[5]->status_pendaftaran==0 || $pendaftarLomba[5] >=  $listLomba[5]->kuota)
        <a href="#" style="pointer-events: none">
          <div class="cabang" style="pointer-events: none; background-color: #f2edf3;">
        @else
        <a href="{{url('users/imsso')}}">
          <div class="cabang">
        @endif
            IMSSO
          </div>
        </a>
    </div>
  </div>