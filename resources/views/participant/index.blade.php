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
        {{-- user hasn't verif email, tell them to check inbox --}}
        @if (!Auth::user()->verified)
          <div class="alert alert-warning">
            <p>Before you can register, please <strong>verify your email address</strong> by checking your inbox.
              This is to make sure that we are able to communicate with you through email.
            </p>
            <hr>
            <small>We might end up in your spam folder. Don't forget to check it aswell.</small>
          </div>
        @endif
    
        {{-- user already chose cabang but hasnt chose cabang spesifik --}}
        @if (Auth::user() && Auth::user()->cabang != null && !Auth::user()->cabang_spesifik)
          <form id="reset" method="post" action="{{route('reset.cabang')}}">
          @csrf
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="alert alert-info">
              Hello <strong>{{Auth::user()->name}}</strong>. You chose {{$lomba->nama}} in pre-registration. Please complete the next step.
              If you would like to start over, you may <a href="#" onclick="$('#reset').submit(); return false;" id="submit">Click here to reset</a>.
          </div>
          </form>
        @else
            {{-- user has email verified, has registered cabang and cabang spesifik, this is welcome message --}}
          <div class="alert alert-info">
            Hello <strong>Adis</strong>. This is your user dashboard. You will find relevant information like payment and account status,
            submissions and many things.
          </div>

        @endif

        {{-- notif sukses --}}
        @if (\Session::get('message'))
          <div class="alert alert-success">
            {{\Session::get('message')}}
          </div>
        @endif

          {{-- if user hasnt verified email, can't regis --}}
          @if (!Auth::user()->verified)
            <div class="card div-disabled">
          @else
            <div class="card">
          @endif

          @if (Auth::user()->cabang_spesifik)


            <div class="card-body">
              <p>hi you will find info here</p>
                @if (Auth::user()->cabang == 3)
                  <p>Dashboard Cabang 3</p>
                @elseif (Auth::user()->cabang == 1)
                  <p>Dashboard Cabang 1</p>
                @elseif (Auth::user()->cabang == 2)
                  <p>Dashboard Cabang 2</p>
                @elseif (Auth::user()->cabang == 4)
                  <p>Dashboard Cabang 4</p>
                @endif
            </div>

          @else
            {{-- havent registered cabang spesifik --}}
            @if (Auth::user() && Auth::user()->cabang == 3)
              @include('registration-forms.register-inamsc')
            @elseif (Auth::user()->cabang == 1)
              <p>Regis Cabang 1</p>
            @elseif (Auth::user()->cabang == 2)
              <p>Regis Cabang 2</p>
            @elseif (Auth::user()->cabang == 4)
              <p>Regis Cabang 4</p>
            @else
              @include('registration-forms.pre-registration')
            @endif

          @endif


          <br>
        </div>
      </div>
    </div>
  </div>

@endsection
