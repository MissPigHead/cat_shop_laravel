<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/customBackend.css') }}" rel="stylesheet" />
  <script src="{{ asset('js/app.js') }}"></script>
  <title>後台管理 - @yield('title')</title>
</head>

<body>
  <!-- error alert -->
  @if ($errors->any())
    @include('swal',['icon'=>'error'])
  @endif
  @can('admin')
    <!-- header -->
    @include('backend.header')
    <!-- main -->
    <main class="container p-0">
      <div class="row m-0">
        @include('backend.sidebar')
        @yield('content')
      </div>
    </main>
    <!-- footer -->
    @include('backend.footer')
  @endcan
</body>

</html>
