<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view image</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
    <div class="d-flex col-12">
        <?php include('adminside.php'); ?>
        <div class="flex-grow-1 " style="width:83%">
            <?php include('adminhead.php'); ?>
           
            <div class="w-50 mb-3">
            <?php if (isset($_SESSION['status'])) {
                         echo "<script>
                         Swal.fire({
                           
                           icon: 'success',
                           title: 'Oops...',
                           button :'close',
                           text: '" . $_SESSION['status'] . "'
                         });
                         </script>";
                         unset($_SESSION['status']);
                      } ?>
            </div>
                <table class="table table-bordered table-striped w-75 mx-auto mt-5 text-center">
               
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">id</th>    
                            <th scope="col">catogery</th>    
                            <th scope="col">image</th>
                            <th scope="col">view</th>    
                            <th scope="col">delete</th>    
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                include ("config.php");
                $sql="SELECT * FROM images";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0) {
                    while ($row=mysqli_fetch_assoc($result)) {
                        # code...
                    
                    ?>
                    <tr>
                        <td scope="col"><?php echo $row['id']; ?></td>    
                        <td scope="col"><?php echo $row['catogery']; ?></td>    
                        <td scope="col"><?php echo $row['image']; ?></td>  
                        <td><a href="<?php echo $row['image']; ?>" target="_blank">view</a></td>  
                        <td><a href="imgdelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" target="_blank">delete</a></td>  
                        </tr>
        <?php    }
        }
        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>