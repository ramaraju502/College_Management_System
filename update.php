<?php
session_start();
include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit();
  }
function randomPassword()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+<>?';
    $substring = str_shuffle($characters);
    return substr($substring, 0, 8);
}

function encryptData($data, $key)
{
    $iv_length = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decryptData($encryptedData, $key)
{
    list($encrypted, $iv) = explode('::', base64_decode($encryptedData), 2);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the POST request
    $sid = htmlspecialchars($_POST['eid']);
    $srollno = htmlspecialchars($_POST['erollno']);
    $sname = htmlspecialchars($_POST['ename']);
    $sphone = htmlspecialchars($_POST['ephone']);
    $semail = htmlspecialchars($_POST['eemail']);
    $saddress = htmlspecialchars($_POST['eaddress']);
    $scourse = htmlspecialchars($_POST['ecourse']);

    $key = 'your-encryption-key-here'; // Set a secure key here
    $password = randomPassword();
    $encryptedPassword = encryptData($password, $key);
    $decryptedPassword = decryptData($encryptedPassword, $key);

    echo "Original Password: $password\n" . "<br>";
    echo "Encrypted Password: $encryptedPassword\n" . "<br>";
    echo "Decrypted Password: $decryptedPassword\n" . "<br>";

    // SQL query to update student details
    $sql = "UPDATE `details` 
            SET `rollno` = '$srollno', `name` = '$sname', `phone` = '$sphone', 
                `email` = '$semail', `password` = '$encryptedPassword', `address` = '$saddress', `course` = '$scourse' 
            WHERE `id` = '$sid'";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        header("Location: viewstudent.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex col-12">

        <?php include('adminside.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <?php include('adminhead.php'); ?>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3>Update Student Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <?php
                                    $id = $_GET["eid"];

                                    $sql = mysqli_query($conn, "SELECT * FROM details WHERE id='$id'");
                                    if (mysqli_num_rows($sql) > 0) {
                                        $row = mysqli_fetch_assoc($sql);
                                        // You can now access $row['column_name'] for the fetched data
                                    ?>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="eid">ID</label>
                                                <input type="text" class="form-control" name="eid" value="<?php echo $row['id']; ?>" readonly>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="erollno">Roll No</label>
                                                <input type="text" class="form-control" name="erollno" value="<?php echo $row['rollno'];; ?>">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="ename">Name</label>
                                                <input type="text" class="form-control" name="ename" value="<?php echo $row['name']; ?>">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="ephone">Phone</label>
                                                <input type="text" class="form-control" name="ephone" value="<?php echo $row['phone']; ?>">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="eemail">Email</label>
                                                <input type="text" class="form-control" name="eemail" value="<?php echo $row['email']; ?>">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="eaddress">Address</label>
                                                <input type="text" class="form-control" name="eaddress" value="<?php echo $row['address']; ?>">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="ecourse">Course</label>
                                                <input type="text" class="form-control" name="ecourse" value="<?php echo $row['course']; ?>">
                                            </div>
                                            <div class="form-group mt-3 text-center">
                                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                            </div>
                                        <?php  } else {
                                        echo "No records found.";
                                    }
                                        ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>