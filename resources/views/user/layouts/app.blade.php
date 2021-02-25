<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img//apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img//favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Ecommerce | @yield('title')</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/paper-kit.css?v=2.3.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" />
</head>

<body class="ecommerce-page sidebar-collapse">
  @auth('user')
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  @endauth
  <!-- Navbar -->
  @include('user.layouts.nav')
  <!-- End Navbar -->
  <div class="wrapper">
    @yield('content')
    @include('user.layouts.footer')
  </div> <!-- wrapper -->
  <!--   Core JS Files   -->
  <script src="{{ asset('assets') }}/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets') }}/js/core/popper.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets') }}/js/paper-kit.js?v=2.3.1" type="text/javascript"></script>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
      // Set CSRF Token
      var token = document.head.querySelector('meta[name="csrf-token"]');
      if (token) {
          window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
      } else {
          console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
      }
  </script>
  <!--  Axios    -->

  @stack('scripts')
</body>

</html>
