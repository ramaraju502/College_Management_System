<?php
 session_start();
 include("config.php");
 if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="DELETE FROM result WHERE id='$id'";
    mysqli_query($conn,$sql);
    $query="DELETE FROM marksheet WHERE resultid='$id'";
    if (mysqli_query($conn,$query)) {
        $_SESSION['status'] = "Record Deleted Successfully";
        header("location:viewresult.php");
        exit();
    }
    else {
        $_SESSION['status'] = "Check query";
        header("location:viewresult.php");
        exit();
    }
 }
?>