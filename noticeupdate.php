<?php
session_start();
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addnotice</title>
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
                        <h2>Update Notice</h2>
                    </div>
                    <div class="card-body">
                        <form action="noticeupdatecode.php" method="post" enctype="multipart/form-data">
                            <?php if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM notice WHERE id=$id";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <input type="text" name="existfile" value="<?php echo $row['file']; ?>" class="form-control" readonly>

                            <div class="mb-3">
                                <label for="">Id</label>
                                <input type="text" name="id" value="<?php echo $row['id']; ?>" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control">
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                    <p>current file :<?php echo $row['file']; ?> <a href="<?php echo $row['file']; ?>" target="_blank">[view]</a> </p>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <input type="date" name="date" value="<?php echo $row['date']; ?>" class="form-control">
                                </div>
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
