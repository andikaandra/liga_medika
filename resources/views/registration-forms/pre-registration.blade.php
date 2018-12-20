<div class="progress-section">
  <ul class="progressbar">
      <li class="active">Choose competition/ event</li>
      <li>Fill in self data and payment</li>
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
          <option value="3">INAMSC</option>
          <option value="2">IMARC</option>
          <option value="1">IMSSO</option>
          <option value="4">HFGM</option>
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
