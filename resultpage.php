<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bharath University | Contact</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

  <!-- Font awesome -->
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <!-- Fancybox slider -->
  <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" />
  <!-- Theme color -->
  <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

  <!-- Main style sheet -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="assets/js/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>

  <style>
    table,
    th,
    td {
      border: none !important;
    }
    a{
      color: #337ab7;
    }
  </style>
</head>

<body>
  <!-- Sweet alert -->
  <?php if (isset($_SESSION['status'])) {
    echo "<script>
                         Swal.fire({
                           
                           icon: 'error',
                           title: 'Oops...',
                           button :'close',
                           text: '" . $_SESSION['status'] . "'
                         });
                         </script>";
    unset($_SESSION['status']);
  } ?>
  <?php if (isset($_SESSION['success'])) {
    echo "<script>
                         Swal.fire({
                           
                           icon: 'success',
                           title: 'Oops...',
                           button :'close',
                           text: '" . $_SESSION['success'] . "'
                         });
                         </script>";
    unset($_SESSION['success']);
  } ?>
  <!--START SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
  </a>

  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="index.html"><img src="https://www.bharathuniv.ac.in/result/img/logo.png" style="max-width: 100%;height:auto" height="230px" width="210px" alt="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="course-detail.php">Course</a></li>

            <li><a href="gallery.php">Gallery</a></li>

            <li><a href="contact.php">Contact</a></li>
            <li><a href="notices.php">Notices</a></li>
            <li><a href="resultpage.php">Result</a></li>
            <li><a href="adminlogin.php">Admin Login</a></li>
            <!-- <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </section>

  <!-- Start contact  -->

  <div class="container mt-5">
    <table class="table  text-center table-dark table-responsive table-borderless" style="border-collapse:collapse">

      <tbody>
        <tr>
          <td><a href="regno.php" style="color:#337ab7">B.tech Special Examination 2024 Provisional Result</a></td>
        <tr>
          <td><a href="regno.php">Mba Session 2023-24 Provisional Result</a></td>
        </tr>
        <tr>
          <td><a href="regnp.php">Phd Session 2023-24 Provisional Result</a></td>
        </tr>
        <tr>
          <td><a href="regno.php">Pharmacy Session 2023-24 Provisional Result</a></td>
        </tr>

        </tr>
      </tbody>
    </table>

  </div>
  <!-- End contact  -->


  <!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <?php include("footer.php"); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; All Right Reserved. Designed by <a href="http://www.markups.io/" rel="nofollow">MarkUps.io</a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->






  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>

  <!-- Custom js -->
  <script src="assets/js/custom.js"></script>

</body>

</html>