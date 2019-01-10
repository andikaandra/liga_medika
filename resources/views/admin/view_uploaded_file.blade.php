<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Liga Medika</title>
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
