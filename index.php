<?php
session_start();

// Check if the user is logged in
// // if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
// //   header('Location: adminlogin.php');
// //   exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bharath University | Home</title>

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
  <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="https://images.shiksha.com/mediadata/images/1489471710phpDrTbne.jpeg" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Welcome To Bharath University</h4>
        <span></span>
        <h2>We Will Help You To Learn</h2>
        <p>We are dedicated to nurturing minds and fostering innovation. Our comprehensive curriculum, experienced faculty, and world-class infrastructure will empower you to reach your full potential.</p>
        <!-- <a href="#" class="mu-read-more-btn">Read More</a> -->
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="assets/img/slider/courosel1.avif" style="background-repeat: no-repeat;background-size: cover;" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Innovative College Management System</h4>
        <span></span>
        <h2>Efficient Solutions for Education</h2>
        <p>We are committed to transforming the way institutions manage their daily operations. Our all-in-one platform ensures smooth handling of admissions, academic records, attendance, and performance tracking, providing a streamlined experience for students and staff alike.</p>
        <!-- <a href="#" class="mu-read-more-btn">Read More</a> -->
      </div>
    </div>

    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="assets/img/slider/courosel3.jpeg" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Exclusivly For Education</h4>
        <span></span>
        <h2>Education For Everyone</h2>
        we believe education is the foundation for a brighter tomorrow. Our diverse academic programs and inclusive environment ensure that everyone has the opportunity to succeed, regardless of their background. Join us in our mission to make education accessible and impactful for all.</p>
        <!-- <a href="#" class="mu-read-more-btn">Read More</a> -->
      </div>
    </div>
    <!-- Start single slider item -->
  </section>
  <!-- End Slider -->
  <!-- Start service  -->

  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>About Us</h2>
                  </div>
                  <!-- End Title -->
                  <p>Sri Lakshmi Ammal Educational Trust was established with a visionary mission to revolutionize higher education in Tamil Nadu. In 1984, under the dynamic leadership of Dr. S. Jagathrakshakan, the Trust founded the Bharath Institute of Science and Technology (BIST), marking a historic milestone as the first self-financing engineering college in the state. This pioneering initiative laid the foundation for the Trust's subsequent ventures in medical and allied health sciences education.</p>
                  <p>Building on its commitment to excellence, the Trust established Sree Balaji Dental College and Hospital in 1989. The institution quickly rose to prominence and, in July 2002, was granted the status of a Deemed to be University by the Ministry of Human Resource Development (MHRD), Government of India, under Section 3 of the UGC Act, 1956. This recognition heralded the inception of the Bharath Institute of Higher Education and Research (BIHER), which became the umbrella organization for a growing network of esteemed institutions.</p>
                  <!-- <p>Our holistic approach to education fosters not only academic growth but also personal development. From interactive classrooms to advanced online learning platforms, we ensure that every student receives a well-rounded education that prepares them for success in their chosen careers.</p> -->
                  <b style="text-decoration: underline;">Today, BIHER Encompasses a Wide Range of Institutions, including :</b>
                  <ul>
                    <li>Bharath Medical College and Hospital (BMCH), Chennai</li>
                    <li>Sree Balaji College of Nursing, Chennai</li>
                    <li>Sree Balaji Medical College and Hospital (SBMCH), Chennai</li>
                    <li>Sree Balaji College of Physiotherapy, Chennai</li>
                    <li>Sri Lakshmi Narayana Institute of Medical Sciences (SLIMS), Puducherry</li>
                  </ul>
                  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quaerat harum facilis excepturi et? Mollitia!</p> -->
                </div>
              </div>
              <div class="col-lg-6 col-md-6" style="margin-top: 80px;">
                <div class="mu-about-us-right bg-dark">
                  <a id="" href="#">
                    <img src="https://images.collegedunia.com/public/college_data/images/campusimage/1552393694_IVA8161%20SEL%20copy%20copy.jpg" style="box-shadow: 5px 6px 15px 8px #bfb3cb;" alt="img">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

  <!-- Start about us counter -->
  <section id="mu-abtus-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-abtus-counter-area">
            <div class="row">
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-book"></span>
                  <h4 class="counter">568</h4>
                  <p>Subjects</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter">10000</h4>
                  <p>Students</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-flask"></span>
                  <h4 class="counter">65</h4>
                  <p>Modern Lab</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single no-border">
                  <span class="fa fa-user-secret"></span>
                  <h4 class="counter">250</h4>
                  <p>Teachers</p>
                </div>
              </div>
              <!-- End counter item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->

  <!-- Start features section -->
  <section id="mu-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-features-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Our Features</h2>
              <p>The system offers a range of powerful features, including automated attendance, real-time performance tracking, seamless admissions, and integrated communication tools. Designed to streamline operations, it enhances both efficiency and collaboration across your institution.</p>
            </div>
            <!-- End Title -->
            <!-- Start features content -->
            <div class="mu-features-content">
              <div class="row">
                <div class="col-lg-4 col-md-4  col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-book"></span>
                    <h4>Professional Courses</h4>
                    <p>Our professional courses are designed to equip you with the skills and expertise needed to excel in today’s competitive job market. From industry-relevant certifications to hands-on training, we provide a pathway to career advancement.</p>
                    <a href="#">Read More</a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-users"></span>
                    <h4>Expert Teachers</h4>
                    <p>Our team of expert teachers brings years of industry experience and academic excellence to the classroom. They are committed to providing personalized guidance, helping students reach their full potential through innovative teaching methods.</p>
                    <a href="#">Read More</a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-laptop"></span>
                    <h4>Online Learning</h4>
                    <p>Our online learning platform offers flexibility and convenience, allowing you to study from anywhere at any time. With interactive content and expert instructors, you'll gain valuable knowledge while balancing your personal and professional life.</p>
                    <a href="#">Read More</a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-microphone"></span>
                    <h4>Audio Lessons</h4>
                    <p>Our audio lessons provide an engaging way to learn on the go, offering flexibility for students with busy schedules. Expertly narrated by industry professionals, these lessons ensure you can absorb knowledge anytime, anywhere, at your own pace.</p>
                    <a href="#">Read More</a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-film"></span>
                    <h4>Video Lessons</h4>
                    <p>Our video lessons offer a dynamic and interactive way to learn, featuring detailed explanations and real-world examples. Led by industry experts, these lessons allow you to visually grasp complex concepts, making learning more engaging and effective.</p> <a href="#">Read More</a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-certificate"></span>
                    <h4>Professional Certificate</h4>
                    <p>Earn a recognized professional certificate that enhances your career prospects and demonstrates your expertise. Our certification programs are designed to provide practical skills and industry knowledge that can be applied directly to your professional journey.</p> <a href="#">Read More</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- End features content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End features section -->

  <!-- Start latest course section -->

  <!-- End latest course section -->

  <!-- Start our teacher -->

  <section id="mu-our-teacher">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2>The Minds Behind Our Success</h2>
              <p>
                Driven by creativity and commitment, our founders inspire growth and pave the way for groundbreaking achievements.</p>
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher-content">
              <div class="row">
                <div class="col-lg-3 col-md-3  col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHy8IHbPt2W_ML_L3RuIOtn0GwQiHuUBxt_g&s" height="260px" width="260px" alt="teacher img">
                      <!-- <div class="mu-our-teacher-social">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-linkedin"></span></a>
                        <a href="#"><span class="fa fa-google-plus"></span></a>
                      </div> -->
                    </figure>
                    <div class="mu-ourteacher-single-content">
                      <h4>S Jagatratchagan</h4>
                      <span>(Chairman)</span>
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique quod pariatur recusandae odio dignissimos. Eligendi.</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="https://i0.wp.com/bharathcollege.in/wp-content/uploads/2022/11/principal.jpg?fit=1024%2C683&ssl=1" height="260px" width="260px" alt="teacher img">
                      <!-- <div class="mu-our-teacher-social">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-linkedin"></span></a>
                        <a href="#"><span class="fa fa-google-plus"></span></a>
                      </div> -->
                    </figure>
                    <div class="mu-ourteacher-single-content">
                      <h4>K Kumar</h4>
                      <span>Principal</span>
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique quod pariatur recusandae odio dignissimos. Eligendi.</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="https://www.bharathuniv.ac.in/images/about/chanceller/DR.R.VEKATESH%20BABU.png" height="260px" width="260px" alt="teacher img">
                      <!-- <div class="mu-our-teacher-social">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-linkedin"></span></a>
                        <a href="#"><span class="fa fa-google-plus"></span></a>
                      </div> -->
                    </figure>
                    <div class="mu-ourteacher-single-content">
                      <h4>M Manikandan</h4>
                      <span>Chanceller</span>
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique quod pariatur recusandae odio dignissimos. Eligendi.</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="https://www.bharathuniv.ac.in/images/about/chanceller/111.png" height="260px" width="260px" alt="teacher img">
                      <!-- <div class="mu-our-teacher-social">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-linkedin"></span></a>
                        <a href="#"><span class="fa fa-google-plus"></span></a>
                      </div> -->
                    </figure>
                    <div class="mu-ourteacher-single-content">
                      <h4>P Selvarajan</h4>
                      <span>Vice Chanceller</span>
                      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique quod pariatur recusandae odio dignissimos. Eligendi.</p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End our teacher content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our teacher -->

  <!-- Start testimonial -->
  <section id="mu-testimonial">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>"My time here was filled with valuable learning experiences and unforgettable memories, and I’m proud to carry the spirit of this institution as a lifelong learner and alumnus."</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQocsQHuCl9UpYobaia1PC_C_OV2g0WxPwB6uB73O2Sj7f7rqsMuudXp6xUYGcDGT33b3U&usqp=CAU" height="100px" width="150px">
                </div>
                <div class="mu-testimonial-info">
                  <h4>K Priya</h4>
                  <span>Happy Student</span>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>"Being a part of this institution has shaped me both academically and personally, equipping me with the skills to succeed. I’m proud to be an alumnus and grateful for the lifelong connections made here."</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9ksVF_bjMSKkrkrZ1n6J8H699ZwhntTu-2g&s" height="100px" width="100px" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>M Surekha</h4>
                  <span>Happy Student</span>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>"This institution gave me the foundation to grow, learn, and succeed, and I am forever thankful for the knowledge and friendships that continue to enrich my journey."</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="data:image/jpeg;base64,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" height="100px" width="100px" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>M Manikumar</h4>
                  <span>Happy Student</span>
                </div>
              </div>
              <!-- end testimonial single item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->

  <!-- Start from blog -->

  <!-- End from blog -->

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