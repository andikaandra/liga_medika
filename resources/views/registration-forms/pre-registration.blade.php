<div class="progress-section">
  <ul class="progressbar">
      <li class="active">Choose competition/ event</li>
      <li class="">Fill in self data and payment</li>
      <li>Data verification by Admin</li>
      <li>Upload Files*</li>
  </ul>
</div>

<div class="card-body">
  <div class="page-header">
    <h3 class="page-title">
    Pre-registration
    </h3>
  </div>

  <form class="" action="{{url('users/register')}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Competition/ event: </label>
        <select class="form-control" name="cabang" required>
          @if($listLomba[0]->status_pendaftaran==0 && $listLomba[1]->status_pendaftaran==0 && $listLomba[2]->status_pendaftaran==0 && $listLomba[3]->status_pendaftaran==0 && $listLomba[4]->status_pendaftaran==0)
          <option value="3" disabled>INAMSC</option>
          @else
          <option value="3">INAMSC</option>
          @endif
          @if($listLomba[8]->status_pendaftaran==0 && $listLomba[9]->status_pendaftaran==0 && $listLomba[10]->status_pendaftaran==0 && $listLomba[11]->status_pendaftaran==0)
          <option value="2" disabled>IMARC</option>
          @else
          <option value="2">IMARC</option>
          @endif
          @if($listLomba[5]->status_pendaftaran==0 && $listLomba[6]->status_pendaftaran==0 && $listLomba[7]->status_pendaftaran==0)
          <option value="1" disabled>IMSSO</option>
          @else
          <option value="1">IMSSO</option>
          @endif
          @if($listLomba[12]->status_pendaftaran==0 && $listLomba[13]->status_pendaftaran==0)
          <option value="4" disabled>HFGM</option>
          @else
          <option value="4">HFGM</option>
          @endif
        </select>
      </div>
      <div class="form-group">
        <label for="">Name of Person in Charge: </label>
        <input type="text" class="form-control" name="penanggung_jawab" value="" required pattern=".*\S+.*" title="This field is required">
      </div>
      <div class="form-group">
        <label for="">University: </label>
        <input type="text" class="form-control" name="universitas" value="" required pattern=".*\S+.*" title="This field is required">
      </div>
    </div>
    <input type="submit" class="btn btn-success" name="" value="Submit" required>
  </form>
</div>
