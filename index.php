<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">
        
        <title>Responsive bottom navigation</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo"><img src="assets/img/banner-name.png" width="65%" alt=""></a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.php" class="nav__link active-link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        
                        <?php 
                        session_start();
                        if(!isset($_SESSION['id'])){?> 
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
                            <a href="userProfile.php" class="nav__link">
                                <i class='bx bx-user-circle nav__icon'></i>
                                <span class="nav__name">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <img src="./images/Quiz-modified.png" alt="" class="nav__img">
            </nav>
        </header>

        <main>
           
            <section class="container section section__height" id="home">
                <h2 class="section__title">Home</h2>
            </section>

          
        </main>
        <!-- <script src="assets/js/main.js"></script> -->
    </body>
</html>