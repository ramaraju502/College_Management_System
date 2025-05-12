<?php 
session_start();
include("config.php");
if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $date=$_POST['date'];
    $file_loc=$_FILES['file']['tmp_name'];
    $file_des="uploads/".$_FILES['file']['name'];
    if (move_uploaded_file($file_loc,$file_des)) {
        // $sql="INSERT INTO notice (title,file) VALUES ('$title',$file_des)";
        $sql="INSERT INTO `notice`(`title`, `file`, `date`) VALUES ('$title','$file_des','$date')";
        $result=mysqli_query($conn,$sql);
        if ($result) {
           $_SESSION['status']="Data Inserted Successfully";
           header("location:addnotice.php");
           exit();
        }
        else{
            $_SESSION['status']="Data Not Inserted";
            header("location:addnotice.php");
            exit();
        }
    }
    else {
        $_SESSION['status']="file did not move to folder";
        header("location:addnotice.php");
        exit();
       }
}
?>