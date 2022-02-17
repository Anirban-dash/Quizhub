<?php
require("conn.php");
$q_id=$_GET['q_id'];
$qu_sql="DELETE FROM `question` WHERE `question`.`id` = '$q_id'";
$op_sql="DELETE FROM `options` WHERE `options`.`q_id` = '$q_id'";
$q_res=mysqli_query($con,$qu_sql) or die(mysqli_error($con));
$op_res=mysqli_query($con,$op_sql) or die(mysqli_error($con));
header("location:viewques.php?d=1");
?>