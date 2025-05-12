<?php
session_start();
include("config.php");
if (isset($_GET['id'])) {
    $id=$_GET['id'];
   $sql="DELETE FROM contactform WHERE id='$id'";
   $result=mysqli_query($conn,$sql);
   if ($result) {
    $_SESSION['del']= "Recoed Deleted Succesfully";
    header("location:enquriy.php");
    exit();
   }
   else{
    $_SESSION['del']= "Something went wrong record not deleted";
    header("location:enquriy.php");
    exit();
   }
}
?>