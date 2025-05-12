<?php
session_start();
include("config.php");

// Check if 'eid', 'ename', and 'ephone' exist in the GET parameters
if (isset($_GET['delid'])) {
    $id = htmlspecialchars($_GET['delid']);
     $sql = "DELETE FROM `courses` WHERE `id` = '$id'";

    
        // Execute the query and check for success
        if (mysqli_query($conn, $sql)) {
            echo ("Record deleted successfully");
            header("Location: viewcourse.php");

            exit();
        } else {
            echo "Error deleted record: " . mysqli_error($conn);
        }
    }
    else{
        echo "enter valid one";
    }
 
?>
