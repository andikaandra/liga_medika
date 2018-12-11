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
        <div class="alert alert-warning">
          <p>Hello <strong>Adis</strong>. You have been assigned unique <strong>ID {{Auth::user()->id + 000}}</strong>. The amount you must transfer to register Simposium & Workshop is <strong>Rp {{ number_format($lomba->biaya + Auth::user()->id + 000 ,2,',','.')}}</strong>. This is to make sure the verification process is done fast.</p>
          <hr>
          <p>Simposium & Workshop wave: {{$lomba->gelombang_sekarang}}</p>
        </div>
        <div class="card">
          <div class="progress-section">
            <ul class="progressbar">
               <li class="active">Choose cabang</li>
               <li class="active">Fill in self data and payment</li>
               <li>add friends</li>
               <li>View map</li>
            </ul>
          </div>

          <div class="card-body">
            <div class="page-header">
              <h3 class="page-title">
                Register Simposium & Workshop
              </h3>
            </div>
            <p>Please fill in the following fields</p>

            <form class="" action="#" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Student name: </label>
                    <input type="text" placeholder="What is your name?" class="form-control" name="nama" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Scan KTP/ KTM</label>
                    <br><input type="file" name="ktp" accept="image/*" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Account Sender's name: </label>
                    <input type="text" placeholder="What is the name of the account used to send the payment?" class="form-control" name="nama_rekening" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Amount: </label>
                    <input type="text" placeholder="How much did you transfer? e.g. 150003" class="form-control" name="jumlah_transfer" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Scan payment receipt: </label>
                    <br><input type="file" name="bukti_pembayaran" accept="image/*" value="">
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
