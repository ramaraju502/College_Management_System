<?php
session_start();
include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit();
  }

if (isset($_POST["submit"])) {
    $id = trim($_POST["empid"]);
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone= trim($_POST["phone"]);
    $qual = trim($_POST["qual"]);
    $desig = trim($_POST["desig"]);
    $dept = trim($_POST["dept"]);
       // SQL Query to update course details
    $sql = "UPDATE `teacherdet` SET `empid`='$id',`name`='$name',`email`='$email',`phone`='$phone',`qual`='$qual',`desig`='$desig',`dept`='$dept' WHERE empid=$id";

    if (mysqli_query($conn, $sql)) {
        echo "plese check Sql query";
        header("Location: viewteacher.php"); // Redirect on success
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media only screen and (max-width: 778px) {
            .container {
                padding: 10px;
            }
            .card {
                margin: 0;
            }
            .d-flex.justify-content-center {
                justify-content: flex-end !important;
                margin: 10px !important;
            }
        }

        /* Additional styles to make the form look better on larger screens */
        .btn-back {
            margin: 20px 0;
        }
        
    </style>
</head>
<body style="background-color: #d4edda;">
<div class="d-flex col-12">

<?php include('adminside.php'); ?>

<!-- Main Content -->
<div class="flex-grow-1">

    <?php include('adminhead.php'); ?>
<div class="d-flex justify-content-center mb-3" style="margin-left:400px">
        <a href="viewteacher.php" class="btn btn btn-dark px-5 mt-4">Back</a>
    </div>
    <div class="container mt-2">
    
        <div class="row">
        
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Update Teachers Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <?php 
                                include("config.php");
                                
                                $id=$_GET["id"];
                                $sql=mysqli_query($conn,"SELECT * FROM teacherdet WHERE empid='$id'");
                                $row=mysqli_fetch_assoc($sql); 
                             ?>
                            <div class="form-group">
                                <label >ID</label>
                                <input type="text" class="form-control" name="empid" value="<?php echo $row['empid']; ?>" readonly>
                            </div>
                            <div class="form-group mt-3">
                                <label >Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label >Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label >Phone</label>
                                <input type="number" class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label >Qualification</label>
                                <input type="text" class="form-control" name="qual" value="<?php echo $row['qual']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label >Designation</label>
                                <input type="text" class="form-control" name="desig" value="<?php echo $row['desig']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label >Department</label>
                                <input type="text" class="form-control" name="dept" value="<?php echo $row['dept']; ?>">
                            </div>
                            
                            <div class="form-group mt-3 text-center">
                                <button type="submit" name="submit"  class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

