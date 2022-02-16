<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizhub</title>
</head>

<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
<?php
require("conn.php");
$name=mysqli_escape_string($con,$_POST['name']);
$mail=mysqli_escape_string($con,$_POST['mail']);
$gender=mysqli_escape_string($con,$_POST['gender']);
$address=mysqli_escape_string($con,$_POST['addr']);
$mobile=intval($_POST['mobile']); 
$ftopic=mysqli_escape_string($con,$_POST['finter']);
$stopic=mysqli_escape_string($con,$_POST['secondinter']);
$ttopic=mysqli_escape_string($con,$_POST['thirdinter']);
$pass=mysqli_escape_string($con,$_POST['passport']);
$mcheck="SELECT * FROM `user` where email='$mail';";
$mquery=mysqli_query($con,$mcheck) or die(mysqli_error($con));
if(mysqli_num_rows($mquery)>0){
    header("location:signup.php?err=1");
}else{
$sql="INSERT INTO `user` (`name`, `email`, `mobile`, `pass`, `skill1`, `skill2`, `skill3`, `level`, `address`, `Gender`) VALUES ('$name', '$mail', '$mobile', '$pass', '$ftopic', '$stopic', '$ttopic', '1', '$address', '$gender')";
$res=mysqli_query($con,$sql)or die(mysqli_error($con));
echo 'swal("Thak you for join!", "You are good to go!", "success");';
}
?>
</script>
</body>