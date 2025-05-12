<?php session_start();
include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewresult</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="d-flex col-12">
        <?php include('adminside.php'); ?>
        <div class="flex-grow-1 " style="width:83%">
            <?php include('adminhead.php'); ?>
            <div class="container mt-2 w-100 mx-auto">
            <?php
                if (isset($_SESSION['status'])) { ?>
                    <div class="alert alert-primary text-center">
                        <h2><?php echo $_SESSION['status']; ?></h2>
                    </div>
                <?php unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header text-center">
                        <h2>View Result</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered text-center table-responsive" id="mytable">
                            <thead>
                                <th>id</th>
                                <th>Courese</th>
                                <th>Branch</th>
                                <th>Session</th>
                                <th>semester</th>
                                <th>ResulDate</th>
                                <th>Result</th>
                                <th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </thead>
                            <?php 
                                $sql="SELECT * FROM result";
                                $query=mysqli_query($conn,$sql);
                                if (mysqli_num_rows($query)>0) {
                                    while ($row=mysqli_fetch_assoc($query)) {
                                        echo "<tr>
                                           <td>{$row['id']}</td>
                                           <td>{$row['coursecode']}</td>
                                           <td>{$row['coursename']}</td>
                                           <td>{$row['session']}</td>
                                           <td>{$row['semester']}</td>
                                           <td>{$row['resultpublishdate']}</td>
                                           <td>{$row['excelupload']}</td>
                                           <td><a href='fullresult.php?id={$row['id']}''><i class='fa-solid fa-eye'></i></a></td>
                                           <td><a href='resultupdate.php?id={$row['id']}' class='btn btn-primary'>Update</a></td>
                                           <td><a href='resultdelete.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>
                                        </tr>";
                                    }
                                }
                                else{
                                    $_SESSION['status']="There are no Rows Present";
                                }
                            ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
