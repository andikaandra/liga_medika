@extends('layouts.admin')


@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection




@section('style')
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
                <p class="card-text">
                  todo
                </p>
                <form class="" action="#">
                  <div class="form-group">
                    <label for="">Title: </label>
                    <input class="form-control" type="text" name="" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Description: </label>
                    <textarea name="name" class="form-control" rows="8" cols="80"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="file" name="" value="">
                  </div>
                  <input type="submit" class="btn btn-success" name="" value="Submit">
                </form>

              </div>
          <br>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('script')
  <script src="{{asset('js/dropzone.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#user-files").addClass('active');




    });
  </script>
@endsection
