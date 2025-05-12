<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="d-flex col-12">
        <?php include('adminside.php'); ?>
        <div class="flex-grow-1">
            <?php include('adminhead.php'); ?>
            <div class="container mt-5 w-50 mx-auto">
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
                        <h2>Upload Image</h2>
                    </div>
                    <div class="card-body">



                        <form action="addimagecode.php" method="post" enctype="multipart/form-data">
                            <select class="form-select mb-3" name="catogery" aria-label="Default select example">
                                <option selected>-Select-Catogery-</option>
                                <option value="Lab">Lab</option>
                                <option value="Classroom">Classroom</option>
                                <option value="Libray">Library</option>
                                <option value="Cafe">Cafe</option>
                                <option value="Others">Others</option>
                            </select>
                            <div class="mb-3">
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="submit" class="btn btn-primary d-block mx-auto w-25">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>