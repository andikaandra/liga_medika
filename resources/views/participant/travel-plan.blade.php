@extends('layouts.admin')


@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection




@section('style')

@if (Auth::user()->cabang == 2)
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css" />
@endif

<style media="screen">

.dropzone {
    background: white;
    border-radius: 5px;
    border: 1px solid rgb(0, 135, 247);
    border-image: none;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
}

.dropzone:hover{
  cursor: pointer;
}


</style>
@endsection

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-folder-upload"></i>
      </span>
      Travel Plan
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview
          <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
      <div class="col-md-12">
        {{-- notif sukses --}}
        @if (\Session::get('message'))
          <div class="alert alert-success">
            {{\Session::get('message')}}
          </div>
        @endif
          <div class="card">
              <div class="card-body">
{{--                 @if(Auth::user()->status_lolos && Auth::user()->cabang==3 && Auth::user()->cabang_spesifik!=1)
                  @if(Auth::user()->inamscs[0]->link_travel_plan)
                    <div class="alert alert-success">
                      <h5>Thank you,</h5>
                      <p>Your travel plan : {{Auth::user()->inamscs[0]->link_travel_plan}}<br></p>
                      <p>You choose workshop 
                      @if(Auth::user()->inamscs[0]->workshop == 1)
                        Less Stress for Future Doctors: an Introduction to PRH
                      @elseif(Auth::user()->inamscs[0]->workshop == 2)
                        Mental Health Assessment in General Practice
                      @else
                        Assessment of schizophrenia in primary health care: mental disease with common occurence in young adult
                      @endif
                      </p>
                    </div>
                    <small>Contact commitee for more information.</small>
                  @else
                  <form class="" id="form" action="{{route('users.travel.plan.inamsc')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="alert alert-info">
                      INAMSC Finalist are required to attend one of the following workshows 
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="">Workshop Options: </label>
                      <select class="custom-select" id="workshop" name="workshop" required>
                        <option value="1" selected>Less Stress for Future Doctors: an Introduction to PRH</option>
                        <option value="2">Mental Health Assessment in General Practice</option>
                        <option value="3">Assessment of schizophrenia in primary health care: mental disease with common occurence in young adult</option>
                      </select>
                    </div>
                    <div class="form-group" id="sertifikat" style="display: block;">
                      <label for="">International Accreditation Certificate: </label>
                      <select class="custom-select" id="accreditation" name="accreditation" required>
                        <option value="no" selected>No</option>
                        <option value="yes">Yes</option>
                      </select>
                      <small class="text-muted form-text">If you choose yes, you will be charged an additional Rp. 50.000,00 then you will pay <strong>Rp {{ number_format(150000 + 50000 + Auth::user()->id + 000 ,2,',','.')}}</strong></small>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="">Link Travel Plan: </label>
                      <input class="form-control" type="text" id="link" name="link" value="" required placeholder="my travel plan">
                      <small class="form-text text-muted">Once submitted you cant change your travel plan. Contact commitee for more information.</small>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Account Sender's name: </label>
                          <input pattern=".*\S+.*" title="This field is required" type="text" placeholder="What is the name of the account used to send the payment?" class="form-control" name="nama_rekening" id="nama_rekening" value="">
                        </div>
                        <div class="form-group">
                          <label for="">Amount: </label>
                          <input type="text" class="price form-control" placeholder="How much did you transfer? e.g. 150003" class="form-control" name="jumlah_transfer" id="jumlah_transfer" value="" required>
                        </div>
                        <div class="form-group">
                          <label for="">Scan proof of payment receipt: </label>
                          <br><input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*" value="" required><br>
                          <small class="form-text text-muted">Max size 1 mb. Images only.</small>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="save btn btn-primary btn-sm">Save</button>
                  </form>
                  @endif
                @elseif(Auth::user()->cabang==1 && Auth::user()->lomba_verified==1)
                  @if(Auth::user()->imsso[0]->link_travel_plan)
                    <div class="alert alert-success">
                      Your travel plan : {{Auth::user()->imsso[0]->link_travel_plan}}
                    </div>
                    <small>Contact commitee for more information.</small>
                  @else
                  <form class="" id="form" action="{{route('users.travel.plan.imsso')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Link Travel Plan: </label>
                      <input class="form-control" type="text" name="link" value="" required placeholder="my travel plan">
                      <small class="form-text text-muted">Once submitted you cant change your travel plan. Contact commitee for more information.</small>
                    </div>
                    <button type="button" class="save btn btn-primary btn-sm">Save</button>
                  </form>
                  @endif
                @endif --}}
                Sorry, you cant fill travel plan for a while
              </div>
          </div>
        </div>
  </div>
</div>

@endsection


@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#travel-plan-sidebar").addClass('active');

    });
    $(document).on('click', '.save', function(){
      alertify.confirm('Confirmation', 'Would you like submit this form?',
      function(){
        if (!$("#link").val()) {
          return ; 
        } 
        if (!$("#nama_rekening").val()) {
          return ; 
        } 
        if (!$("#jumlah_transfer").val()) {
          return ; 
        } 
        if (!$("#bukti_pembayaran").val()) {
          return ; 
        } 
        $("#form").submit();
      },
      function(){
        console.log("cancel");
      });
    });
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
