<?php
require("conn.php");
session_start();
$q_id=intval($_POST['q_id']);
$ques_name=mysqli_real_escape_string($con,$_POST['ques']);
$opo=mysqli_real_escape_string($con,$_POST['opo']);
$ops=mysqli_real_escape_string($con,$_POST['ops']);
$opt=mysqli_real_escape_string($con,$_POST['opt']);
$opf=mysqli_real_escape_string($con,$_POST['opf']);
$corr=intval($_POST['corr']);
$catagory=mysqli_real_escape_string($con,$_POST['catagory']);
$set=mysqli_real_escape_string($con,$_POST['set']);
// echo $q_id." ".$ques_name." ".$corr." ".$catagory;
$sql="UPDATE `question` SET `title` = '$ques_name', `catagory` = '$catagory', `correct` = '$corr', `sets` = '$set' WHERE `question`.`id` = '$q_id'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
echo "success";
$id=mysqli_insert_id($con);
$opo_sql="UPDATE `options` SET `answer` = '$opo' WHERE `options`.`q_id` = '$q_id' and `options`.`op_no` = '1'";
$ops_sql="UPDATE `options` SET `answer` = '$ops' WHERE `options`.`q_id` = '$q_id' and `options`.`op_no` = '2'";
$opt_sql="UPDATE `options` SET `answer` = '$opt' WHERE `options`.`q_id` = '$q_id' and `options`.`op_no` = '3'";
$opf_sql="UPDATE `options` SET `answer` = '$opf' WHERE `options`.`q_id` = '$q_id' and `options`.`op_no` = '4'";
$res_o=mysqli_query($con,$opo_sql) or die(mysqli_error($con));
$res_s=mysqli_query($con,$ops_sql) or die(mysqli_error($con));
$res_t=mysqli_query($con,$opt_sql) or die(mysqli_error($con));
$res_f=mysqli_query($con,$opf_sql) or die(mysqli_error($con));
header("location:viewques.php?q=1");
?>