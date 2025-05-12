<?php
session_start();
include("config.php");

// Generate a random password
function randomPassword(){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+<>?';
    $substring = str_shuffle($characters);
    return substr($substring, 0, 8);
}

// Encrypt data using AES-256-CBC
function encryptData($data, $key) {
    $iv_length = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

// Decrypt data
function decryptData($encryptedData, $key) {
    list($encrypted, $iv) = explode('::', base64_decode($encryptedData), 2);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}

// Set a secure key for encryption
$key = 'your-encryption-key-here'; // Replace with a secure key or load from environment variables

if (isset($_POST["submit"])) 
{
    // Sanitize form inputs to prevent SQL injection
    $rollno = mysqli_real_escape_string($conn, trim($_POST["rollno"]));
    $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
    $phone = mysqli_real_escape_string($conn, trim($_POST["phone"]));
    $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
    $address = mysqli_real_escape_string($conn, trim($_POST["address"]));
    $course = mysqli_real_escape_string($conn, trim($_POST["course"]));

    // Generate and encrypt a random password
    $password = randomPassword();
    $encryptedPassword = encryptData($password, $key);
    $decryptedPassword = decryptData($encryptedPassword, $key);
    echo $password."<br>";
    echo  $encryptedPassword."<br>";
    echo $decryptedPassword."<br>";
    // Insert data into the database
    $sql = "INSERT INTO details (rollno, name, phone, email, password, address, course) VALUES ('$rollno', '$name', '$phone', '$email', '$encryptedPassword', '$address', '$course')";
    if (mysqli_query($conn, $sql)) {
        header("location:viewstudent.php"); // Redirect to viewstudent.php on success
        exit();
    } else {
        echo "Error: " . mysqli_error($conn); // Display SQL error if query fails
    }
}

$conn->close();
?>
