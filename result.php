<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
   
    <div class="d-flex col-12">
        <?php include('adminside.php'); ?>
        <div class="flex-grow-1 " style="width:83%">
            <?php include('adminhead.php'); ?>
            <div class="container mt-2 w-50 mx-auto">
            <?php
                if (isset($_SESSION['status'])) { ?>
                    <div class="alert alert-primary text-center">
                        <h2><?php echo $_SESSION['status']; ?></h2>
                    </div>
                <?php unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Add Result</h2>
                    </div>
                    <div class="card-body">
                        <form action="resultcode.php" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="" class="form-label">course</label>
                                <input type="text" name="ccode" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">branch</label>
                                <input type="text" name="cname" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">session</label>
                                    <input type="text" name="session" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">semester</label>
                                    <input type="text" name="semester" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">Result_Publishing_Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label for="" class="form-label">ExcelUpload</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="submit" class="btn btn-primary d-block mx-auto w-25" required>Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>