<div class="progress-section">
  <ul class="progressbar">
     <li class="active">Choose cabang</li>
     <li class="">choose interest</li>
     <li>add friends</li>
     <li>View map</li>
  </ul>
</div>

<div class="card-body">
  <div class="page-header">
    <h3 class="page-title">
    Pre-registration
    </h3>
  </div>

  <form class="" action="{{url('users/register')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Cabang lomba: </label>
        <select class="form-control" name="cabang">
          <option value="3">INAMSC</option>
          <option value="2">IMARC</option>
          <option value="1">IMSSO</option>
          <option value="5">HFGM</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Nama penganggung jawab: </label>
        <input type="text" class="form-control" name="penanggung_jawab" value="">
      </div>
      <div class="form-group">
        <label for="">Asal universitas: </label>
        <input type="text" class="form-control" name="" value="">
      </div>
    </div>
    <input type="submit" class="btn btn-success" name="" value="Submit">
  </form>
</div>
