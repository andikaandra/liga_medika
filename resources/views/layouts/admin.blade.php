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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><a href="#" target="_blank">Adis Andika</a>.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>

      </div>
    </div>
  </div>
    <script src="{{asset('admin-dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin-dashboard/vendors/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('admin-dashboard/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin-dashboard/js/misc.js')}}"></script>
    <script src="{{asset('admin-dashboard/js/dashboard.js')}}"></script>
</body>
</html>
