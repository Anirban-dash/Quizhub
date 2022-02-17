<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quizhub|Admin </title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Add an Admin</h4>
                                    <form action="adminscript.php" method="POST">
                                        <div class="form-group">
                                            <label><strong>Name</strong></label>
                                            <input type="text" name="name" class="form-control" placeholder="Name of the admin" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Admin ID</strong></label>
                                            <input type="number" name="id" class="form-control" placeholder="Enter a neumeric value for ID" required>
                                            <?php if(isset($_GET['ex'])){?>
                                            <p class="text-danger">*Already Exists</p>
                                            <?php 
                                            unset($_GET['ex']);
                                            } ?>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="pass" class="form-control" required>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Go to<a class="text-primary" href="admin.php"> home</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                <?php
                if (isset($_GET['suc'])) {
                echo 'swal("Admin!", "New admin added Successfully!", "success");';
                unset($_GET['suc']);
                }
                ?>
    </script>
</body>

</html>