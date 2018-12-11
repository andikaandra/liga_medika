@extends('layouts.admin')


@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection




@section('style')
<style media="screen">


  .cabang {
    border: 1px solid #ebedf2;
    border-radius: 3px;
    text-align: center;
    padding: 20px;
  }

  .cabang:hover {
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
    cursor: pointer;
    transition: 0.5s ease-in;
    background-color: #ebedf2;
  }

  .cabangs a {
    text-decoration: none;
  }


</style>
@endsection

@section('content')
<div class="content-wrapper">

  <div class="row">
    {{-- <div class="container"> --}}
      <div class="col-md-12">
        <div class="card">


          {{-- @include('registration-forms.pre-registration') --}}
          @include('registration-forms.register-inamsc')
        </div>
      </div>
    </div>
  </div>

@endsection
