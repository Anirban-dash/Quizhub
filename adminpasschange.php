<?php
session_start();
require("conn.php");
if(!isset($_SESSION['admin']) || !isset($_POST['submit'])){
    header("location:index.php");
    die();
}
$us_id=$_SESSION['admin'];
$new_pass=mysqli_escape_string($con,$_POST['Newpass']);
$old_pass=mysqli_escape_string($con,$_POST['Oldpass']);
$check_sql="SELECT * from `admin` where id='$us_id' and pass='$old_pass'";
$check_query=mysqli_query($con,$check_sql) or die(mysqli_error($con));
if(mysqli_num_rows($check_query)==0){
    header("location:adminpassport.php?pass=1");
    die();
}
$update_sql="UPDATE `admin` SET `pass` = '$new_pass' WHERE `admin`.`id` = '$us_id'";
$update=mysqli_query($con,$update_sql) or die(mysqli_error($con));
header("location:adminpassport.php?succ=1");
?>