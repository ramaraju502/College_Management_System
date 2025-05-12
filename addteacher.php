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
    <title>Teacher Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .card {
            /* box-shadow: 10px 10px 15px 5px rgba(0, 0, 0, 0.5); */
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5), -5px -5px 10px rgba(255, 255, 255, 0.3);

        }
    </style>
</head>

<body>
    
    <div class="d-flex col-12">

        <?php include('adminside.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1  ">

            <?php include('adminhead.php'); ?>
           
            <div style="width:50%" class=" mx-auto p-3  rounded">
            <div class="container text-white">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h2 class="text-center">Add Teacher</h2>
                    </div>
                    <div class="card-body">
                        <form action="process.php" method="post">
                            <div class="mb-3 ">
                                <label class="form-label">Emp_Id</label>
                                <input type="text" class="form-control" name="empid" placeholder="Enter employe Id" required>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter teacher's name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Mobile Number" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Qualification</label>
                                <input type="text" class="form-control" name="qual" placeholder="Enter Qualification" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" name="desig" placeholder="Enter Qualification" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <input type="text" class="form-control" name="dept" placeholder="Enter Qualification" required>
                            </div>
                            <div class="mt-4 mb-3">
                                <button type="submit" name="submit" class="btn btn-primary" style="display: block;width:100%;border-radius:5px">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>