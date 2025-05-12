<?php session_start();
 include("config.php"); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseIndex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex col-12">

        <?php include('adminside.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1">

            <?php include('adminhead.php'); ?>

            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center display-6">Add Course</h2>
                    </div>
                    <div class="card-body">
                        <form action="insertcourse.php" method="post" enctype="multipart/form-data" id="uploadForm">

                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <label class="form-label">Course</label>
                                    <select class="form-select" required name="course">
                                        <option value="" selected>-Select Course-</option>
                                        <option value="B.tech">B.tech</option>
                                        <option value="M.tech">M.tech</option>
                                        <option value="MBA">MBA</option>
                                        <option value="Phd">Phd</option>
                                        <option value="Degree">Arts&Science</option>
                                        <option value="Law">Law</option>
                                        <option value="Pharamacy">Pharmacy</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">Years</label>
                                    <select class="form-select" required name="duration">
                                        <option value="" selected>-Select Years-</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">No Of Subjects</label>
                                    <input type="text" class="form-control" placeholder="Subjects" name="totalsub" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">Course Name</label>
                                    <input type="text" class="form-control" placeholder="coures name" name="cname" required>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">Fees (PA)</label>
                                    <input type="text" class="form-control" name="fees" placeholder="Fess Per Year" required>
                                </div>
                                <?php
                                $sql = "SELECT * FROM teacherdet";
                                $result = mysqli_query($conn, $sql);
                                $checkrow = mysqli_num_rows($result);

                                if ($checkrow > 0) {
                                ?>
                                    <div class="col-sm-4">
                                        <label class="form-label">Teachers</label>
                                        <select class="js-example-basic-multiple form-select col-12" placeholder="Select Teachers" name="teachers[]" multiple="multiple">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {?>
                                            <option value="<?php echo $row['empid'] ?>"><?php echo $row['name'] . ' - ' . $row['email']; ?></option>
                                                 
                                           <?php }
                                            ?>
                                        </select>
                                    </div>
                                <?php
                                }
                                ?>


                                <div class="col-sm-4">
                                    <label class="form-label">Image<small id="fileHelp" class="form-text text-muted">(Optional)</small></label>
                                    <input type="file" class="form-control" placeholder="Optional" name="photo">
                                    <small id="" class="form-text text-muted fileHelp">If you want to upload image you can upload</small>
                                    <div class="file-info text-danger fileInfo" class=""></div>
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label">Upload Syllabus</label>
                                    <input type="file" class="form-control file" accept=".pdf" name="pdf" required>
                                    <small id="" class="form-text text-muted fileHelp">Only PDF files are allowed. Max size: 2MB.</small>
                                    <div class="file-info text-danger fileInfo" class=""></div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">Prospecuts</label>
                                    <input type="file" class="form-control" class="file" accept=".pdf" name="prospectus" required>
                                    <small id="" class="form-text text-muted fileHelp">Only PDF files are allowed. Max size: 2MB.</small>
                                    <div class="file-info text-danger fileInfo" class=""></div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">Capacity</label>
                                    <input type="text" class="form-control" placeholder="Capacity" name="capacity" required>
                                </div>
                                <div class="col-sm-8">
                                    <label class="form-label">Description</label>
                                    <textarea type="text" class="form-control" placeholder="Description" name="description" minlength="100" required></textarea>
                                </div>
                                <div class=" col-12 mb-2 mx-auto d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn btn-success " style="display:block;width:30%;font-size:large">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>

</html>
<!-- HTML -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // File size validation
    $(document).ready(function() {

        $('.file').on('change', function() {
            const file = this.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB in bytes
            const fileInfo = $('.fileInfo');

            if (file) {
                if (file.size > maxSize) {
                    fileInfo.text("File size exceeds 2MB. Please upload a smaller file.");
                    $(this).val(''); // Clear the file input
                } else {
                    fileInfo.text(''); // Clear the error message
                }
            }
        });

        // Prevent form submission if no file is selected
        $('#uploadForm').on('submit', function(e) {
            // e.preventDefault();
            if (!$('.file').val()) {
                e.preventDefault();
                alert("Please upload a valid PDF file under 2MB.");
            } else {
                alert("submittes succesfully");
                header("Location: viewcourse.php");
                exit();

            }
        });
        $('.js-example-basic-multiple').select2();
    });
</script>