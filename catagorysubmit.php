<?php
require("conn.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$check=strtolower($name);
$search="SELECT * FROM catagory WHERE LOWER(Name)='$check'";
$check_result=mysqli_query($con,$search) or die(mysqli_error($con));
if(mysqli_num_rows($check_result)>0){
    header("location:catagoryadd.php?cat=1");
    die();
}
$sql="INSERT INTO `catagory` (`Name`) VALUES ('$name')";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
header("location:catagoryadd.php?suc=1");
?>