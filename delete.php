<?php
session_start();
include("config.php");

// Check if 'eid', 'ename', and 'ephone' exist in the GET parameters
if (isset($_GET['eid'])) {
    $id = htmlspecialchars($_GET['eid']);
     $sql = "DELETE FROM `details` WHERE `id` = '$id'";
        // Execute the query and check for success
        if (mysqli_query($conn, $sql)) {
            // echo ("Record deleted successfully");
            $_SESSION['loggedin'] = true;
            header("viewstudent.php");
            exit();
        } else {
            echo "Error deleted record: " . mysqli_error($conn);
        }
    }
    else{
        echo "enter valid one";
    }
 
?>
