<?php
session_start();
include("config.php");
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: adminlogin.php');
  exit();
}
$sql = "SELECT COUNT(*) as total_students FROM details";
$result = $conn->query($sql);

// Fetch the result
$total_students = 0;
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $total_students = $row['total_students'];
}
$sql = "SELECT COUNT(*) as total_teachers FROM teacherdet";
$result = $conn->query($sql);

// Fetch the result
$total_teachers = 0;
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $total_teachers = $row['total_teachers'];
}
$sql = "SELECT COUNT(*) as total_courses FROM courses";
$result = $conn->query($sql);

// Fetch the result
$total_courses = 0;
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $total_courses = $row['total_courses'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Management System Admin Panel</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  @media (max-width: 570px) {
  .navbar-nav {
    text-align: center;
  }
  .navbar-nav .nav-item {
    margin: 10px 0;
  }
}

</style>
<body>
  <!-- Sidebar -->
   <?php 
   if (isset($_SESSION['success'])) {
    echo "<script>
    Swal.fire({
      position : 'top',
      icon: 'success',
      title: 'Oops...',
      button :'close',
      text: '" . $_SESSION['success'] . "'
    });
    </script>";
   
    unset($_SESSION['success']); // Clear session after showing alert
  }
   ?>
  <div class="d-flex col-12">
    
      <?php include('adminside.php');?>

    <!-- Main Content -->
    <div class="flex-grow-1">
     
    <?php include('adminhead.php');?>
      <div class="container my-4">
        <div class="row">
          <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
              <div class="card-header">Total Students</div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $total_students; ?></h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
              <div class="card-header">Total Teachers</div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $total_teachers; ?></h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
              <div class="card-header">Ongoing Courses</div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $total_courses; ?></h5>
              </div>
            </div>
          </div>
          </div>
        </div>

        <!-- Table for Data Listing -->

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
