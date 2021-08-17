<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Booking</title>

    <link rel="stylesheet" href="{{mix("css/app.css")}}" />

    @livewireStyles

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <x-topnav />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-bold" style="font-size: 1.3em;"><b>BOOKING</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
              <img src="{{asset('images/vale.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <x-menu/>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         @yield("contenu")
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <x-sidebar/>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Réserver n'a jamais été aussi facile
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="#">Booking app</a>.</strong> Touts droits reservés.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ mix('js/app.js') }}"></script>

@livewireScripts

</body>
</html>
