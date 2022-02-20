<?php
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$name=$_SESSION['name'];
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
    <style>
        #myInput {
            background-image: url('https://img.icons8.com/external-dreamstale-lineal-dreamstale/23/000000/external-search-ui-dreamstale-lineal-dreamstale-2.png');
            /* Add a search icon to input */
            background-position: 10px 12px;
            /* Position the search icon */
            background-repeat: no-repeat;
            /* Do not repeat the icon image */
            border-radius: 10px;
            font-size: 16px;
            /* Increase font-size */
            padding: 12px 20px 12px 40px;
            /* Add some padding */
            border: 1px solid #ddd;
            /* Add a grey border */
            margin-bottom: 12px;
            /* Add some space below the input */
        }
        th{
            color: black;
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
                    <li><a href="manageset.php"><i class="ti-agenda"></i><span class="nav-text">Manage Set</span></a>
                    </li>
                    <li><a href="logout.php"><i class="ti-power-off"></i><span class="nav-text">Logout</span></a>
                    </li>

                </ul>
            </div>
        </div>