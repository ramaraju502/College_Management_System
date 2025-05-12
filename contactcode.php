<?php
session_start();
include("config.php");
if (isset($_POST['submit'])) {
    $_SESSION['status']="";
   $name=$_POST['name'];
   $phone=(int)$_POST['phone'];
   if (!preg_match('/^[0-9]{10}$/',$phone)) {
    $_SESSION['status'] = "Enter a valid Digit numbers.";
    header("Location: contact.php");
    exit();
   }
  
   $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['status'] = "Enter a valid email.";
    header("Location: contact.php");
    exit();
}
   $subject=$_POST['subject'];
   $message=$_POST['comment'];
   echo $name;
   echo $email;
   $sql="INSERT INTO `contactform`(`name`, `email`, `phone`, `subject`, `message`) VALUES ('$name','$email','$phone','$subject','$message')";
   $result=mysqli_query($conn,$sql);
   if ($result) {
    $_SESSION['success'] = "Form submitted succesfully";
    header("Location: contact.php");
    exit();
   }
   else{
    $_SESSION['status'] = "Something went wrong";
    header("Location: contact.php");
    exit();
   }

}

?>