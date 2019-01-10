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
    {{-- <div class="container"> --}}
      <div class="col-md-12">
        @if ($errors->all())
          <div class="alert alert-danger">
            <strong>Failed to submit: </strong>
            <ul>
              <li>Uploaded files cannot exceed 3 mb and has to be a zip format.</li>
            </ul>
          </div>
        @endif

        {{-- </div> --}}

        <div class="alert alert-warning">
          <p>Hello <strong>{{Auth::user()->name}}</strong>. You have been assigned unique <strong>ID {{Auth::user()->id + 000}}</strong>. Registration fees are <strong>free</strong> until you reach the final stage.
          <hr>
          <p>Research Paper wave: {{$lomba->gelombang_sekarang}}</p>
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
               <li class="active">Fill in self data</li>
               <li>Data verification by Admin</li>
               <li>Upload files</li>
            </ul>
          </div>

          <div class="card-body">
            <div class="page-header">
              <h3 class="page-title">
                Research Paper
              </h3>
            </div>
            <hr>
            {{-- <div class="row justify-content-center">
                <div class="col-sm-8 col-md-8 my-2 col-12"> --}}
                  <div class="form-group">
                    <label for="">Amount of Participants</label>
                    <select class="custom-select" id="jumlahPeserta">
                      <option value="0" selected>Amount of Participants</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                {{-- </div>
            </div> --}}

        <form id="dataPeserta" method="post" enctype="multipart/form-data" action="{{route('register.research.poster')}}">
        @csrf
        <div id="contentPanel">

        </div>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-4 col-md-4">
                    <input type="hidden" name="gelombang" value="{{$lomba->gelombang_sekarang}}">
                    <input type="hidden" name="daftarPeserta" id="daftarPeserta">
{{--                     <button type="button" class="btn btn-primary btn-block" id="submit">Console&emsp;<i class="fas fa-paper-plane"></i></i></button> --}}
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
            var myPanel = $('<div class="col-md-12"><div align="center"><strong>Participant '+iter+'</strong></div><div class="form-group"><label for="nama'+iter+'">Full Name</label><input type="text" class="form-control" id="nama'+iter+'" name="nama'+iter+'" placeholder="" required></div><div class="form-group"><label for="univ'+iter+'">University/College</label><input type="text" class="form-control" id="univ'+iter+'" name="univ'+iter+'" placeholder="" required></div><div class="form-group"><label for="jurusan'+iter+'">Department</label><input type="text" class="form-control" id="jurusan'+iter+'" name="jurusan'+iter+'" placeholder="" required></div><div class="form-group"><label for="kode'+iter+'">Ambassador Code</label><input type="text" class="form-control" id="kode'+iter+'" name="kode'+iter+'" placeholder=""><small class="form-text text-muted">Ambassador code is optional</small></div><div class="form-group"><label for="">Participant\'s File</label><br><input type="file" accept="application/zip" name="data_peserta'+iter+'" id="file" required><small class="form-text text-muted">Files are Photo 3x4, Scan Student ID card, Scan ID card, CV, Active status letter as student from University. (Compressed as .zip file). Max size 3 mb</small><a href="{{url('users/inamsc/files')}}">Download file templates</a></div></div>');
            myPanel.appendTo(myCol);
            myCol.appendTo('#contentPanel');
        }

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

</script>
@endsection
