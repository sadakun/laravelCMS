<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}"> --}}
  <!-- Styles -->
  {{-- @yield('styles') --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  {{-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}"> --}}
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}"> --}}

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Top Navigation Bar -->
    @include('includes.admin_top_nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('includes.admin_side_nav')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        @yield('content-header')
      </section>

      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.1
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    @include('includes.admin_control_nav')
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- Scripts -->
  
  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

  <script>
      var url = window.location;
      
      const allLinks = document.querySelectorAll('.nav-item a');
      
      const currentLink = [...allLinks].filter(e => {
          return e.href == url;
      });

      currentLink[0].classList.add("active");
      currentLink[0].closest(".nav-treeview").style.display = "block ";
      currentLink[0].closest(".has-treeview").classList.add("menu-open");
      
      $('.menu-open').find('a').each(function() {
      
          if (!$(this).parents().hasClass('active')) {
      
              $(this).parents().addClass("active");
      
              $(this).addClass("active");
          }
      });
  </script>

  @yield('scripts')
</body>

</html>