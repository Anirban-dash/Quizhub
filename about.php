<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/about.css">
    <title>Quizhub - Make your day with knowledge </title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.ico">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
<style>
    .container {
  margin-left: 1rem;
  margin-right: 1rem;
}
</style>
    </head>
    <body>
        <!--=============== HEADER ===============-->
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
                            <a href="about.php" class="nav__link active-link">
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
<br><br><br>
        <section>
            <div class = "image">
               <img src="./assets/img/perfil.png">
            </div>

            <div class = "content">
                <h2>About Us</h2>
                <span><!-- line here --></span>
                <p>A quiz can be defined as a game or brain teaser to test knowledge. It can contain an element of competition when participants play against each other to get the highest score, which makes helps participants become more engaged.  </p>
                <ul class = "links">
                    <li><a href = "https://anirbandash.netlify.app" target="_blank">work</a></li>
                    <div class = "vertical-line"></div>
                    <li><a href = "https://www.linkedin.com/in/anirban-dash/">service</a></li>
                    <div class = "vertical-line"></div>
                    <li><a href = "index.php#cont">contact</a></li>
                </ul>
            </div>
        </section><br><br>
        

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>