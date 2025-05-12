<?php
 session_start();
include("config.php");
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $sql="DELETE FROM `notice` WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
       $_SESSION['status']="Recode Delted Successfully";
       header("location:viewnotice.php");
       exit();
    }
    else{
        $_SESSION['status']="Something went wrong";
       header("location:viewnotice.php");
       exit();
    }
}
 ?>