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


{{--'link_travel_plan' => $request->link,--}}
{{--'nama_rekening' => $request->nama_rekening,--}}
{{--'jumlah_transfer' => str_replace('.','',$request->jumlah_transfer),--}}
{{--'bukti_pembayaran' => str_replace("public","", $path),--}}
{{--'delegasi' => str_replace("public","", $path_delegasi),--}}

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-folder-upload"></i>
      </span>
      Finalists Requirements
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
                @if(Auth::user()->status_lolos && Auth::user()->cabang==3 && Auth::user()->cabang_spesifik!=1)
                  @if(Auth::user()->inamscs[0]->link_travel_plan && Auth::user()->temporary_state != 1)
                    <div class="alert alert-success">
                      <h5>Thank you</h5>
{{--                      <p class="font-weight-bold">Your travel plan : {{Auth::user()->inamscs[0]->link_travel_plan}}<br></p>--}}
                      @foreach(Auth::user()->inamscs[0]->participants as $participant)
                        <p class="font-weight-bold">{{$participant->nama}} choose workshop : 
                        @if($participant->workshop == 1)
                          Less Stress for Future Doctors: an Introduction to PRH
                        @elseif($participant->workshop == 2)
                          Mental Health Assessment in General Practice
                        @else
                          Assessment of schizophrenia in primary health care: mental disease with common occurence in young adult
                        @endif
                        </p>
                      @endforeach
                    </div>
                    <small>Contact commitee for more information.</small>
                  @else
                    <div class="alert alert-info">
                      <ul>
                        <li>You can find guideline for semifinalist and finalist, and INAMSC 2019 logo <a href="{{url('inamsc/finalist-guidelines?v=1.2')}}">here</a></li>
                        <li><strong>Every</strong> INAMSC Finalist are required to attend one of the following workshops</li>
                        <li>International Accreditation Certificate is only for Less Stress for Future Doctors: an Introduction to PRH workshop</li>
                        <li>The final registration fee for each participant is Rp1.085.000 for <strong>National Participant</strong>, 78 USD for <strong>International participant</strong>. For example your team consists of 3 participants then the final price would be Rp3.255.000 or </li>
                        <li><p>Rekening Pembayaran/ Bank Account for payment: <br> Name: “REGISTRASI LIGA MEDIKA”, Bank Mandiri, 157-00-0476595-5</li>
                        <hr>
                        Example: if you are national participant and your team consists of 3 participants, if 2 of your team members join workshop Less Stress for Future Doctors: an Introduction to PRH workshop with International Accreditation Certificate, so you should pay Rp3.355.000
                      </ul>
                    </div>
                    <hr>
                    @if(Auth::user()->can_attend_final != 1)
                    <form class="" id="form_attend" action="{{route('users.cant.attend')}}" method="post">
                    @csrf
                    <div class="alert alert-danger">
                      <ul>
                        <li>The final event will be held on <strong>August 22-25, 2019</strong></li>
                        <li>If you are willing to take part in the final event, you can fill in the form given, if you cannot follow it you can press the button below</li>
                       {{-- <small>by pressing this button the status of your finalist will be replaced by another team</small><br><br> --}}
                        <button type="button" class="cantattend btn btn-outline-danger btn-sm">I can't attend the final event</button>
                      </ul>
                    </div>
                    <hr>
                    @endif
                    </form>
                  <form class="" id="form" action="{{route('users.travel.plan.inamsc')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach(Auth::user()->inamscs[0]->participants as $participant)
                      <h5><strong>Participant : </strong> {{$participant->nama}}</h5>
                      <div class="form-group">
                        <label for="">Workshop Options: </label>
                        <select class="custom-select text-muted" id="workshop" name="workshop[]" required>
                          <option value="1" {{$participant->workshop == 1 || $participant->workshop == null ? 'selected' : ''}}>Less Stress for Future Doctors: an Introduction to PRH</option>
                          <option value="2" {{$participant->workshop == 2 ? 'selected' : ''}}>Mental Health Assessment in General Practice</option>
                          <option value="3" {{$participant->workshop == 3 ? 'selected' : ''}}>Assessment of schizophrenia in primary health care: mental disease with common occurence in young adult</option>
                        </select>
                      </div>
                      <div class="form-group" id="sertifikat">
                        <label for="">International Accreditation Certificate (only for Less Stress for Future Doctors: an Introduction to PRH workshop): </label>
                        <select class="custom-select" id="accreditation" name="accreditation[]" required>
                          <option value="no" {{$participant->accreditation == null || $participant->accreditation == "no" ? 'selected' : ''}}>No</option>
                          <option value="yes" {{$participant->accreditation == "yes" ? 'selected' : ''}}>Yes</option>
                        </select>
                        <small class="text-muted form-text">If you choose yes, you will be charged an additional Rp. 50.000 for national participants and 4 USD for international participant</small>
                      </div><br>
                    @endforeach
                    <hr>
                    <div class="form-group">
                      <label for="">Delegation Letter/Active student letter from faculty: </label>
                      <br><input type="file" name="delegasi" id="delegasi" accept="application/zip" value="" required><br>
                      <small class="form-text text-muted">Max size 4 mb (Compressed as .zip file).</small>
                    </div>
                    <hr>
{{--                    <div class="form-group">--}}
{{--                      <label for="">Link Travel Plan: </label>--}}
{{--                      <input class="form-control" type="text" id="link" name="link" required placeholder="my travel plan" value="{{$inamsc->link_travel_plan}}">--}}
{{--                      <small class="form-text text-muted">Once submitted you can't change your travel plan. Contact commitee for more information.</small>--}}
{{--                    </div>--}}
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Bank account sender's name: </label>
                          <input pattern=".*\S+.*" title="This field is required" type="text" placeholder="What is the name of the account used to send the payment?" class="form-control" name="nama_rekening" id="nama_rekening" value="{{$inamsc->nama_rekening}}">
                        </div>
                        <div class="form-group">
                          <label for="">Amount transferred: </label>
                          <input type="text" class="price form-control" placeholder="How much did you transfer? e.g. 1.085.000" class="form-control" name="jumlah_transfer" id="jumlah_transfer" value="{{$inamsc->jumlah_transfer}}" required>
                          <small class="text-muted">Total amount.</small>
                        </div>
                        <div class="form-group">
                          <label for="">Scan proof of payment receipt: </label>
                          <br><input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*" value="" required><br>
                          <small class="form-text text-muted">Max size 1 mb. Images only.</small>
                        </div>
                      </div>
                    </div>

                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Please check this if you would like to save the current state of your data and files:</label>
                                  <input type="checkbox" class="" name="temporary_state"> <br>
                                  <small class="text-muted">For example you haven't got the complete data or paperwork, then you can continue where you left off. Please uncheck it if all your data is already complete, so our committee can verify it.</small>
                              </div>
                          </div>
                      </div>
                    <small class="text-muted">By submitting this form you agree to attend the final event at Universitas Indonesia on August 22-25, 2019</small><br><br>
                    <button type="button" class="save btn btn-primary btn-sm">Save</button>
                  </form>
                  @endif
{{--                      Disabled by Adis on 23 July 2019 because of client request. No travel plan as of 23 July 2019 --}}
{{--                @elseif(Auth::user()->cabang==1 && Auth::user()->lomba_verified==1)--}}
{{--                  @if(Auth::user()->imsso[0]->link_travel_plan)--}}
{{--                    <div class="alert alert-success">--}}
{{--                      Your travel plan : {{Auth::user()->imsso[0]->link_travel_plan}}--}}
{{--                    </div>--}}
{{--                    <small>Contact commitee for more information.</small>--}}
{{--                  @else--}}
{{--                  <form class="" id="form" action="{{route('users.travel.plan.imsso')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                      <label for="">Link Travel Plan: </label>--}}
{{--                      <input class="form-control" type="text" name="link" value="" required placeholder="my travel plan">--}}
{{--                      <small class="form-text text-muted">By submitting this form you agree to attend the final event at Universitas Indonesia on August 22-25, 2019.<br>Once submitted you cant change your travel plan. Contact commitee for more information.</small>--}}
{{--                    </div>--}}
{{--                    <button type="button" class="save btn btn-primary btn-sm">Save</button>--}}
{{--                  </form>--}}
{{--                  @endif--}}
                @endif
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
        // if (!$("#link").val()) {
        //   return ;
        // }
        if (!$("#nama_rekening").val()) {
            alert("Please fill in bank account sender's name");
          return ; 
        } 
        if (!$("#jumlah_transfer").val()) {
            alert("Please fill in amount transferred.");
          return ; 
        }
          let delegasi = $("#delegasi")[0].files.length;
          if(delegasi === 0){
              alert("Please upload delegation letter file.");
              return false;
          }

        if (!$("#bukti_pembayaran").val()) {
            alert("Please upload proof of payment file.");
          return ; 
        }

        $("#form").submit();
      },
      function(){
        console.log("cancel");
      });
    });

    $(document).on('click', '.cantattend', function(){
      alertify.confirm('Confirmation', 'Are you sure cant join final event?',
      function(){
        $("#form_attend").submit();
      },
      function(){
        console.log("cancel");
      });
    });
    // let status = $('#workshop').val();
    // if (status==1) {
    //   $('#sertifikat').css('display', 'block');
    // }
    // else{
    //   $('#sertifikat').css('display', 'none');
    // }

    // $('#workshop').on('change', function() {
    //     status = $(this).val();
    //     console.log(status);
    //     if (status==1) {
    //       $('#sertifikat').css('display', 'block');
    //     }
    //     else{
    //       $('#sertifikat').css('display', 'none');
    //     }
    // });
  </script>

@endsection
