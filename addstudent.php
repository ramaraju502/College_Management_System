<?php session_start();
 include("config.php"); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit();
  } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div class="d-flex col-12">
        <?php include('adminside.php'); ?>
        <!-- Main Content -->
        <div class="flex-grow-1  col">
            <?php include('adminhead.php'); ?>
            
            <div class="container w-50 mx-auto mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <h2 class="text-center">Add Student</h2>
                    </div>
            <form action="insertdet.php" method="POST" >
                
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label">Roll No</label>
                            <input type="text" class="form-control" name="rollno" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <!-- <div class="col-12">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" required>
                        </div> -->
                        <div class="col-12 col-sm-6">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="exampleTextarea" class="form-label">Address</label>
                            <textarea class="form-control" id="exampleTextarea" name="address" rows="3" required></textarea>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label">Course</label>
                            <select class="form-select" name="course" aria-label="Default select example" required>
                                <option value="">-select course-</option>
                                <option value="Computer Science">B.tech</option>
                                <option value="Engineering">M.tech</option>
                                <option value="Business Administration">MBA</option>
                                <option value="Arts">Arts&Science</option>
                                <option value="Sciences">Pharmacy</option>
                                <option value="Sciences">Law </option>
                            </select>
                        </div>
                        <div class="col-12 submit-container mb-3 d-flex justify-content-center">
                            <button class="btn btn-primary px-5 rounded" type="submit" name="submit">Submit Form</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
