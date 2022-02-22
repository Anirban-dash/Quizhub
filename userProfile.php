<?php 
session_start();
require("conn.php");
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $sql="SELECT * FROM user where User_ID='$id'";
    $image="SELECT * FROM images where us_id='$id'";
    $image_res=mysqli_query($con,$image) or die(mysqli_error($con));
    $img=mysqli_fetch_array($image_res);
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
}else{
    $name="Guest";
}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="profile.css">
    <title>Quizhub - Make your day with knowledge </title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.ico">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
        
    </head>
    <body>
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo"><img src="assets/img/banner-name.png" width="65%" alt=""></a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.php" class="nav__link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        
                        <?php if(!isset($_SESSION['id'])){?> 
                        <li class="nav__item">
                            <a href="signup.php" class="nav__link">
                                <i class='bx bx-user-plus nav__icon'></i>
                                <span class="nav__name">SignUp</span>
                            </a>
                        </li>
                        <?php }?>

                        <li class="nav__item">
                            <a href="about.php" class="nav__link">
                                <i class='bx bx-info-circle nav__icon'></i>
                                <span class="nav__name">About Us</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="dashboard.php" class="nav__link">
                                <i class='bx bxs-dashboard nav__icon'></i>
                                <span class="nav__name">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="userProfile.php" class="nav__link active-link">
                                <i class='bx bx-user-circle nav__icon'></i>
                                <span class="nav__name">Profile</span>
                            </a>
                        </li>
                        <li class="nav__item">
                        <a href="search.php" class="nav__link">
                            <i class='bx bx-search nav__icon'></i>
                            <span class="nav__name">Search</span>
                        </a>
                    </li>
                    </ul>
                </div>

                <img src="./images/Quiz-modified.png" alt="" class="nav__img">
            </nav>
        </header>

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="container d-flex justify-content-center">
                    <div class="col-xl-6 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"><?php if(isset($_SESSION['id'])){ echo'<img src="./uploads/'.$img['file_name'].'" class="img-radius" alt="User-Profile-Image">';}else{ ?> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"><?php }?> </div>
                                        <h6 class="f-w-600"><?php echo$name;?><?php if(isset($_SESSION['id'])){?>  <i class="mdi mdi-gender-<?php echo strtolower($row['Gender']);?> feather icon-edit m-t-10 f-16"></i><?php }?></h6>
                                        <p><?php echo$name;?></p><?php if(isset($_SESSION['id'])){?><a style="text-decoration:none; color:white" href="editUser.php"><i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i></a><?php }?>
                                    </div>
                                </div>
                                <?php 
                                if(isset($_SESSION['id'])){?>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"><?php echo $row['email'] ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400"><?php echo $row['mobile'] ?></h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Interested</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600"><?php echo $row['skill1'] ?></p>
                                                <p class="m-b-10 f-w-600"><?php echo $row['skill2'] ?></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600"><?php echo $row['skill3'] ?></p>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Address</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                
                                                <h6 class="text-muted f-w-400"><i class=" mdi mdi-map-marker feather icon-edit m-t-10 f-16"></i> <?php echo $row['address'] ?></h6>
                                            </div>
                                            
                                        </div>
                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            
                                        </ul>
                                    </div>
                                </div>
                                <?php }else{?>
                                    <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400"></h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Interested</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600"></p>
                                                <p class="m-b-10 f-w-600"></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600"></p>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Address</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                
                                                
                                            </div>
                                            
                                        </div>
                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="login.php" data-toggle="tooltip" data-placement="bottom" title=""><i class="mdi mdi-login" ></i></a></li>
                                            <li><a href="signup.php" data-toggle="tooltip" data-placement="bottom" title=""><i class="mdi mdi-account-plus-outline "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


        <script src="assets/js/main.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>