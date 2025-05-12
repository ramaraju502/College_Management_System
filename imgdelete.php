<?php session_start();
include("config.php");
if (isset($_GET['id'])) {
   $id= $_GET['id'];
   $sql="DELETE FROM images WHERE id=$id";
   $result=mysqli_query($conn,$sql);
   if ($result) {
    $_SESSION['status']="Image Deleted Successfully";
    header("location:viewimage.php");
    exit();
   }
   else {
    $_SESSION['status']="Image Not Deleted Successfully";
    header("location:viewimage.php");
    exit();
   }
}
 ?>