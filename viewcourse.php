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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">
    <div class="d-flex col-12">

        <?php include('adminside.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1" style="width:81%">

            <?php include('adminhead.php'); ?>
            <div class="container mt-3">
                <div class="">
                    <a href="adminpanel.php" class="btn btn-primary fw-bold mt-0 text-start">Back</a>
                    <a href="addcourse.php" class="btn btn-primary fw-bold mt-0 text-end"><span>+</span>Add Course</a>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h2 class="display-6 text-center">Course Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr class="bg-dark text-white">
                                                <th>Id</th>
                                                <th>Course</th>
                                                <th>Duration</th>
                                                <th>Subjects</th>
                                                <th>Coursename</th>
                                                <th>Fees</th>
                                                <th>Teachers Name,Email</th>
                                                <!-- <th>Teachers Email</th> -->
                                                <th>Img</th>
                                                <th>Capacity</th>
                                                <th>Syllbaus</th>
                                                <th>Prospectus</th>
                                                <th>description</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT 
                                        courses.*, 
                                        GROUP_CONCAT(teacherdet.name) AS teacher_names,
                                        GROUP_CONCAT(teacherdet.email) AS teacher_emails
                                        
                                    FROM 
                                        courses
                                    JOIN 
                                        teacherdet ON FIND_IN_SET(teacherdet.empid, courses.teachers) > 0
                                    GROUP BY 
                                        courses.id";
                                            $result = mysqli_query($conn, $sql);
                                            $num_rows = mysqli_num_rows($result);
                                            if ($num_rows > 0) {
                                                // Output each row of data
                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <tr>
                                                        <td><?php echo $row['id'] ?></td>
                                                        <td><?php echo $row['course'] ?></td>
                                                        <td><?php echo $row['duration'] ?></td>
                                                        <td><?php echo $row['subjects'] ?></td>
                                                        <td><?php echo $row['coursename'] ?></td>
                                                        <td><?php echo $row['fees'] ?></td>
                                                        <td>
                                                            <ul style="list-style-type: square" ;>
                                                                <?php
                                                                $teacher_names = explode(',', $row['teacher_names']);
                                                                $teacher_emails = explode(',', $row['teacher_emails']);

                                                                for ($i = 0; $i < count($teacher_names); $i++) {
                                                                    echo "<li>" . $teacher_names[$i] . " - " . $teacher_emails[$i] . "</li>";
                                                                }
                                                                ?>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo $row['img'] ?>" download class="btn btn-primary"><i class="fa-solid fa-image"></i></i></a>
                                                        </td>
                                                        <td><?php echo $row['capacity'] ?></td>
                                                        <td>
                                                            <a href="<?php echo $row['syllabus'] ?>" download class="btn btn-success"><i class="fa-solid fa-file-pdf"></i></a>

                                                        </td>
                                                        <td>
                                                            <a href="<?php echo $row['prospectus'] ?>" download class="btn btn-success"><i class="fa-regular fa-file-image"></i></a>

                                                        </td>
                                                        <td> <textarea name="" id=""><?php echo $row['description'] ?></textarea>

                                                        </td>
                                                        <!-- Passing the 'id', 'name', and 'phone' parameters to update.php -->
                                                        <td><a href="updatecourse.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a></td>
                                                        <td><a href="deletecourse.php?delid=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>

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
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->