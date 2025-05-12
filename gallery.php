<?php session_start();
include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Varsity | Gallery</title>

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


  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <!--START SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
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
          <!-- LOGO -->
          <!-- TEXT BASED LOGO -->
          <!-- <a class="navbar-brand" href="index.php">
            <a class="navbar-brand" href="index.php"><i class="fa fa-university"></i><span class="text-danger">Biher<p style="font-size: 5px;">(Bharath Institue Of Higher Education and Research)</p></span></a>
          </a> -->
          <!-- IMG BASED LOGO  -->
          <a class="navbar-brand" href="index.php"><img src="https://www.bharathuniv.ac.in/result/img/logo.png" style="max-width: 100%;height:auto" height="230px" width="210px" alt="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="course-detail.php">Course</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.html">Course Archive</a></li>                
                <li><a href="course-detail.html">Course Detail</a></li>                
              </ul>
            </li>            -->
            <li><a href="gallery.php">Gallery</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="blog-archive.html">Blog Archive</a></li>                
                <li><a href="blog-single.html">Blog Single</a></li>                
              </ul>
            </li>             -->
            <li><a href="contact.php">Contact</a></li>
            <li><a href="notices.php">Notices</a></li>
            <li><a href="resultpage.php">Result</a></li>
            <li><a href="adminlogin.php" class="text-warning">Admin Login</a></li>
            <!-- <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </section>
  <!-- End header  -->
 
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
  <!-- Page breadcrumb -->
  <!-- <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Gallery</h2>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Gallery</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- End breadcrumb -->
  <!-- Start gallery  -->
  <section id="mu-gallery">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-gallery-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>Some Moments</h2>
                <p>Every picture tells a story, and every moment captured here is a cherished memory. From vibrant cultural fests to inspiring guest lectures, joyful celebrations to academic achievements, these snapshots reflect the spirit and energy of our campus. Our gallery showcases life across every corner — from the innovation and hands-on learning in our labs, to the engaging discussions and shared knowledge in classrooms, the peaceful focus of our library, the warmth and laughter shared in the café, and all the spontaneous, candid moments that make college life truly unforgettable</p>            </div>
            <!-- end title -->
            <!-- start gallery content -->
            <div class="mu-gallery-content">
              <!-- Start gallery menu -->
              <div class="mu-gallery-top">
                <ul>
                  <li class="filter active" data-filter="all">All</li>
                  <li class="filter" data-filter=".lab">Lab</li>
                  <li class="filter" data-filter=".classroom">Class Room</li>
                  <li class="filter" data-filter=".library">Library</li>
                  <li class="filter" data-filter=".cafe">Cafe</li>
                  <li class="filter" data-filter=".others">Others</li>
                </ul>
              </div>
              <!-- End gallery menu -->
              <div class="mu-gallery-body">
                <ul id="mixit-container" class="row">
                  <?php
                  $sql = "SELECT * FROM `images`";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <li class="col-md-4 col-sm-6 col-xs-12 mix <?php echo strtolower($row['catogery']); ?>">
                        <div class="mu-single-gallery">
                          <div class="mu-single-gallery-item">
                            <div class="mu-single-gallery-img">
                              <a href="#"><img alt="img" src="<?php echo $row['image']; ?>"></a>
                            </div>
                            <div class="mu-single-gallery-info">
                              <div class="mu-single-gallery-info-inner">
                                <h4><?php echo ($row['catogery']); ?></h4>
                                <a href="<?php echo $row['image']; ?>" data-fancybox-group="gallery" class="fancybox"><span class="fa fa-eye"></span></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                  <?php }
                  } ?>

                  <!-- start single gallery image -->

                </ul>
              </div>
            </div>
            <!-- end gallery content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End gallery  -->


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