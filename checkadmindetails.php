<?php
session_start();
include ("config.php");

if (isset($_POST["submit"])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT email, password FROM admin_details ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0); {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            if ($row["email"]==$email) 
            {
                // header("index.php");
                if($row["password"]==$password){
                 // Store email, name, and profile in session
                 $_SESSION['loggedin'] = true;
                $_SESSION["email"] = $row["email"];
                $_SESSION["pwd"] = $row["password"];
                $_SESSION['success'] = "Login Success";
                header("Location:adminpanel.php");
                exit();
                }
                else {
                    // Incorrect password
                    $_SESSION['error'] = "Incorrect Password!";
                    header("location: adminlogin.php");
                    exit();
                }
            }
            else {
                // Incorrect email
                $_SESSION['error'] = "Email Not Found";
                header("location: adminlogin.php");
                    exit();
            }
        }
    }
}
