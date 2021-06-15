<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="dash/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="dash/assets/css/style.css">
  <link rel="stylesheet" href="dash/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="dash/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='' />
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <!-- Main Content -->
  
  @include('admin.inc.nav')
  @include('admin.inc.leftNav')
  @yield('content')

  <footer class="main-footer">
        <div class="footer-left">
          <a href="projects">Projects</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

<!-- General JS Scripts -->
<script src="jquery/jquery.js"></script>

<script src="dash/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="dash/assets/js/page/index.js"></script>
  <!-- Design JS File -->
  <script src="dash/assets/js/scripts.js"></script>
  <script src="dash/assets/bundles/datatables/datatables.min.js"></script>
  <script src="dash/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dash/assets/js/page/datatables.js"></script>
  <!-- Custom JS File -->
  <script src="dash/assets/js/custom.js"></script>
</body>

</html>