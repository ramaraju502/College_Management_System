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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
<div class="d-flex col-12">
        <?php include('adminside.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 " style="width:83%">
            <?php include('adminhead.php'); ?>
            
    <div class="container mt-5">  
    <div class="text-end me-3"> 
        <a href="addstudent.php" class="btn btn-primary fw-bold mt-0"><span class="fs-5 ">+</span>Add Student</a>
    </div>
        <div class="row">
            <div class="col">
                <div class="card mt-3"> 
                    <div class="card-header">       
                        <h2 class="display-6 text-center">Student Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered text-center" id="mytable">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>ID</th>
                                    <th>Rollno</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Address</th>
                                    <th>Course</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("config.php");
                                // Execute query
                                $sql = "SELECT * FROM details";
                                $result = mysqli_query($conn, $sql);
                                $num_rows = mysqli_num_rows($result);
                                
                                // Check if there are results
                                if ($num_rows > 0) {
                                    // Output each row of data
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                    
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['rollno'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['password'] ?></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo $row['course'] ?></td>
                                            <!-- Passing the 'id', 'name', and 'phone' parameters to update.php -->
                                            <td><a href="update.php?eid=<?php echo $row['id'];?>" class="btn btn-primary">Update</a></td>                                            
                                            <td><a href="delete.php?eid=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>                                            

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>

