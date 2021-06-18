<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= $site_title . " - " . $site_subtitle ?></title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="<?= base_url('assets/img/brand/favicon.png') ?>" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/argon.css?v=1.2.0" type="text/css') ?>">
  <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
</head>

<body>

  <?php include('nav_v.php');  ?>

  <div class="main-content" id="panel">

    <?php include('header_v.php');  ?>

    <?php include('content_v.php'); ?>

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->

  <script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js-cookie/js.cookie.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
  <!-- Optional JS -->
  <script src="<?= base_url('assets/vendor/chart.js/dist/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/chart.js/dist/Chart.extension.js') ?>"></script>
  <!-- Argon JS -->
  <script src="<?= base_url('assets/js/argon.js?v=1.2.0') ?>"></script>


  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      let act = $('#act_menu').val();
      console.log(act)
      $('.' + act).addClass('active');
    });
  </script>

</body>

</html>