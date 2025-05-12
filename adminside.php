<style>
  /* Custom styles for the sidebar */

  .sidebar {
    min-height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    width: 250px;
    z-index: 1000;
    background-color: #343a40;
    color: white;
  }

  .main-content {
    margin-left: 250px;
    /* Space for the sidebar */
  }


  /* For smaller screens */
  @media (max-width: 767.98px) {
    .sidebar {
      position: relative;
      width: 100%;
      height: auto;
      min-height: 0;
    }

    .main-content {
      margin-left: 0;
    }
  }

  .nav-link {
    color: white;
  }

  .nav-link:hover {
    background-color: #007bff;
    color: white;
  }
</style>
<nav class="flex-column bg-dark text-white p-3" style="width:19%;min-height:100vh">
  <h2 class="text-center">Admin Panel</h2>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link text-white" href="adminpanel.php">Dashboard</a>
    </li>
    <li class="nav-item">
      <!-- Students Button to toggle accordion -->
      <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#studentMenu" aria-expanded="false" aria-controls="studentMenu">
        Students <span class="dropdown-toggle"></span>
      </button>

      <!-- Collapsible content (accordion-like) for Students -->
      <div class="collapse" id="studentMenu">
        <ul class="list-unstyled ps-3">
          <li><a class="nav-link text-white" href="addstudent.php">Add Student</a></li>
          <li><a class="nav-link text-white" href="viewstudent.php">View Student</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#teacherMenu">
        Teachers<span class="dropdown-toggle ps-1"></span></button>
      <div class="collapse" id="teacherMenu">
        <ul class="list-unstyled ps-3">
          <li><a class="nav-link text-white" href="addteacher.php">Add Teacher</a></li>
          <li><a class="nav-link text-white" href="viewteacher.php">View Teachers</a></li>
        </ul>
      </div>
    </li>
    <li>
    <li class="nav-item">
      <!-- Students Button to toggle accordion -->
      <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#courseMenu" aria-expanded="false" aria-controls="studentMenu">
        Courses <span class="dropdown-toggle"></span>
      </button>

      <div class="collapse" id="courseMenu">
        <ul class="list-unstyled ps-3">
          <li><a class="nav-link text-white" href="addcourse.php">Add Course</a></li>
          <li><a class="nav-link text-white" href="viewcourse.php">View Courses</a></li>
        </ul>
      </div>
    </li>
    </li>
    <li class="nav-item">
      <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#imageMenu">
        Images<span class="dropdown-toggle ps-1"></span></button>
      <div class="collapse" id="imageMenu">
        <ul class="list-unstyled ps-3">
          <li><a class="nav-link text-white" href="addimage.php">Add Imgae</a></li>
          <li><a class="nav-link text-white" href="viewimage.php">View Images</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#notice">
        Notices<span class="dropdown-toggle ps-1"></span></button>
      <div class="collapse" id="notice">
        <ul class="list-unstyled ps-3">
          <li><a class="nav-link text-white" href="addnotice.php">Add Notice</a></li>
          <li><a class="nav-link text-white" href="viewnotice.php">View Notice</a></li>
        </ul>
      </div>
    </li>
    <a class="nav-link text-white" href="enquiry.php">Enquiry</a>
    </li>
    <li class="nav-item">
      <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#result">
        Result<span class="dropdown-toggle ps-1"></span></button>
      <div class="collapse" id="result">
        <ul class="list-unstyled ps-3">
          <li><a class="nav-link text-white" href="result.php">Add Result</a></li>
          <li><a class="nav-link text-white" href="viewresult.php">View Result</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>