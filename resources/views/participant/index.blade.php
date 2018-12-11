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
        @if (Auth::user() && Auth::user()->cabang != null)
        <div class="alert alert-info">
          Hello <strong>Adis</strong>. You chose INAMSC in pre-registration. Please complete the next step.
          If you would like to start over, you may <a href="#">Click here to reset</a>.
        </div>
      @endif

        @if (\Session::get('message'))
          <div class="alert alert-success">
            {{\Session::get('message')}}
          </div>
        @endif
        <div class="card">

          @if (Auth::user() && Auth::user()->cabang == 3)
            @include('registration-forms.register-inamsc')
          @elseif (Auth::user()->cabang == 1)
            <p>Cabang 1</p>
          @elseif (Auth::user()->cabang == 2)
            <p>Cabang 2</p>
          @elseif (Auth::user()->cabang == 4)
            <p>Cabang 4</p>
          @else
            @include('registration-forms.pre-registration')
          @endif
          <br>
        </div>
      </div>
    </div>
  </div>

@endsection
