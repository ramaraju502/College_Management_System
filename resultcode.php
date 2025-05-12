<?php
    session_start();
    include("config.php");
    require 'vendor/autoload.php'; 

if (isset($_POST['submit'])) {
    $ccode = $_POST['ccode'];
   $cname=$_POST['cname'];
    $session = $_POST['session']; 
    $semester = $_POST['semester'];
    $date = $_POST['date'];
   
    // Move uploaded file and define $file_des
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_des = "uploads/" . $file_name;
    move_uploaded_file($file_tmp, $file_des);
    
    // Now load from the moved file
    
    // Insert into result table
    $sql = "INSERT INTO `result`(`coursecode`, `coursename`, `session`, `semester`, `resultpublishdate`, `excelupload`) 
            VALUES ('$ccode','$cname','$session','$semester','$date','$file_des')";
    $query = mysqli_query($conn, $sql);

    // Get the ID of the inserted result row
    $result_id = mysqli_insert_id($conn);//for exampl: id=1

    // Load and read Excel file
    $spreadsheet =\PhpOffice\PhpSpreadsheet\IOFactory::load($file_des);
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $data = $activeWorksheet->toArray();
    $count = 0;

    foreach ($data as $row) {
        if ($count > 0) {
            $regno = $row[0];
            $studentname = $row[1];
            $course = $row[2];
            $subcode = $row[3];
            $subname = $row[4];
            $fmarks = $row[5];
            $pmarks = $row[6];
            $dmarks = $row[7];
            $status="";
            if ($dmarks>35) {
                $status="P";
            }else {
                $status="F";
            }
            //Insert intot marksheet         //resultid=1
            $sql = "INSERT INTO `marksheet`(`resultid`, `regno`, `studentname`, `course`,
                     `subjectcode`, `subjectname`, `fullmarks`, `passmarks`, `digitmarks`, `status`)
                    VALUES ('$result_id','$regno','$studentname','$course',
                            '$subcode','$subname','$fmarks','$pmarks','$dmarks','$status')";
            if (mysqli_query($conn, $sql)) {
                $msg = true;
            }
            
        } else {
            $count = 1; // skip header row
        }
    }

   
    if (isset($msg)) {
        $_SESSION['status'] = "Data Inserted Successfully";
        header("location:result.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid file";
        header("location:result.php");
        exit();
    }
  
}    
?>