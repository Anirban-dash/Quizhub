<?php
require("conn.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$mint=intval($_POST['mint']);
$sec=intval($_POST['sec']);

$check=strtolower($name);
$search="SELECT * FROM sets WHERE LOWER(name)='$check'";
$check_result=mysqli_query($con,$search) or die(mysqli_error($con));
if(mysqli_num_rows($check_result)>0){
    header("location:manageset.php?cat=1");
    die();
}

$sql="INSERT INTO `sets` (`name`, `minute`, `second`) VALUES ('$name', '$mint', '$sec')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
header("location:manageset.php?suc=1");
?>