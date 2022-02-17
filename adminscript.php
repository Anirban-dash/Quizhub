<?php
require("conn.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$ad_id=intval($_POST['id']);
$pass=mysqli_real_escape_string($con,$_POST['pass']);
$check="SELECT * FROM admin where ad_id='$ad_id'";
$check_res=mysqli_query($con,$check) or die(mysqli_error($con));
if(mysqli_num_rows($check_res)>0){
    header("location:adminadd.php?ex=1");
    die();
}
$sql="INSERT INTO `admin` (`ad_id`, `pass`, `name`) VALUES ('$ad_id', '$pass', '$name')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
header("location:adminadd.php?suc=1");
?>