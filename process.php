<?php
// session_start();
include("config.php"); 
?>

<?php
if (isset($_POST["submit"])) 
{
    $id=trim($_POST["empid"]);
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $qual = trim($_POST["qual"]);
    $desig=trim($_POST["desig"]);
    $dept = trim($_POST["dept"]);
    
    $sql = "INSERT INTO `teacherdet`(`empid`, `name`, `email`, `phone`, `qual`, `desig`, `dept`) 
    VALUES ('$id', '$name', '$email', '$phone', '$qual', '$desig', '$dept')";
if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION["insert"]="Teacher Added Successfully";
            header("Location: viewteacher.php");
            exit();
        
    }
    else {
        echo "Check Sql Query";
    }
}
$conn->close();
?>

<?php
session_start();
include("config.php");

// Check if 'eid', 'ename', and 'ephone' exist in the GET parameters
if (isset($_GET['delid'])) {
    $id = htmlspecialchars($_GET['delid']);
     $sql = "DELETE FROM `teacherdet` WHERE `empid` = '$id'";

    
        // Execute the query and check for success
        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION["delete"]="Teacher Deleted Successfully";
            header("Location: viewteacher.php");
            exit();

        } else {
            echo "Error deleted record: " . mysqli_error($conn);
        }
    }
    else{
        echo "enter valid one";
    }
$conn->close();
?>