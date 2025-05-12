<?php
include("config.php");

if (isset($_POST["submit"])) {
    // Sanitize form inputs
    $course = trim($_POST["course"]);
    $duration = trim($_POST["duration"]);
    $totalsub = trim($_POST["totalsub"]);
    $cname = trim($_POST["cname"]);
    $fees = trim($_POST["fees"]);
    $teachersArray = $_POST["teachers"];
    $teachers = implode(",", $teachersArray);
    $capacity = trim($_POST["capacity"]);
    echo "Course: $course, Duration: $duration<br>";
    if (empty($course)) {
        echo "Error: Course is required!";
        exit();
    }
    // Handle file upload for image
    $img = $_FILES["photo"];
    $img_loc = $img["tmp_name"];
    $img_name = $img["name"];
    $img_des = "uploads/" . $img_name;
    print_r($img_loc);

    if (move_uploaded_file($img_loc, $img_des)) {
        $_SESSION['image'] = $img_des;
    } else {
        echo "Failed to upload image.";
    }

    // Handle file upload for PDF
    $pdf = $_FILES["pdf"];
    $pdf_loc = $pdf["tmp_name"];
    $pdf_name = $pdf["name"];
    $pdf_des = "uploads/" . $pdf_name;

    if (move_uploaded_file($pdf_loc, $pdf_des)) {
        // Proceed to insert in database
    } else {
        echo "Failed to upload PDF.";
    }
   
    $prospectus = $_FILES["prospectus"];
    $prospectus_loc = $prospectus["tmp_name"];
    $prospectus_name = $prospectus["name"];
    $prospectus_des = "uploads/" . $prospectus_name;
 
    if (move_uploaded_file($prospectus_loc, $prospectus_des)) {
        // Proceed to insert in database
    } else {
        echo "Failed to upload PDF.";
    }
    $description = trim($_POST["description"]);

    // Insert into database
    $sql = "INSERT INTO `courses`(`course`, `duration`, `subjects`, `coursename`, `fees`, `teachers`, `img`, `capacity`, `syllabus`, `prospectus`, `description`) 
            VALUES ('$course','$duration','$totalsub','$cname','$fees','$teachers','$img_des','$capacity','$pdf_des', '$prospectus_des', '$description')";

    if (mysqli_query($conn, $sql)) {
        // Redirect after successful insertion
        header("Location: viewcourse.php");
        exit();
    } else {
        echo "Check SQL Query: " . mysqli_error($conn);
    }
}

$conn->close();
?>
