<?php session_start();
include("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Marksheet</title>
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
            <div class="container mt-2 mb-3">
                
                <div class="container w-100 mx-auto">
                    <?php
                    if (isset($_SESSION['status'])) { ?>
                        <div class="alert alert-primary text-center">
                            <h2><?php echo $_SESSION['status']; ?></h2>
                        </div>
                    <?php unset($_SESSION['status']);
                    }
                    ?>

                    <div class="card-body">
                        <table class="table table-bordered text-center table-responsive">
                            <tbody style="border-style:none">
                                <?php
                                $sql = "SELECT * FROM result WHERE id='$id'";
                                $query = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        echo "
                        <tr>
                            <th>Course Code</th>
                            <td>{$row['coursecode']}</td>
                        </tr>
                        <tr>
                            <th>Course Name</th>
                            <td>{$row['coursename']}</td>
                        </tr>
                            <th>Session</th>
                            <td>{$row['session']}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{$row['semester']}</td>
                        </tr>
                        <tr>
                            <th>Result Publish Date</th>
                            <td>{$row['resultpublishdate']}</td>
                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='2'>No result data found</td></tr>";
                                    $_SESSION['status'] = "There are no Rows Present";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <table class="table table-bordered text-center" id="mytable">
                    <thead>
                        <th>RegNo</th>
                        <th>StudentName</th>
                        <th>Course</th>
                        <th>Subjectcode</th>
                        <th>Subjectname</th>
                        <th>FullMarks</th>
                        <th>PassMarks</th>
                        <th>ObtainedMarks</th>
                        <th>Status</th>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM marksheet WHERE resultid='$id'";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>
                                            <td>{$row['regno']}</td>
                                           <td>{$row['studentname']}</td>
                                           <td>{$row['course']}</td>
                                           <td>{$row['subjectcode']}</td>
                                           <td>{$row['subjectname']}</td>
                                           <td>{$row['fullmarks']}</td>
                                           <td>{$row['passmarks']}</td>
                                           <td>{$row['digitmarks']}</td>
                                           <td>{$row['status']}</td>
                                           
                                        </tr>";
                        }
                    } else {
                        $_SESSION['status'] = "There are no Rows Present";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>