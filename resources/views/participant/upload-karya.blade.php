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
    height: 100%;
  }

  .cabang:hover {
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
    cursor: pointer;
    transition: 0.3s ease-in;
    background-color: #ebedf2;
  }

  .cabangs a {
    text-decoration: none;
  }

  .div-disabled {
    pointer-events: none;
    opacity: 0.4;
}

</style>
@endsection

@section('content')
<div class="content-wrapper">

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
                <p class="card-text">This page only appear if the admin has verified your payment</p>
                TODO : form upload karya dalam bentuk?
              </div>
          <br>
        </div>
      </div>
    </div>
  </div>

@endsection
