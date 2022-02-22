<?php
require("conn.php");
if(!isset($_GET['id'])){
    header("location:index.php");
}
$id=intval($_GET['id']);
$sql = "SELECT * FROM `user` WHERE User_ID='$id'";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
$img_sql = "SELECT * FROM `images` WHERE us_id ='$id'";
$img_query = mysqli_query($con, $img_sql) or die(mysqli_error($con));
$img=mysqli_fetch_array($img_query);
$topic="SELECT COUNT(*) as cnt FROM `user_catagory` WHERE set_id>1 and u_id='$id'";
$topic_query=mysqli_query($con,$topic) or die(mysqli_error($con));
$topic_row=mysqli_fetch_array($topic_query);
$topic_cover=$topic_row['cnt'];
$high_score=0;
$h_score_sql="SELECT MAX(score) as scr FROM `user_score` WHERE u_id='$id'";
$h_score_query=mysqli_query($con,$h_score_sql) or die(mysqli_error($con));
$h_score=mysqli_fetch_array($h_score_query);
if($topic_cover!=0){
$high_score=$h_score['scr'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Quizhub - Make your day with knowledge </title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <style>
    
    @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

body {
   
    font-family: "Poppins", sans-serif;
    font-weight: 300
}

.container {
    
    height: 100vh;
    
}

.card {
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    background-color: #545454;
    width: 380px;
    border: none;
    border-radius: 15px;
    padding: 8px;
    color:white;
    position: relative;
    height: 300px
    
}

.upper {
    height: 100px
}

.upper img {
    width: 100%;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px
}

.user {
    position: relative
}

.profile img {
    height: 80px;
    width: 80px;
    margin-top: 2px
}

.profile {
    position: absolute;
    top: -50px;
    left: 38%;
    height: 90px;
    width: 90px;
    border: 3px solid #fff;
    border-radius: 50%
}

.follow {
    border-radius: 15px;
    padding-left: 20px;
    padding-right: 20px;
    height: 35px
}

.stats span {
    font-size: 29px
}
  
  </style>
</head>

<body>

  <nav style="background-color: #1c9fa3; box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;" class="navbar navbar-light">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand"><img src="assets/img/banner-name.png" width="65%" alt=""></a>
      
    </div>
  </nav>
 
  <div class="container d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="user text-center">
            <div class="profile"> <img src="uploads/<?php echo $img['file_name'];?>" class="rounded-circle"> </div>
        </div>
        <div class="mt-5 text-center">
            <h4 class="mb-0"><?php echo $row['name'];?></h4>
             <span class="text-muted d-block mb-2">	
<i class="fas fa-map-marker-alt"></i> <?php echo $row['address'];?></span> 
            <p class="text-warning"><i class="fas fa-envelope"></i> <?php echo $row['email'];?></p>
            <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                <div class="stats">
                    <h6 class="mb-0"><i class="fas fa-star"></i> Level</h6> <span><?php echo $row['level'];?></span>
                </div>
                <div class="stats">
                    <h6 class="mb-0"><i class="fas fa-medal"></i> High Score</h6> <span><?php echo $high_score;?></span>
                </div>
                <div class="stats">
                    <h6 class="mb-0">	
<i class="fas fa-bookmark"></i> Topics</h6> <span><?php echo $topic_cover;?></span>
                </div>
            </div>
        </div>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>
</html>