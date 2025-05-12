<?php
session_start();
include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<div class="d-flex col-12">
        <?php include('adminside.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 ">
            <?php include('adminhead.php'); ?>
            
    <div class="container mt-4">
    <div class=""> 
        <a href="adminpanel.php" class="btn btn-primary fw-bold mt-0 text-start">Back</a>
        <a href="addteacher.php" class="btn btn-primary fw-bold mt-0 text-end"><span >+</span>Add Teacher</a>
    </div>
    
        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header">       
                        <h2 class="display-6 text-center">Teacher Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>EmpId</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Qualification</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Execute query
                                $sql = "SELECT * FROM teacherdet";
                                $result = mysqli_query($conn, $sql);
                                $num_rows = mysqli_num_rows($result);
                                // Check if there are results
                                if ($num_rows > 0) {
                                    // Output each row of data
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['empid'] ?></td>
                                           
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                           
                                            <td><?php echo $row['qual'] ?></td>
                                            <td><?php echo $row['desig'] ?></td>
                                            <td><?php echo $row['dept'] ?></td>
                                            <!-- Passing the 'id', 'name', and 'phone' parameters to update.php -->
                                            <td><a href="updateteacher.php?id=<?php echo $row['empid'];?>" class="btn btn-primary">Update</a></td>                                            
                                            <td><a href="process.php?delid=<?php echo $row['empid']; ?>" class="btn btn-danger">Delete</a></td>                  

                                        </tr>
                                <?php

                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No Records Found</td></tr>";
                                }

                                ?>

                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>