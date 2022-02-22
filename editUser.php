<?php
require "conn.php";
$sql = "SELECT * FROM catagory";
session_start();
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
$us_id=$_SESSION['id'];
$us_sql="SELECT * from user where User_ID = '$us_id'";
$us_query=mysqli_query($con,$us_sql) or die(mysqli_error($con));
$user=mysqli_fetch_array($us_query);
$img_sql="SELECT * from images where us_id = '$us_id'";
$img_query=mysqli_query($con,$img_sql) or die(mysqli_error($con));
$image=mysqli_fetch_array($img_query);
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
    cursor: pointer;
    position: relative;
}
.custom-file-upload img{
    display: block;
}
.custom-file-upload .fa-edit{
    position: absolute; bottom:0; left:0;
}
.custom-file-upload .fa-trash{
    position: absolute; bottom:0; right:0; color:crimson;
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
            <a href="index.php" class="nav__logo"><img src="assets/img/banner-name.png" width="65%" alt=""></a>

           

            <img src="./images/Quiz-modified.png" alt="" class="nav__img">
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

                                    <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 mt-4">Edit</p>

                                    <form action="editSubmit.php" method="POST" enctype="multipart/form-data"
                                        class="mx-1 mx-md-4">
                                        <input id="imginp" type="number" name="imageCheck" value="1" hidden/>
                                        <div class="d-flex flex-row justify-content-center mb-3">
                                            <label class="custom-file-upload">
                                                <input  onchange="readURL(event);" type="file" name="file" accept="image/*"/>
                                                <img id="blah" style="border-radius: 50%; max-width:200px;max-height:200px;" src="./uploads/<?php echo $image['file_name'];?>"
                                                class="img-fluid" alt="Sample image"/>
                                                    <span><i class="fa fa-edit"></i></span>
                                                    <span><i id="chng" onclick="del()" class="fa fa-trash"></i></span>    
                                            </label>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="name" type="text" id="form3Example1c" class="form-control"
                                                    placeholder="Your Name" value="<?php echo $user['name'];?>" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="mail" type="email" id="form3Example3c" class="form-control"
                                                    placeholder="Your Email" value="<?php echo $user['email'];?>" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-mobile fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="mobile" type="number" id="form3Example4cd"
                                                    class="form-control" placeholder="Mobile" value="<?php echo $user['mobile'];?>" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i id="gen" class="fa fa-info-circle fa-lg me-3 fa-fw"></i>
                                            <select name="gender" onchange="genderClass(this.value);"
                                                class="form-select" aria-label="Default select example" required>
                                                <option value="Male" <?php if($user['Gender']==="Male"){echo "selected";}?>>Male</option>
                                                <option value="Female" <?php if($user['Gender']==="Female"){echo "selected";}?>>Female</option>
                                                <option value="Transgender" <?php if($user['Gender']==="Transgender"){echo "selected";}?>>Others</option>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-location-arrow fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="addr" type="text" id="form3Example4cd" class="form-control"
                                                    placeholder="Location" value="<?php echo $user['address'];?>" required />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-certificate fa-lg me-3 fa-fw"></i>
                                            <select onchange="firstSelect(this.value);" name="finter" id="firstSkill"
                                                class="form-select" aria-label="Default select example" required>

                                                <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {?>
                                                <option value="<?php echo $row['Name'] ?>" <?php if($user['skill1']===$row['Name']){echo "selected";}?>><?php echo $row['Name']; ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-certificate fa-lg me-3 fa-fw"></i>
                                            <select onchange="secondSelect(this.value);" name="secondinter"
                                                id="secondSkill" class="form-select" aria-label="Default select example"
                                                required>
                                                <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {?>
                                                <option value="<?php echo $row['Name'] ?>" <?php if($user['skill2']===$row['Name']){echo "selected";}?>><?php echo $row['Name']; ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="fa fa-certificate fa-lg me-3 fa-fw"></i>
                                            <select onchange="thirdSelect(this.value);" name="thirdinter"
                                                id="thirdSkill" class="form-select" aria-label="Default select example"
                                                required>
                                                <?php
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($res)) {
    ?>
                                                <option value="<?php echo $row['Name'] ?>" <?php if($user['skill3']===$row['Name']){echo "selected";}?>><?php echo $row['Name']; ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-center mx-3 mb-2 mb-lg-4">
                                            <button id="myBtn" name="submit" type="submit"
                                                class="btn btn-rounded btn-success btn-lg">Update <i class="fa fa-upload"></i></button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <br><br>
    <script src="./assets/signup/edit.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php
        if(isset($_GET['err'])){
            echo 'swal("Invalid!", "This email is already taken!", "warning");';
        }
        ?>
    </script>
    <script>
        <?php
            if($image['file_name']=='User-Profile.png'){
                echo "document.getElementById('chng').hidden=true;";
            }
        ?>
    var readURL = function(event) {
    var output = document.getElementById('blah');
    
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
    document.getElementById('chng').hidden=false;
    document.getElementById('imginp').value=1;
  };
  function del(){
    document.getElementById('blah').src="./uploads/User-Profile.png";
    document.getElementById('imginp').value=0;
    document.getElementById('chng').hidden=true;
    event.preventDefault();
  }
</script>
</body>

</html>