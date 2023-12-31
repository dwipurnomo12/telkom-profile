
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Telkom Banyuwangi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets_frontend/img/favicon.png" rel="icon">
  <link href="/assets_frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker3.min.css">

  <!-- Vendor CSS Files -->
  <link href="/assets_frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets_frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets_frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets_frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets_frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets_frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="/assets_frontend/css/style.css" rel="stylesheet">
</head>

<body>


  @include('partials.navbar')

  @yield('content')

  @include('partials.footer')




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Sweet Aleet -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  @include('sweetalert::alert')

  <!-- Vendor JS Files -->
  <script src="/assets_frontend/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets_frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets_frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets_frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets_frontend/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/assets_frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets_frontend/js/main.js"></script>
</body>

</html>