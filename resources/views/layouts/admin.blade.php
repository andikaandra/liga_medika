<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('admin-dashboard/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-dashboard/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin-dashboard/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('admin-dashboard/images/favicon.png')}}">
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
       border: 2px solid #7d7d7d !important;
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
       border-color: #55b776 !important;
    }
    .progressbar li.active + li:after {
       background-color: #55b776 !important;
    }

    .progress-section{
        padding-top: 20px;
    }
    </style>
@yield('style')

</head>
<!DOCTYPE html>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      @yield('navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @yield('sidebar')
      <!-- partial -->
      <div class="main-panel">

        @yield('content')

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>

      </div>
    </div>
  </div>
    <form class="logout-form" action="{{url('/logout')}}" method="post">
        {{ csrf_field() }}
    </form>
    <script src="{{asset('admin-dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin-dashboard/vendors/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('admin-dashboard/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin-dashboard/js/misc.js')}}"></script>
    <script src="{{asset('admin-dashboard/js/dashboard.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      function logOut(){
        $(".logout-form").submit();
      }

    </script>

{{--     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
    @yield('script')
</body>
</html>
