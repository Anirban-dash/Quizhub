<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="css/index/style.css">
    <title>Quizhub - Make your day with knowledge </title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!--=============== HEADER ===============-->
    <header style="height:8vh" class="header" id="header">
        <nav class="nav container" style="margin-top:5px;">
            <a href="#" class="nav__logo"><img src="assets/img/banner-name.png" width="65%" alt=""></a>

            <div style="padding:0 !important" class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li style="" class="nav__item">
                        <a href="index.php" class="nav__link active-link">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span style="font-size: 15px;" class="nav__name">Home</span>
                        </a>
                    </li>

                    <?php
session_start();
if (!isset($_SESSION['id'])) {?>
                    <li class="nav__item">
                        <a href="signup.php" class="nav__link">
                            <i class='bx bx-user-plus nav__icon'></i>
                            <span style="font-size: 15px;" class="nav__name">SignUp</span>
                        </a>
                    </li>
                    <?php }?>

                    <li class="nav__item">
                        <a href="about.php" class="nav__link">
                            <i class='bx bx-info-circle nav__icon'></i>
                            <span style="font-size: 15px;" class="nav__name">About Us</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="dashboard.php" class="nav__link">
                            <i class='bx bxs-dashboard nav__icon'></i>
                            <span style="font-size: 15px;" class="nav__name">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="userProfile.php" class="nav__link">
                            <i class='bx bx-user-circle nav__icon'></i>
                            <span style="font-size: 15px;" class="nav__name">Profile</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="search.php" class="nav__link">
                            <i class='bx bx-search nav__icon'></i>
                            <span style="font-size: 15px;" class="nav__name">Search</span>
                        </a>
                    </li>
                </ul>
            </div>

            <img src="./images/Quiz-modified.png" alt="" class="nav__img">
        </nav>
    </header>

    <div class="row st-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center st-header-content">
                    <div class="logo"><a href=""><img src="./assets/img/banner-name.png" alt=""></a></div>
                    <div class="st-header-title">
                        <h2>Welcome <span>Learner</span></h2>

                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div id="service" class="row service-icons">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 st-service-box">
                    <span><i class="fa fa-cogs"></i></span>
                    <h3 class="text-uppercase">Development</h3>
                    <p>Learn new things by giving short quizes and have fun with them</p>

                </div>

                <div class="col-sm-4 st-service-box">
                    <span><i class="fa fa-life-ring"></i></span>
                    <h3 class="text-uppercase">Friendly Support</h3>
                    <p>Do your staff and we track of your progress and suggest you to take the best decision</p>

                </div>

                <div class="col-sm-4 st-service-box">
                    <span><i class="fa fa-search"></i></span>
                    <h3 class="text-uppercase">Find</h3>
                    <p>You can search your friend in our platform and see their prgress and levels give a try to our platform</p>

                </div>
            </div>
        </div>
    </div>
    <section id="cont" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 contact-info">
                    <h2 class="contact-title text-uppercase">Contact us</h2>
                    <p class="contact-content">Feel free to reach us. We are here to help you any time.</p>
                    <p class="st-address"><i class="fa fa-map-marker"></i> <strong>Jhargram,West Bengal,India</strong>
                    </p>
                    <p class="st-phone"><i class="fa fa-mobile"></i> <strong>+91 9876543210</strong></p>
                    <p class="st-email"><i class="fa fa-envelope-o"></i> <strong>dashanirban275@gmail.com</strong></p>
                    <p class="st-website"><i class="fa fa-globe"></i> <strong>https://anirbandash.netlify.app/</strong>
                    </p>
                </div>
                <div class="col-sm-6 contact-form">
                    <div class="st-contact-message">

                    </div>
                    <form id="myForm" onsubmit="return fetchcall();" name="contact-form">
                        <input type="text" name="name" required="required" id="contact-name" placeholder="Your Name">
                        <input type="email" name="email" required="required" id="contact-email"
                            placeholder="Your Email">
                        <textarea placeholder="Massage" name="message" required="required" id="contact-message"
                            cols="70" rows="6"></textarea>
                        <input type="submit" name="submit" value="Send message" name="contact-submit">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    function fetchcall() {
        var data = new FormData(document.getElementById("myForm"));
        console.log(data);
        fetch("visitor.php", {
                method: "POST",
                body: data
            })
            .then(res => res.text())
            .then((txt) => {
                swal("Thank you!", txt, "success");
                // console.log(txt);
            })
            .catch((err) => {
                console.error(err);
            });
            document.getElementById("myForm").reset();
        return false;
    }
    </script>
</body>

</html>