<?php
require("conn.php");
$today = date("d/m/Y");
$name=mysqli_real_escape_string($con,$_POST['name']);
$mail=mysqli_real_escape_string($con,$_POST['email']);
$masg=mysqli_real_escape_string($con,$_POST['message']);
$mcheck="SELECT * FROM `visitor` where mail='$mail';";
$mquery=mysqli_query($con,$mcheck) or die(mysqli_error($con));
if(mysqli_num_rows($mquery)>0){
    $msg="Thank you ".$name." for reach us again";
}else{
    $msg="Thank you ".$name." for contact us";
}
$sql="INSERT INTO `visitor` (`mail`, `name`, `msg`,`dates`) VALUES ('$mail', '$name', '$masg','$today')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
echo $msg;
?> 