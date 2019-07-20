@extends('layouts.admin')


@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection


@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        @if ($errors->all())
          <div class="alert alert-danger">
            <strong>Failed to submit: </strong>
            <ul>
              @if ($errors->has('ktp'))
                <li>Uploaded KTP file cannot exceed 1 mb.</li>
                <li>Uploaded KTP file has to be jpeg, jpg or png format.</li>
              @endif
              @if ($errors->has('bukti_pembayaran'))
                <li>Uploaded proof of payment file cannot exceed 1 mb.</li>
                <li>Uploaded proof of payment file has to be jpeg, jpg or png format.</li>
              @endif
              <li>Don't leave any fields empty (except marked as optional).</li>
            </ul>

          </div>
        @endif

        <div class="alert alert-info">
          <p>Hello <strong>{{Auth::user()->name}}</strong>. You have been assigned unique <strong>ID {{Auth::user()->id + 000}}</strong>. The amount you must transfer to register Symposium & Workshop is <strong>Rp {{ number_format($lomba->biaya + Auth::user()->id + 000 ,2,',','.')}}</strong>. This is to make sure the verification process is done fast.</p>
          <hr>
          <p>Symposium & Workshop wave: {{$lomba->gelombang_sekarang}}</p>
        </div>
          <form id="reset" method="post" action="{{route('reset.cabang')}}">
          @csrf
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="alert alert-warning">
              After you click submit button you cannot undo the changes. If you would like to start over, you may <a href="#" onclick="$('#reset').submit(); return false;" id="submit">Click here to reset</a>.
          </div>
          </form>
        <div class="card">
          <div class="symposium progress-section">
            <ul class="progressbar">
              <li class="active">Choose sub competition</li>
               <li class="active">Fill in self data and payment</li>
               <li>Data and payment verification by Admin</li>
               {{-- <li>View map</li> --}}
            </ul>
          </div>

          <div class="card-body">
            <div class="page-header">
              <h3 class="page-title">
                Register Symposium & Workshop
              </h3>
            </div>
            <p>Please fill in the following fields</p>

            <form class="" action="#" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="">Workshop Options: </label>
                <select class="custom-select" id="workshop" name="workshop">
                  <option value="1" selected>Less Stress for Future Doctors: an Introduction to PRH</option>
                  <option value="2">Mental Health Assessment in General Practice</option>
                  <option value="3">Assessment of schizophrenia in primary health care: mental disease with common occurence in young adult</option>
                </select>
              </div>
              <div class="form-group" id="sertifikat" style="display: block;">
                <label for="">International Accreditation Certificate: </label>
                <select class="custom-select" id="accreditation" name="accreditation">
                  <option value="no" selected>No</option>
                  <option value="yes">Yes</option>
                </select>
                <small>If you choose yes, you will be charged an additional Rp. 50.000,00 then you will pay <strong>Rp {{ number_format($lomba->biaya + 50000 + Auth::user()->id + 000 ,2,',','.')}}</strong></small>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Student name: </label>
                    <input pattern=".*\S+.*" title="This field is required" type="text" placeholder="What is your name?" class="form-control" name="nama" value="" required>
                  </div>
                    <div class="form-group">
                        <label for="">University/ Institute: </label>
                        <input pattern=".*\S+.*" title="This field is required" type="text" placeholder="What is your university/ institute?" class="form-control" name="universitas" value="" required>
                    </div>
                  <div class="form-group">
                    <label for="">Scan Student ID card/ KTP</label>
                    <br><input type="file" name="ktp" accept="image/*" value=""><br>
                    <small class="form-text text-muted">Max size 1 mb</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Account Sender's name: </label>
                    <input pattern=".*\S+.*" title="This field is required" type="text" placeholder="What is the name of the account used to send the payment?" class="form-control" name="nama_rekening" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Amount: </label>
                    <input type="text" class="price form-control" placeholder="How much did you transfer? e.g. 150003" class="form-control" name="jumlah_transfer" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Scan proof of payment receipt: </label>
                    <br><input type="file" name="bukti_pembayaran" accept="image/*" value=""><br>
                    <small class="form-text text-muted">Max size 1 mb. Images only.</small>
                  </div>
                </div>
              </div>
              <input type="hidden" name="gelombang" value="{{$lomba->gelombang_sekarang}}">
              <input type="submit" name="" value="Submit" class="btn btn-success">
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script>

  let status = $('#workshop').val();
  if (status==1) {
    $('#sertifikat').css('display', 'block');
  }
  else{
    $('#sertifikat').css('display', 'none');
  }

  $('#workshop').on('change', function() {
      status = $(this).val();
      console.log(status);
      if (status==1) {
        $('#sertifikat').css('display', 'block');
      }
      else{
        $('#sertifikat').css('display', 'none');
      }
  });
</script>
@endsection
