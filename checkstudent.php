<?php
session_start();
include("config.php");

// Set the same secure key for decryption
$key = 'your-encryption-key-here'; // Replace with your secure key

// Function to decrypt data
function decryptData($encryptedData, $key) {
    list($encrypted, $iv) = explode('::', base64_decode($encryptedData), 2);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}

if (isset($_POST["submit"])) {
    // Sanitize email and password inputs
    $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
    $inputPassword = $_POST["password"];

    // Query database to find user by email
    $sql = "SELECT * FROM details";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
        $storedEncryptedPassword = $row['password'];

        // Decrypt the stored password
        $decryptedPassword = decryptData($storedEncryptedPassword, $key);
        echo "Original Decyrpted Password : ".$decryptedPassword."<br>";
        $_SESSION['pwd']=$decryptedPassword;
        // Check if the decrypted password matches the input password
        if ($decryptedPassword === $inputPassword) {
            // Password matches, login successful
            $_SESSION['user_id'] = $row['id']; // You can store user ID or any session data as needed
            header("location: studentpage.php"); // Redirect to the user dashboard or homepage
            exit();
        } else {
            // Password mismatch
            echo "<b>Invalid password.Enter Above Password</b>";
        }
    } else {
        // Email not found in database
        echo "No account found with that email.";
    }
}
?>
