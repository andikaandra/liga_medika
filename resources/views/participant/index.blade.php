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
              Pre-registration
              </h3>
            </div>

            <form class="" action="{{url('users/register')}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="PUT">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Cabang lomba: </label>
                  <select class="form-control" name="cabang">
                    <option value="3">INAMSC</option>
                    <option value="2">IMARC</option>
                    <option value="1">IMSSO</option>
                    <option value="5">HFGM</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Nama penganggung jawab: </label>
                  <input type="text" class="form-control" name="penanggung_jawab" value="">
                </div>
                <div class="form-group">
                  <label for="">Asal universitas: </label>
                  <input type="text" class="form-control" name="" value="">
                </div>
              </div>
              <input type="submit" class="btn btn-success" name="" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
