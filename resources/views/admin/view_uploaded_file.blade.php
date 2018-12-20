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
</head>
<!DOCTYPE html>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <img id="picKtp" width="100%" height="100%" src="{{asset('storage').$path}}" alt="">
      </div>
    </div>
  </div>
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
</body>
</html>
