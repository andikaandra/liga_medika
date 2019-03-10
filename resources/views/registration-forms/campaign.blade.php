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
            </ul>

          </div>
        @endif

        <div class="alert alert-info">
          <p>Hello <strong>{{Auth::user()->name}}</strong>. You have been assigned unique <strong>ID {{Auth::user()->id + 000}}</strong>. The amount you must transfer to register Campaign is <strong>Rp {{ number_format($lomba->biaya + Auth::user()->id + 000 ,2,',','.')}}</strong>. This is to make sure the verification process is done fast.</p>
          <hr>
          <p>HFGM Campaign wave: {{$lomba->gelombang_sekarang}}</p>
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
                Register HFGM Campaign
              </h3>
            </div>
            <p>Please fill in the following fields</p>

            <form method="post" enctype="multipart/form-data" action="{{route('register.campaign')}}">
            @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Full Name: </label>
                    <input type="text" placeholder="What is your name?" class="form-control" name="nama" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Ticket/s Amount</label>
                    <input type="number" min="1" max="20" step="1" class="price form-control" placeholder="Ammount of tickets you will buy?" class="form-control" name="jumlah" value="">
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
                    <input type="text" placeholder="What is the name of the account used to send the payment?" class="form-control" name="nama_rekening" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Amount: </label>
                    <input type="text" class="price form-control" placeholder="How much did you transfer? e.g. 150003" class="form-control" name="jumlah_transfer" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Scan proof of payment receipt: </label>
                    <br><input type="file" name="bukti_pembayaran" accept="image/*" value=""><br>
                    <small class="form-text text-muted">Max size 1 mb</small>
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
