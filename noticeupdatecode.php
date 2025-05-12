<?php
session_start();
include("config.php");
if (isset($_POST['submit'])) {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $existfile = $_POST['existfile'];
    
        if (!empty($_FILES['file']['name'])) {
            // If new file is uploaded
            $file_loc = $_FILES['file']['tmp_name'];
            $file_des = "uploads/" . $_FILES['file']['name'];
    
            if (move_uploaded_file($file_loc, $file_des)) {
                $file = $file_des;
            } else {
                $_SESSION['status'] = "File upload failed";
                header("location:viewnotice.php");
                exit();
            }
        } else {
            // No new file uploaded, use existing file
            $file = $existfile;
        }
    
        $sql = "UPDATE `notice` SET `title`='$title', `file`='$file', `date`='$date' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status']="Recode Updated Successfully";
            header("location:viewnotice.php");
            exit();
        } else {
            $_SESSION['status']="Somethingwent wrong check query";
            header("location:viewnotice.php");
            exit();
        }
    }
}
    
?>