<?php
session_start();
include("config.php");
require 'vendor/autoload.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $ccode = $_POST['ccode'];
    $cname = $_POST['cname'];
    $session = $_POST['session'];
    $semester = $_POST['semester'];
    $date = $_POST['date'];
    $oldfile=$_POST['oldfile'];
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_des = "uploads/" . $file_name;
        move_uploaded_file($file_tmp, $file_des);
        $file = $file_des;
       
    } else {
        $file = $oldfile;
    }
    // Now load from the moved file
    $sql = "UPDATE `result` SET `coursecode`='$ccode',`coursename`='$cname',`session`='$session',
    `semester`='$semester',`resultpublishdate`='$date',`excelupload`='$file' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);

    // Load and read Excel file
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $data = $activeWorksheet->toArray();
    $count = 0;
    mysqli_query($conn, "DELETE FROM marksheet WHERE resultid = '$id'");
    foreach ($data as $row) {
        if ($count > 0) {
           
            $regno = trim($row[0]);
            $studentname =trim($row[1]);
            $course = trim($row[2]);
            $subcode = trim($row[3]);
            $subname = trim($row[4]);
            $fmarks = trim($row[5]);
            $pmarks = trim($row[6]);
            $dmarks = trim($row[7]);
            
            $sql = "INSERT INTO marksheet (resultid, regno, studentname, course, subjectcode, subjectname, fullmarks, passmarks, digitmarks)
        VALUES ('$id','$regno','$studentname', '$course', '$subcode', '$subname', '$fmarks', '$pmarks', '$dmarks')";
            if (mysqli_query($conn, $sql)) {
                $msg = true;
            }
        } else {
            $count = 1; // skip header row
        }
    }

    // Redirect with message
    if (isset($msg)) {
        $_SESSION['status'] = "Data Updated Successfully";
        header("location:viewresult.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid file";
        header("location:viewresult.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php if (isset($_SESSION['success'])) {
        $status = $_SESSION['success'];
        echo "<script>
       Swal.fire({
   title: 'Success',
   text: '$status',
   icon: 'success'
 });
       </script>";
        unset($_SESSION['success']);
    } ?>
    <?php if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        echo "<script>
       Swal.fire({
   title: 'Error',
   text: '$error',
   icon: 'error'
 });
       </script>";
        unset($_SESSION['error']);
    } ?>
    <div class="d-flex col-12">
        <?php include('adminside.php'); ?>
        <div class="flex-grow-1 " style="width:83%">
            <?php include('adminhead.php'); ?>
            <div class="container mt-2 w-50 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Update Result</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <?php if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM result WHERE id='$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            } ?>
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
                                <input type="hidden" name="oldfile" class="form-control" value="<?php echo $row['excelupload']; ?>">

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">coursecode</label>
                                <input type="text" name="ccode" value="<?php echo $row['coursecode']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">coursename</label>
                                <input type="text" name="cname" value="<?php echo $row['coursename']; ?>" class="form-control">
                            </div>

                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">session</label>
                                    <input type="text" name="session" value="<?php echo $row['session']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">semester</label>
                                    <input type="text" name="semester" value="<?php echo $row['semester']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">Result_Publishing_Date</label>
                                    <input type="date" name="date" value="<?php echo $row['resultpublishdate']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">ExcelUpload</label>
                                    <input type="file" name="file" class="form-control" value="<?php echo $row['excelupload']; ?>">
                                    <p>Current_File: <?php echo $row['excelupload']; ?></p>
                                </div>
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="submit" class="btn btn-primary d-block mx-auto w-25">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>
</body>

</html>