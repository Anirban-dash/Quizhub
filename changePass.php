<?php
session_start();
require("conn.php");
if(!isset($_SESSION['id']) || !isset($_POST['submit'])){
    header("location:index.php");
    die();
}
$us_id=$_SESSION['id'];
$new_pass=mysqli_escape_string($con,$_POST['Newpass']);
$old_pass=mysqli_escape_string($con,$_POST['Oldpass']);
$check_sql="SELECT * from user where User_ID='$us_id' and pass='$old_pass'";
$check_query=mysqli_query($con,$check_sql) or die(mysqli_error($con));
if(mysqli_num_rows($check_query)==0){
    header("location:password.php?pass=1");
    die();
}
$update_sql="UPDATE `user` SET `pass` = '$new_pass' WHERE `user`.`User_ID` = '$us_id'";
$update=mysqli_query($con,$update_sql) or die(mysqli_error($con));
header("location:password.php?succ=1");
?>