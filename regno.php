<?php
session_start();
include("config.php");

$error = "";

if (isset($_POST['submit'])) {
    $regno = trim($_POST['regno']);

    $regno_safe = mysqli_real_escape_string($conn, $regno);
    $check_sql = "SELECT 1 FROM marksheet WHERE regno = '$regno_safe' LIMIT 1";
    $check_result = mysqli_query($conn, $check_sql);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $_SESSION['regno'] = $regno;
        header("Location: cer.php");
        exit();
    } else {
        $error = "No record found for this registration number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bharath University | Student Marksheet Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">

  <!-- Header -->
  <header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row items-center justify-between">
      <div class="flex items-center gap-4">
        <img src="https://www.bharathuniv.ac.in/result/img/logo.png" alt="Bharath University" class="h-12" />
        <div>
          <h1 class="text-xl font-bold text-blue-700">Bharath Institute of Higher Education and Research</h1>
          <p class="text-sm text-gray-600">(Deemed to be University)</p>
        </div>
      </div>
      <nav class="mt-4 md:mt-0">
        <ul class="flex gap-6 text-gray-700 font-semibold">
          <li><a href="index.php" class="hover:text-blue-600">Home</a></li>
          <li><a href="course-detail.php" class="hover:text-blue-600">Courses</a></li>
          <li><a href="adminlogin.php" class="hover:text-blue-600">AdminLogin</a></li>
          <li><a href="contact.php" class="hover:text-blue-600">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Marksheet Form Section -->
  <div class="container mx-auto px-4 py-12 max-w-4xl">
    <form method="POST" action="" class="bg-white rounded-xl shadow-lg p-8 mb-8">
      <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">
        <i class="fas fa-graduation-cap mr-2"></i> Student Marksheet Portal
      </h1>
      <div class="flex flex-col md:flex-row items-center justify-center gap-4">
        <div class="w-full md:w-2/3">
          <label for="rollNumber" class="block text-lg font-medium text-gray-700 mb-2">
            Enter Your Roll Number
          </label>
          <input type="text" id="rollNumber" name="regno" required
            class="w-full px-6 py-4 border-2 border-blue-300 rounded-xl text-lg"
            placeholder="e.g. 2023CS101">
        </div>
        <button type="submit" name="submit"
          class="mt-4 md:mt-7 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl">
          Get Marksheet
        </button>
      </div>
      <?php if ($error): ?>
  <p class="text-red-500 mt-4 text-center font-semibold">
    <?= htmlspecialchars($error) ?>
  </p>
  
<?php endif; ?>

    </form>
  </div>

  <!-- Footer -->
  <footer class="bg-blue-800 text-white mt-10">
    <div class="container mx-auto px-4 py-8 grid md:grid-cols-3 gap-6 text-sm">
      <div>
        <h3 class="font-bold text-lg mb-2">Contact Us</h3>
        <p>Bharath University Campus<br />
          173, Agharam Road, Selaiyur,<br />
          Chennai - 600073, Tamil Nadu, India</p>
        <p class="mt-2">Phone: +91 44 2229 0742</p>
        <p>Email: info@bharathuniv.ac.in</p>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-2">Quick Links</h3>
        <ul>
          <li><a href="#" class="hover:underline">Student Login</a></li>
          <li><a href="#" class="hover:underline">Results</a></li>
          <li><a href="#" class="hover:underline">Library</a></li>
          <li><a href="#" class="hover:underline">Examinations</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-2">Follow Us</h3>
        <div class="flex gap-4 mt-2">
          <a href="#" class="hover:text-gray-300"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="hover:text-gray-300"><i class="fab fa-twitter fa-lg"></i></a>
          <a href="#" class="hover:text-gray-300"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#" class="hover:text-gray-300"><i class="fab fa-linkedin fa-lg"></i></a>
        </div>
      </div>
    </div>
    <div class="bg-blue-900 text-center py-3 text-xs">
      © <?= date('Y') ?> Bharath Institute of Higher Education and Research. All Rights Reserved.
    </div>
  </footer>

</body>

</html>
