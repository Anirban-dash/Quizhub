<?php
require("conn.php");
session_start();
$ques_name=mysqli_real_escape_string($con,$_POST['ques']);
$opo=mysqli_real_escape_string($con,$_POST['opo']);
$ops=mysqli_real_escape_string($con,$_POST['ops']);
$opt=mysqli_real_escape_string($con,$_POST['opt']);
$opf=mysqli_real_escape_string($con,$_POST['opf']);
$corr=intval($_POST['corr']);
$catagory=mysqli_real_escape_string($con,$_POST['catagory']);
$set=mysqli_real_escape_string($con,$_POST['set']);
$sql="INSERT INTO `question` (`title`, `catagory`, `correct`, `sets`) VALUES ('$ques_name', '$catagory', '$corr', '$set')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$id=mysqli_insert_id($con);
$opo_sql="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$opo', '$id', '1')";
$ops_sql="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$ops', '$id', '2')";
$opt_sql="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$opt', '$id', '3')";
$opf_sql="INSERT INTO `options` (`answer`, `q_id`, `op_no`) VALUES ('$opf', '$id', '4')";
$res_o=mysqli_query($con,$opo_sql) or die(mysqli_error($con));
$res_s=mysqli_query($con,$ops_sql) or die(mysqli_error($con));
$res_t=mysqli_query($con,$opt_sql) or die(mysqli_error($con));
$res_f=mysqli_query($con,$opf_sql) or die(mysqli_error($con));
header("location:admin.php?q=1");