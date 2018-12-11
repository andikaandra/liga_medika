@extends('layouts.admin')


@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection




@section('style')
<style media="screen">

  .progressbar {
     counter-reset: step;
  }
  .progressbar li {
     list-style-type: none;
     width: 25%;
     float: left;
     font-size: 12px;
     position: relative;
     text-align: center;
     text-transform: uppercase;
     color: #7d7d7d;
  }
  .progressbar li:before {
     width: 30px;
     height: 30px;
     content: counter(step);
     counter-increment: step;
     line-height: 30px;
     border: 2px solid #7d7d7d;
     display: block;
     text-align: center;
     margin: 0 auto 10px auto;
     border-radius: 50%;
     background-color: white;
  }
  .progressbar li:after {
     width: 100%;
     height: 2px;
     content: '';
     position: absolute;
     background-color: #7d7d7d;
     top: 15px;
     left: -50%;
     z-index: -1;
  }
  .progressbar li:first-child:after {
     content: none;
  }
  .progressbar li.active {
     color: green;
  }
  .progressbar li.active:before {
     border-color: #55b776;
  }
  .progressbar li.active + li:after {
     background-color: #55b776;
  }

  .progress-section{
      padding-top: 20px;
  }

</style>
@endsection

@section('content')
<div class="content-wrapper">

  <div class="row">
    {{-- <div class="container"> --}}
      <div class="col-md-12">
        <div class="card">
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
                VIDEO EDUKASI PUBLIKASI POSTER
              </h3>
            </div>

            <div class="row justify-content-center">
              <div class="col-sm-8 col-md-8 pb-2">
                  <div class="card border-secondary">
                      <div class="card-body">
                          <div class="form-group">
                              <label for="">Jumlah Peserta</label>
                              <select class="custom-select" id="jumlahPeserta">
                                  <option value="0" selected>Jumlah</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                              </select>                            
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        <form id="dataPeserta" method="post" action="{{route('register.video.publikasi')}}">
        @csrf
        <div id="contentPanel">
            
        </div>
        <br>
        <br>
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-4">
                        <input type="hidden" name="daftarPeserta" id="daftarPeserta">
                        <button type="button" class="btn btn-primary btn-block" id="submit">Console&emsp;<i class="fas fa-paper-plane"></i></i></button>
                        <button type="submit" class="btn btn-danger btn-block" id="submit">Submit&emsp;<i class="fas fa-paper-plane"></i></i></button>
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
            var myCol = $('<div class="row justify-content-center"></div>');
            var myPanel = $('<div class="col-sm-8 col-md-8 pb-2"><div class="card border-primary" id="'+iter+'Panel"><div class="card-body"><div class="card-title" align="center">Peserta '+iter+'</div><div class="form-group"><label for="nama'+iter+'">Nama Lengkap</label><input type="text" class="form-control" id="nama'+iter+'" name="nama'+iter+'" placeholder="" required></div><div class="form-group"><label for="univ'+iter+'">Universitas/Perguruan Tinggi</label><input type="text" class="form-control" id="univ'+iter+'" name="univ'+iter+'" placeholder="" required></div><div class="form-group"><label for="jurusan'+iter+'">Jurusan/Program Studi</label><input type="text" class="form-control" id="jurusan'+iter+'" name="jurusan'+iter+'" placeholder="" required></div><div class="form-group"><label for="kode'+iter+'">Kode Ambassador</label><input type="text" class="form-control" id="kode'+iter+'" name="kode'+iter+'" placeholder=""><small class="form-text text-muted">Kode Ambassador bersifat opsional</small></div></div></div></div>');
            myPanel.appendTo(myCol);
            myCol.appendTo('#contentPanel');
        }
            var myCol = $('<div class="row justify-content-center"></div>');
            var myPanel = $('<div class="col-sm-8 col-md-8 pb-2"><div class="card border-danger"><div class="card-body"><div class="card-title" align="center"></div><div class="form-group"><label for="file">File Pendukung</label><div class="custom-file"><input type="file" class="custom-file-input" id="file" required><label class="custom-file-label">Pilih file...</label><small class="form-text text-muted">File meliputi Foto 3x4, Scan KTM, Scan KTP, CV, Surat keterangan mahasiswa aktif, Scan letter of originality</small></div></div>');
            myPanel.appendTo(myCol);
            myCol.appendTo('#contentPanel');   
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
        $('#daftarPeserta').val($('#jumlahPeserta').val());
    });

</script>
@endsection

