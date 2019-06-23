@extends('layouts.admin')

@section('style')
<style>

  .files-description {
    display: none;
  }

</style>
@endsection

@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection

@section('content')
<div class="content-wrapper">
  <div class="row">
    {{-- <div class="container"> --}}
      <div class="col-md-12">
        @if ($errors->all())
          <div class="alert alert-danger">
            <strong>Failed to submit: </strong>
            <ul>              
              <li>Uploaded proof of payment file cannot exceed 1 mb.</li>
              <li>Uploaded proof of payment file has to be jpeg, jpg or png format.</li>
              <li>Uploaded participant files cannot exceed 3 mb and has to be a zip format.</li>
              <li>Don't leave any fields empty (except marked as optional).</li> </ul>

          </div>
        @endif

        <div class="alert alert-warning">
          <p>Hello <strong>{{Auth::user()->name}}</strong>. You have been assigned unique <strong>ID {{Auth::user()->id + 000}}</strong>. The amount you must transfer to register IMSSO - Mini Soccer is <strong>Rp {{ number_format($lomba->biaya + Auth::user()->id + 000 ,2,',','.')}}</strong>. This is to make sure the verification process is done fast.</p>
          <p>Rekening Pembayaran/ Bank Account for payment: <br> Nama: “REGISTRASI LIGA MEDIKA”, Bank
            Mandiri, 157-00-0476595-5
        </p>
          <hr>
          <p>IMSSO - Mini Soccer wave: {{$lomba->gelombang_sekarang}}</p>
        </div>
          <form id="reset" method="post" action="{{route('reset.cabang')}}">
          @csrf
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="alert alert-info">
            After you click submit button you cannot undo the changes. If you would like to start over, you may <a href="#" onclick="$('#reset').submit(); return false;" id="submit">Click here to reset</a>.
          </div>
          </form>
        <div class="card">
          <div class="progress-section">
            <ul class="progressbar">
              <li class="active">Choose sub competition</li>
               <li class="active">Fill in self data and payment</li>
               <li>Data verification by Admin</li>
            </ul>
          </div>

          <div class="card-body">
            <div class="page-header">
              <h3 class="page-title">
                IMSSO - Mini Soccer
              </h3>
            </div>
            <hr>
            {{-- <div class="row justify-content-center">
                <div class="col-sm-8 col-md-8 my-2 col-12"> --}}
                  <div class="form-group">
                    <label for="">Amount of Participants</label>
                    <select class="custom-select" id="jumlahPeserta">
                      <option value="0" selected>Amount of Participants</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                    </select>
                  {{-- </div>
                </div> --}}
            </div>

        <form id="dataPeserta" method="post" enctype="multipart/form-data" action="{{route('register.imsso.men.futsal')}}">
        @csrf
        <div id="contentPanel">

        </div>
        <br>
        <br>
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-4">
                    <input type="hidden" name="gelombang" value="{{$lomba->gelombang_sekarang}}">
                    <input type="hidden" name="daftarPeserta" id="daftarPeserta">
                    <button type="submit" class="btn btn-success btn-block" id="submit">Submit&emsp;<i class="fas fa-paper-plane"></i></i></button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
    var addCols = function (num){
        for (var iter = 1; iter <= num; iter++) {
            var myCol = $('<div class=""></div>');
            var myPanel = $('<div class="col-md-12"><div align="center"><strong>Participant '+iter+'</strong></div><div class="form-group"><label for="nama'+iter+'">Full Name</label><input type="text" class="form-control" id="nama'+iter+'" name="nama'+iter+'" placeholder="" required></div><div class="form-group"><label for="univ'+iter+'">University/College</label><input type="text" class="form-control" id="univ'+iter+'" name="univ'+iter+'" placeholder="" required></div><div class="form-group"><label for="jurusan'+iter+'">Department</label><input type="text" class="form-control" id="jurusan'+iter+'" name="jurusan'+iter+'" placeholder="" required></div><div class="form-group"><label for="">Participant\'s File</label><br><input type="file" accept="application/zip" name="data_peserta'+iter+'" id="file" required><small class="form-text text-muted">Files are Photo 3x4, Scan Student ID card, Scan ID card, Active status letter as student from University, Letter of Agreement, Medical SOP Statement, Insurance Card. (Compressed as .zip file). Max size 3 mb.</small><a href="{{url('users/imsso/files')}}">Download file templates</a></div><div class="form-group"><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck'+iter+'" name="check'+iter+'"><label class="custom-control-label" for="customCheck'+iter+'">Check this custom checkbox</label></div></div><div class="form-group"><p>Click the button below if some files for this participant is not complete. You can submit it later.</p><button type="button" class="mb-2 btn btn-primary btn-not-complete" number='+iter+'>Files not complete</button><textarea class="form-control files-description number-'+iter+'" name="files_description_'+iter+'"></textarea><p style="display: none" class="help-files-text-'+iter+'">What files are missing? e.g. Scan ID card, Active status letter as student from University. Please still do upload the files you have.</p><input type="hidden" value="1" class="files_complete_'+iter+'" name="files_complete_'+iter+'"></div></div>');
            myPanel.appendTo(myCol);
            myCol.appendTo('#contentPanel');
        }

       

           
        var myCol = $('<div class="row justify-content-center my-5"></div>');
            var myPanel = $('<div class="col-md-12"><div align="center">Payments</div><div class="form-group"><label for="">Account Sender\'s name </label><input type="text" placeholder="What is the name of the account used to send the payment?" class="form-control" name="nama_rekening" value=""></div><div class="form-group"><label for="">Amount </label><input type="text" placeholder="How much did you transfer? e.g. 150.003" class="price form-control" name="jumlah_transfer" value=""></div><div class="form-group"><label for="">Scan payment proof (down payment)</label><br><input type="file" id="file" name="bukti_pembayaran" accept="image/*" required><small  class="form-text text-muted">Max size 1 mb. Images only.</small></div></div>');
            myPanel.appendTo(myCol);
            myCol.appendTo('#contentPanel');
            $('.price').mask('0.000.000.000.000', {reverse: true});

    };

    $('#jumlahPeserta').on('change', function() {
        $("#contentPanel").empty();
        tot = $('#jumlahPeserta').val();
        if (tot>0) {
            addCols(tot);
        }
        return false;
    });

    $('#submit').on('click', function(){
        data=[];
        for (var i = 1; i <= $('#jumlahPeserta').val(); i++) {
            temp1 = $('#nama'+i).val();
            temp2 = $('#univ'+i).val();
            temp3 = $('#jurusan'+i).val();
            temp4 = $('#kode'+i).val();
            data.push([temp1, temp2, temp3, temp4]);
        }
        console.log(data);
        $('#daftarPeserta').val(JSON.stringify(data));
    });

    $("#dataPeserta").submit(e => {
      if ($('#jumlahPeserta').val()==0) {
        e.preventDefault();
      }
        $('#daftarPeserta').val($('#jumlahPeserta').val());
    });

    $(document).on('click', '.btn-not-complete', function() {
      if ($(this).text() == "Files not complete") {
        const num = $(this).attr('number');
        $(`.files-description.number-${num}`).show();
        $(`.files_complete_${num}`).val("0");
        $(`.help-files-text-${num}`).show();
        $(this).text("Undo");
      } else {
        const num = $(this).attr('number');
        $(`.files-description.number-${num}`).hide();
        $(`.files_complete_${num}`).val("1");
        $(`.help-files-text-${num}`).hide();
        $(this).text("Files not complete");
      }
      
    });

</script>
@endsection
