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

            <div class="card">
              <div class="card-body">
                <p>These are your team members.</p>
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
                      <label for="">Universitas: </label>
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
