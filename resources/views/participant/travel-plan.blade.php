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
                      Your travel plan : {{Auth::user()->inamscs[0]->link_travel_plan}}
                    </div>
                    <small>Contact commitee for more information.</small>
                  @else
                  <form class="" id="form" action="{{route('users.travel.plan.inamsc')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Link Travel Plan: </label>
                      <input class="form-control" type="text" name="link" value="" required placeholder="my travel plan">
                      <small class="form-text text-muted">Once submitted you cant change your travel plan. Contact commitee for more information.</small>
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
      alertify.confirm('Confirmation', 'Would you like save your link travel plan?',
      function(){
        $("#form").submit();
      },
      function(){
        console.log("batal");
      });
    });
  </script>
@endsection
