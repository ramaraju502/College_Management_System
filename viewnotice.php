<?php session_start(); ?>
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
            <div class="container mt-5 w-100 mx-auto">
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
                        <h2>View Notice</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center table-responsive">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">View/Download</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php include("config.php");
                                    $sql = "SELECT * FROM `notice` ORDER BY date DESC";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                            <td><img src="images/gif.gif" alt=""><?php echo $row['title'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><a href="<?php echo $row['file'] ?>" target="_blank">Click Here</a></td>
                                            <td><a href="noticeupdate.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Update</a></td>
                                            <td><a href="noticedelete.php?delid=<?php echo $row['id'] ?>" class="btn btn-danger">Update</a></td>
                                    <?php     }
                                    } else {
                                        $_SESSION['status'] = "No Recods";
                                        header("location:addnotice.php");
                                        exit();
                                    }
                                    ?>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>