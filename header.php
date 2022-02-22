<?php
session_start();
require("conn.php");
if (!isset($_SESSION['id'])) {
    header("location:login.php"); 
}
$query="SELECT * from catagory";
$c_res=mysqli_query($con,$query)or die(mysqli_error($con));
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quizhub - Make your day with knowledge </title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.ico">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/timer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #toggle{
            cursor: pointer;
        }
    </style>
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
                                    <i class="ti-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">
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
                    <li><a href="studentAdmin.php"><i class="ti-dashboard"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="ti-book"></i><span
                                class="nav-text">Topics</span></a>
                        <ul aria-expanded="false">
                            <?php while($row=mysqli_fetch_array($c_res)) {?>

                            <li><a href="examdetail.php?cat_id=<?php echo $row['Cat_id']?>"><?php echo $row['Name']?></a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <li><a href="profile.php"><i class="ti-user"></i><span class="nav-text">Profile</span></a>
                    </li>
                    <li><a href="examhistory.php"><i class="ti-reload"></i><span class="nav-text">Exam
                                History</span></a>
                    </li>
                    <li><a href="password.php"><i class="ti-settings"></i><span class="nav-text">Change Password</span></a>
                    </li>
                    <li><a href="search.php"><i class="fa fa-search"></i><span class="nav-text">Search your friend</span></a>
                    </li>
                    <li><a href="logout.php"><i class="ti-power-off"></i><span class="nav-text">Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>
        
