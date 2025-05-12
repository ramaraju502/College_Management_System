<?php
session_start();
include("config.php");

// Ensure admin is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit();
}
//Fetching Course detisls
$id = $_GET["id"];
$sql = mysqli_query($conn, "SELECT * FROM courses WHERE id='$id'");
$row = mysqli_fetch_assoc($sql);

// Check if form is submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $course = $_POST['course'];
    $courseName = $_POST['coursename'];
    $duration = $_POST['duration'];
    $capacity= $_POST['capacity'];
    $subjects = $_POST['subjects'];
    $fees = $_POST['fees'];
    $teachers_Array = explode(",", $_POST['teachers']);
    $teachers=implode(",",$teachers_Array);
    // $existing_img = isset($_POST['existing_img']) ? $_POST['existing_img'] : "No image";
    $existing_img=$row['img'];
    $existing_syllabus=$row['syllabus'];
    $existing_prospectus=$row['prospectus'];
   
    if (!empty($_FILES['photo']['name'])) { 
        $img_loc = $_FILES['photo']['tmp_name'];
        $img_des = "uploads/" . $_FILES['photo']['name'];
        if (move_uploaded_file($img_loc, $img_des)) {
            $_SESSION['image'] = $img_des;
        }
    } else {
        $img_des = $existing_img; // Retain old image if no new one is uploaded
    }
  
    if (!empty($_FILES['pdf']['name'])) {
        $pdf_loc=$_FILES['pdf']['tmp_name'];
        $pdf_des="uploads/". $_FILES['pdf']['name'];
        if (move_uploaded_file($pdf_loc, $pdf_des)) {
            $_SESSION['syllabus'] = $pdf_des;
        }
        
    }
    else{
        $pdf_des=$existing_syllabus;
    }
    
    if (!empty($_FILES['prospectus']['name'])) {
        $prospectus_loc=$_FILES['prospectus']['tmp_name'];
        $prospectus_des="uploads/". $_FILES['prospectus']['name'];
        if (move_uploaded_file($prospectus_loc,$prospectus_des)) 
        {
            $_SESSION['prospectus']=$prospectus_des;
        }
    }
    else{
        $prospectus_des=$existing_prospectus;
    }
   
    $description=$_POST['description'];
    $sql="UPDATE `courses` SET `course`='$course',`duration`='$duration',`subjects`='$subjects',
    `coursename`='$courseName',`fees`='$fees',`teachers`='$teachers',
    `img`='$img_des',`capacity`='$capacity',`syllabus`='$pdf_des',`prospectus`='$prospectus_des',
    `description`='$description' WHERE id=$id";
    if (mysqli_query($conn,$sql)) {
        $_SESSION['updated']=true;
        header("location:viewcourse.php");
        exit();
    }
    else{
        echo "check sql query";
    }
   
}


// Fetch course details

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Update Course Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label>ID</label>
                                <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                            </div>

                            <div class="form-group mt-3">
                                <label>Course</label>
                                <input type="text" class="form-control" name="course" value="<?php echo $row['course']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label>CourseName</label>
                                <input type="text" class="form-control" name="coursename" value="<?php echo $row['coursename']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label>Duration</label>
                                <input type="text" class="form-control" name="duration" value="<?php echo $row['duration']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label>Subjects</label>
                                <input type="number" class="form-control" name="subjects" value="<?php echo $row['subjects']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label>Fees</label>
                                <input type="text" class="form-control" name="fees" value="<?php echo $row['fees']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label>Teachers</label>
                                <?php
                                //explode will convert string to array
                                //implode will convert array to string
                                $teacher_names = explode(',', $row['teachers']); ?>
                                <input type="text" class="form-control mt-2" name="teachers" value="<?php echo htmlspecialchars(implode(',', $teacher_names)); ?>">
                            </div>

                            <div class="form-group mt-3">
                                <label>Capacity</label>
                                <input type="text" class="form-control" name="capacity" value="<?php echo $row['capacity']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label>Image</label>
                                <input type="file" class="form-control" name="photo">
                                <p>Current Image: <a href="<?php echo $row['img']; ?>" target="_blank">View</a></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>Syllabus</label>
                                <input type="file" class="form-control" name="pdf" accept=".pdf">
                                <?php if (!empty($row['syllabus'])): ?>
                                    <p>Current File: <a href="<?php echo $row['syllabus']; ?>" target="_blank">View</a></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mt-3">
                                <label>Prospectus</label>
                                <input type="file" class="form-control" name="prospectus" accept=".pdf">
                                <?php if (!empty($row['prospectus'])): ?>
                                    <p>Current File: <a href="<?php echo $row['prospectus']; ?>" target="_blank">View</a></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mt-3">
                                <label>Description</label>
                                <textarea class="form-control" name="description"><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="form-group mt-3 text-center">
                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>