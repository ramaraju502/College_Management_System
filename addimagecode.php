<?php
session_start();
include("config.php");
if (isset($_POST['submit'])) {
   $catogery=$_POST['catogery'];
   $img_loc=$_FILES['file']['tmp_name'];
   $img_des="images/".$_FILES['file']['name'];
   if (move_uploaded_file($img_loc,$img_des)) {
     $sql="INSERT INTO `images`(`catogery`, `image`) VALUES ('$catogery','$img_des')";
     $result=mysqli_query($conn,$sql);
     if ($result) {
        $_SESSION['status']="Data Inserted";
        header("location:addimage.php");
        exit();
     }
     else{
        $_SESSION['status']="Data Not Inserted";
        header("location:addimage.php");
        exit();
     }
   }
   else {
    $_SESSION['status']="file did not move to folder";
    header("location:addimage.php");
    exit();
   }
}
?>