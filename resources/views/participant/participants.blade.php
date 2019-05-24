@extends('layouts.admin')


@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection




@section('style')
<style media="screen">

</style>
@endsection

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-account-multiple"></i>
      </span>
      My Team
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
        

          @if (!$phone)
              <div class="card mb-3">
                  <div class="card-header bg-warning">
                      Please fill in your contact number. This will be used by us to contact your team for important informations.
                    </div>
                <div class="card-body">
                  <div class="col-md-6">
                    <form action="{{url('users/phone')}}" method="POST">
                      @csrf
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                        <label for="phone">Contact Number of Person in Charge:</label> <br>
                        <small class="text-muted">* Person in charge is the team leader. Please provide a <strong>valid</strong> contact number, because it will be used by us to contact the team. E.g. 0811 111 1111</small>
                        <input type="text" name="phone" class="form-control" required title="This field is required" id="" pattern=".*\S+.*">
                      </div>
                      <button type="submit" class="btn btn-primary">Save Contact Number</button>
                    </form>

                  </div>
                </div>
              </div>
          @endif

            <div class="card">
              <div class="card-body">
                <h4>These are your team members.</h4>
                <form class="" action="#">
                  @php
                    $idx = 1;
                  @endphp
                  @foreach ($participants[0]->participants as $p)
                    <h5>Participant {{$idx}}</h5>
                    <div class="form-group">
                      <label for="">Name: </label>
                      <input class="form-control" type="text" disabled name="" value="{{$p->nama}}">
                    </div>
                    <div class="form-group">
                      <label for="">University: </label>
                      <input class="form-control" type="text" disabled name="" value="{{$p->universitas}}">
                    </div>
                    <div class="form-group">
                      <label for="">Department: </label>
                      <input class="form-control" type="text" disabled name="" value="{{$p->jurusan}}">
                    </div>
                    <hr>
                    @php
                      $idx++;
                    @endphp
                  @endforeach
                  <div class="form-group">
                    <label for="">Ambassador Code: </label>
                    <input class="form-control" type="text" disabled name="" value="{{$participants[0]->participants[0]->kode_ambassador}}">
                  </div>
                  <div class="form-group">
                    <label for="">Contact Number: </label>
                    <input class="form-control" type="text" disabled name="" value="{{Auth::user()->phone}}">
                  </div>
                </form>
              </div>
          <br>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#user-team").addClass('active');

    });
  </script>
@endsection
