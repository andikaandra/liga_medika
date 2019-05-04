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
                You cant fill travel plan now :)
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
  </script>
@endsection
