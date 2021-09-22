<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="{{ asset('css/customFrontend.css') }}" rel="stylesheet" />
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- owl.carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <title>@yield('title')</title>
</head>

<body>
  <!-- error alert -->
  @if ($errors->any())
    @include('swal',['icon'=>'error'])
  @endif
  <!-- header nav -->
  @include('frontend.header')
  <!-- main -->
  @yield('content', View::make('frontend.main'))
  <!-- footer -->
  @include('frontend.footer')
  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
