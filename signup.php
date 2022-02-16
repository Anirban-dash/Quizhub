<?php
require "conn.php";
$sql = "SELECT * FROM catagory";
session_start();
if(isset($_SESSION['id'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/signup/style.css">
    <title>Quizhub|Make your knowledge</title>
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

                    <li class="nav__item">
                        <a href="signup.php" class="nav__link  active-link">
                            <i class='bx bx-user-plus nav__icon'></i>
                            <span class="nav__name">SignUp</span>
                        </a>
                    </li>
                
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


    <div class="containerr">
        <header>Signup Form</header>
        <div class="progress-bar">
            <div class="step">
                <p>
                    Name</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check">
                </div>
            </div>
            <div class="step">
                <p>
                    Contact</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check">
                </div>
            </div>
            <div class="step">
                <p>
                    Interest</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check">
                </div>
            </div>
            <div class="step">
                <p>
                    Submit</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check">
                </div>
            </div>
        </div>
        <div class="form-outer">
            <form action="userSubmit.php" method="POST">
                <div class="page slide-page">
                    <div class="title">
                        Basic Info:</div>
                    <div class="field">
                        <div class="label">
                            Name</div>
                        <input type="text" name="name">
                    </div>
                    <div class="field">
                        <div class="label">
                            Email Address</div>
                        <input type="email" name="mail">
                    </div>
                    <div class="field">
                        <div class="label">
                            Gender</div>
                        <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Other</option>
                        </select>
                    </div>
                    <div class="field">
                        <button class="firstNext next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Contact Info:</div>
                    <div class="field">
                        <div class="label">
                            Address</div>
                        <input type="text" name="addr">
                    </div>
                    <div class="field">
                        <div class="label">
                            Phone Number</div>
                        <input type="Number" name="mobile">
                    </div>
                    <div class="field btns">
                        <button class="prev-1 prev">Previous</button>
                        <button class="next-1 next">Next</button>
                    </div>
                </div>
                <div class="page">
                    <div class="title">
                        Interest</div>
                    <div class="field">
                        <div class="label">
                            First topic</div>
                        <select name="finter">
                        <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {?>
                            <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name']; ?></option>
                           <?php }?>
                        </select>
                    </div>
                    <div class="field">
                        <div class="label">
                            Second topic</div>
                        <select name="secondinter">
                            <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {?>
                            <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name']; ?></option>
                           <?php }?>
                        </select>
                    </div>
                    <div class="field">
                        <div class="label">
                            Third topic</div>
                        <select name="thirdinter">
                        <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {
    ?>
                            <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name']; ?></option>
                           <?php }?>
                        </select>
                    </div>
                    <div class="field btns">
                        <button class="prev-2 prev">Previous</button>
                        <button class="next-2 next">Next</button>
                    </div>
                </div>
                <div class="page">
                <div class="title">
                        Log in password:</div>
                    <div class="field">
                        <div class="label">
                            Password</div>
                        <input id="pass" type="text" name="passport">
                    </div>
                    <div class="field">
                        <div class="label">
                            Confirm Password</div>
                        <input onkeyup="show()" id="cpass" type="password">


                    </div>
                    <p id="warn" style="color:red;"></p>
                    <div class="field btns">
                        <button class="prev-3 prev">Previous</button>
                        <button type="submit" id="mybtn" class="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<script src="assets/signup/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    let btn=document.getElementById("mybtn");
        let text=document.getElementById("warn");
        let pass=document.getElementById("pass");
        let cpass=document.getElementById("cpass");
        function show(){
            if(cpass.value===pass.value){
                btn.disabled=false;
                text.innerHTML="";
            }else{
                btn.disabled=true;
                text.innerHTML="*Password isn't matched";
            }
        }
        <?php
        if(isset($_GET['err'])){
            echo 'swal("OOPS!", "This email ID is already taken!", "warning");';
        }
        ?>
</script>
</body>

</html>