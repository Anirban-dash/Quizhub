<?php
session_start();
require("conn.php");
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$name=$_SESSION['name'];
$id=$_SESSION['admin'];
$sql="SELECT * FROM admin where id='$id'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quizhub|Make your day with Knowledge </title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.ico">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="adminprofile.css" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img class="logo-abbr" src="./images/Quiz (2) (1).png" alt="">
                <img class="logo-compact" src="./images/banner-name.png" alt="">
                <img class="brand-title" src="./images/banner-name.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="ti-light-bulb"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="adminprofile.php" class="dropdown-item">
                                        <i class="ti-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="logout.php" class="dropdown-item">
                                        <i class="ti-power-off"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="admin.php"><i class="ti-help-alt"></i><span class="nav-text">Add questions</span></a>
                    </li>
                    <li><a href="sampleques.php"><i class="ti-help"></i><span class="nav-text">Add Sample
                                questions</span></a>
                    </li>
                    <li><a href="viewques.php"><i class="ti-eye"></i><span class="nav-text">View questions</span></a>
                    </li>
                    <li><a href="catagoryadd.php"><i class="ti-menu-alt"></i><span class="nav-text">Add
                                Catagory</span></a>
                    </li>
                    <li><a href="manageset.php"><i class="ti-notepad"></i><span class="nav-text">Manage Set</span></a>
                    </li>
                    <li><a href="logout.php"><i class="ti-power-off"></i><span class="nav-text">Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <?php echo $name; ?></h4>
                            <p class="mb-0">Here is your profile</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="card">
                    <img src="./images/User-Profile.png" alt="admin" style="width:100%">
                    <h1><?php echo $row['name']; ?></h1>
                    <p class="title">ID: <?php echo $row['ad_id']; ?></p>
                    <p style="color:black;">Admin <i class="fa fa-regular fa-id-badge"></i></p>
                    <a style="color:crimson;" href="adminadd.php"><i class="fa fa-solid fa-user-plus"></i></a>
                    <a href="admin.php"><p><button>Home</button></p></a>
                    </div>
                </div>
                <div class="footer">
                    <div class="copyright">
                        <p>Copyright © Designed &amp; Developed by <b>Anirban</b> 2022</p>
                    </div>
                </div>
            </div>
            <script src="./vendor/global/global.min.js"></script>
            <script src="./js/quixnav-init.js"></script>
            <script src="./js/custom.min.js"></script>
            <script src="./js/dashboard/dashboard-2.js"></script>
            <script>
            </script>
</body>

</html>