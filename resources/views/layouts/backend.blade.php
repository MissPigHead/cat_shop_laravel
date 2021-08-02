<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/image/favicon.ico" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link href="/css/customBackend.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>後台管理 - @yield('title')</title>
</head>
<body>
  <!-- header-->
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
</body>
</html>