<?php
require "conn.php";
$sql = "SELECT * FROM catagory";
session_start();
if (isset($_SESSION['id'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/signup/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        border-radius: 4px;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    </style>
    
    <title>Responsive bottom navigation</title>

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

                    <?php
if (!isset($_SESSION['id'])) {?>
                    <li class="nav__item">
                        <a href="signup.php" class="nav__link  active-link">
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

            <img src="assets/img/perfil.png" alt="" class="nav__img">
        </nav>
    </header>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form action="userSubmit.php" method="POST" enctype="multipart/form-data"
                                        class="mx-1 mx-md-4">

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="name" type="text" id="form3Example1c" class="form-control"
                                                    placeholder="Your Name" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="mail" type="email" id="form3Example3c" class="form-control"
                                                    placeholder="Your Email" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="passport" type="password" id="myPassword" class="form-control"
                                                    placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-mobile fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="mobile" type="number" id="form3Example4cd"
                                                    class="form-control" placeholder="Mobile" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i id="gen" class="fa fa-info-circle fa-lg me-3 fa-fw"></i>
                                            <select name="gender" onchange="genderClass(this.value);"
                                                class="form-select" aria-label="Default select example" required>
                                                <option class="init" value="0" selected>Gender :</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Transgender">Others</option>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-location-arrow fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="addr" type="text" id="form3Example4cd" class="form-control"
                                                    placeholder="Location" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-certificate fa-lg me-3 fa-fw"></i>
                                            <select onchange="firstSelect(this.value);" name="finter" id="firstSkill"
                                                class="form-select" aria-label="Default select example" required>
                                                <option class="init" selected>First Interest :</option>

                                                <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {?>
                                                <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name']; ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-certificate fa-lg me-3 fa-fw"></i>
                                            <select onchange="secondSelect(this.value);" name="secondinter"
                                                id="secondSkill" class="form-select" aria-label="Default select example"
                                                required>
                                                <option selected>Second Interest :</option>

                                                <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {?>
                                                <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name']; ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-certificate fa-lg me-3 fa-fw"></i>
                                            <select onchange="thirdSelect(this.value);" name="thirdinter"
                                                id="thirdSkill" class="form-select" aria-label="Default select example"
                                                required>
                                                <option class="init" selected>Third Interest :</option>

                                                <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {
    ?>
                                                <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name']; ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-file-image-o fa-lg me-3 fa-fw"></i>
                                            <label class="custom-file-upload">
                                                <input type="file" name="file" accept="image/*" />
                                                <i class="fa fa-cloud-upload"></i> Profile picture
                                            </label>

                                        </div>

                                        <div class="d-flex justify-content-center mx-3 mb-5 mb-lg-4">
                                            <button id="myBtn" name="submit" type="submit"
                                                class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <br><br>
    <script src="./assets/signup/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php
        if(isset($_GET['err'])){
            echo 'swal("Invalid!", "This email is already taken!", "warning");';
        }
        ?>
    </script>
</body>

</html>