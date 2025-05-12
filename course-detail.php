<?php include("config.php");

$sql = "SELECT DISTINCT course FROM courses";
$result = $conn->query($sql);

// if (isset($_GET['cname'])) {
//   $courseName = $_GET['cname'];
//   echo $courseName;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Varsity | Course Detail</title>

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
  <a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <!-- <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>info@markups.io</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(568) 986 652</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header> -->
  <!-- End header  -->
  <!-- Start menu -->
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
            <!-- <li><a href="studentlogin.php">Student Login</a></li> -->
            <li><a href="adminlogin.php" class="text-warning">Admin Login</a></li>
            <!-- <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </section>
  <!-- End menu -->
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
            <h2>Course Detail</h2>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Course Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- End breadcrumb -->
  <section id="mu-course-content">
    <div class="container-fluid" style="height:0vh">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">

                        <figure class="mu-latest-course-img">

                          <?php
                          $courseName = isset($_GET['cname']) ? mysqli_real_escape_string($conn, $_GET['cname']) : null;
                          ?>
                          <figure class="mu-latest-course-img">
                            <!-- <img src="images2/bg_1.jpg" alt=""> -->
                            <?php
                            if ($courseName) {

                              $sql = "SELECT * FROM courses WHERE course = '$courseName'";
                              $result = mysqli_query($conn, $sql);

                              if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);

                                echo '<img src="' . htmlspecialchars($row['img']) . '" alt="Course Image" width="100%" height="400px">';
                              } else {
                                echo "Course image not found.";
                              }
                            } else {
                              echo '<img src="uploads/courosel3.jpeg" alt="Course Image" width="100%" height="400px">';
                            }
                            ?>
                          </figure>

                        </figure>

                        <!-- <figcaption class="mu-latest-course-imgcaption">
                            <a href="#">Drawing</a>
                            <span><i class="fa fa-clock-o"></i>90Days</span>
                          </figcaption> -->

                        <div class="mu-latest-course-single-content">
                          <!-- <h2><a href="#">Lorem ipsum dolor sit amet.</a></h2> -->
                          <h4 id="#c1">Course Information</h4>
                          <ul>
                            <?php
                            // Default content if no course name is provided
                            $defaultContent = [
                              'Course' => 'B.tech',
                              'Coursename' => 'ECE',
                              'Course Price' => '90000',
                              'Total Students' => '1000',
                              'Course Duration' => '4 years',
                            ];

                            if (isset($_GET['cname'])) {
                              $courseName = $_GET['cname'];

                              // Escape the course name to prevent SQL injection
                              $courseName = mysqli_real_escape_string($conn, $courseName);

                              // SQL query to fetch course details based on the course name
                              $sql = "SELECT * FROM courses WHERE course = '$courseName'";
                              $result = mysqli_query($conn, $sql);

                              if (mysqli_num_rows($result) > 0) {
                                // Fetch the course details
                                $row = mysqli_fetch_assoc($result);

                                // Output course details
                                echo '<li><span>Course</span> <span>' . htmlspecialchars($row['course']) . '</span></li>';
                                echo '<li><span>Coursename</span> <span>' . htmlspecialchars($row['coursename']) . '</span></li>';
                                echo '<li><span>Course Price</span> <span>' . htmlspecialchars($row['fees']) . '</span></li>';
                                echo '<li><span>Total Students</span> <span>' . htmlspecialchars($row['capacity']) . '</span></li>';
                                echo '<li><span>Course Duration</span> <span>' . htmlspecialchars($row['duration'] . " years") . '</span></li>';
                              } else {
                                echo '<li>No course details found.</li>';
                                // Fallback to default content
                                foreach ($defaultContent as $label => $value) {
                                  echo '<li><span>' . $label . '</span> <span>' . $value . '</span></li>';
                                }
                              }
                            } else {
                              // No course name provided, display default content
                              foreach ($defaultContent as $label => $value) {
                                echo '<li><span>' . $label . '</span> <span>' . $value . '</span></li>';
                              }
                            }
                            ?>
                          </ul>
                          <h4 id="#c1">Description</h4>
                          <p>
                            <?php
                            // Display course description if available
                            if (isset($row) && $row) {
                              echo htmlspecialchars($row['description']);
                            } else {
                              echo 'Our featured courses are designed to provide in-depth knowledge in today’s most in-demand fields. 
                  With a curriculum crafted by experienced professionals, each course ensures you get the latest insights, 
                  tools, and skills needed to excel. Enroll now and take the first step toward a brighter future in fields like:
                  <br><br>
                  Data Science and Analytics: Learn how to collect, analyze, and leverage data to make impactful decisions.
                  <br>
                  Web and Mobile Development: Master the fundamentals of coding, design, and user experience.
                  <br>
                  Business and Management: Gain essential skills in leadership, project management, and entrepreneurship.';
                            }
                            ?>
                          </p>
                          <h4>Teacher Details</h4>
                          <?php
                          if (isset($_GET['cname']) && !empty($_GET['cname'])) {
                            $courseName = mysqli_real_escape_string($conn, $_GET['cname']);

                            // Fetch course details, including teachers, syllabus, and prospectus
                            $sql = "SELECT * FROM courses WHERE course = '$courseName'";
                            $result = mysqli_query($conn, $sql);

                            if ($row = mysqli_fetch_assoc($result)) {
                              // Extract teacher IDs
                              $teacherIds = $row['teachers']; // Assuming it's stored as "1,2,3"

                              if (!empty($teacherIds)) {
                                // Fetch teachers based on IDs
                                $sqlTeachers = "SELECT * FROM teacherdet WHERE empid IN ($teacherIds)";
                                $resultTeachers = mysqli_query($conn, $sqlTeachers);

                                if (mysqli_num_rows($resultTeachers) > 0) {
                                  echo '<table class="table table-bordered">';
                                  echo '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Qualification</th></tr></thead>';
                                  echo '<tbody>';

                                  while ($teacher = mysqli_fetch_assoc($resultTeachers)) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($teacher['empid']) . '</td>';
                                    echo '<td>' . htmlspecialchars($teacher['name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($teacher['email']) . '</td>';
                                    echo '<td>' . htmlspecialchars($teacher['phone']) . '</td>';
                                    echo '<td>' . htmlspecialchars($teacher['qual']) . '</td>';
                                    echo '</tr>';
                                  }

                                  echo '</tbody>';
                                  echo '</table>';
                                } else {
                                  echo 'No teachers found for this course.';
                                }
                              } else {
                                echo 'No teachers assigned to this course.';
                              }

                              // Download buttons for syllabus & prospectus (if available)
                              echo '<div class="text-center mt-3">';
                              if (!empty($row['syllabus'])) {
                                echo '<a href="' . htmlspecialchars($row['syllabus']) . '" class="btn btn-primary mx-2" download style="margin-right:20px";>Download Syllabus</a>';
                              }
                              if (!empty($row['prospectus'])) {
                                echo '<a href="' . htmlspecialchars($row['prospectus']) . '" class="btn btn-success mx-2" download>Download Prospectus</a>';
                              }
                              echo '</div>';
                            } else {
                              echo 'Course not found.';
                            }
                          } else {
                            // Default case: Show all ECE department teachers
                            $sql = "SELECT * FROM teacherdet WHERE dept='ECE'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                              echo '<table class="table table-bordered table-responsive">';
                              echo '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Qualification</th></tr></thead>';
                              echo '<tbody>';

                              while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['empid']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['qual']) . '</td>';
                                echo '</tr>';
                              }

                              echo '</tbody>';
                              echo '</table>';
                            }

                            // Default B.Tech syllabus and prospectus files
                            $sql = "SELECT syllabus,prospectus FROM courses ";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo '<div class="text-center mt-3" style="display:flex;justify-content:center">';
                            echo '<a href="' . $row['syllabus'] . '" class="btn btn-primary mx-2" download style="margin-right:20px";>Download Syllabus</a>';
                            echo '<a href="' . $row['prospectus'] . '" class="btn btn-success mx-2" download>Download Prospectus</a>';
                            echo '</div>';
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Courses</h3>
                    <ul class="mu-sidebar-catg">
                      <?php

                      $sql = "SELECT DISTINCT course FROM courses";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) { ?>
                          <li id="c1">
                            <a href="course-detail.php?cname=<?php echo urlencode($row["course"]); ?>">
                              <?php echo htmlspecialchars($row["course"]); ?>
                            </a>
                          </li>
                      <?php   }
                      } else {
                        echo '<li>No courses found.</li>';
                      }

                      ?>
                    </ul>
                  </div>
                  <!-- end single sidebar -->
                  <!-- start single sidebar -->

                  <div class="mu-single-sidebar">
                    <h3>Popular Courses</h3>
                    <div class="mu-sidebar-popular-courses">
                    <?php
                        $sql = "SELECT * FROM courses LIMIT 4";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)>0) {
                          while ($row=mysqli_fetch_assoc($result)) { ?>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object" src="<?php echo $row['img'] ?>" alt="img">
                          </a>
                        </div>

                        <div class="media-body">
                          <h4 class="media-heading"><a href="#"><?php echo $row['course']; ?></a></h4>
                          <span class="popular-course-price">&#8377;<?php echo $row['fees']; ?></span>
                        </div>
                      </div>
                
                      <!--  -->
                      <?php    }
                        }
                        ?>
                    </div>
                  </div>
                  <!-- end single sidebar -->
                  <!-- start single sidebar -->
                  <!-- <div class="mu-single-sidebar">
                    <h3>Archives</h3>
                    <ul class="mu-sidebar-catg mu-sidebar-archives">
                      <li><a href="#">May <span>(25)</span></a></li>
                      <li><a href="">June <span>(35)</span></a></li>
                      <li><a href="">July <span>(20)</span></a></li>
                      <li><a href="">August <span>(125)</span></a></li>
                      <li><a href="">September <span>(45)</span></a></li>
                      <li><a href="">October <span>(85)</span></a></li>
                    </ul>
                  </div> -->
                  <!-- end single sidebar -->
                  <!-- start single sidebar -->
                  <!-- <div class="mu-single-sidebar">
                    <h3>Tags Cloud</h3>
                    <div class="tag-cloud">
                      <a href="#">Health</a>
                      <a href="#">Science</a>
                      <a href="#">Sports</a>
                      <a href="#">Mathematics</a>
                      <a href="#">Web Design</a>
                      <a href="#">Admission</a>
                      <a href="#">History</a>
                      <a href="#">Environment</a>
                    </div>
                  </div> -->
                  <!-- end single sidebar -->
                </aside>
                <!-- / end sidebar -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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