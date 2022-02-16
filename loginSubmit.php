<?php 
require("conn.php");
$email=mysqli_real_escape_string($con,$_POST['userName']);
$pass=mysqli_real_escape_string($con,$_POST['password']);
$sql="SELECT * FROM user where email='$email' and pass='$pass'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
if(mysqli_num_rows($res)==0){
    header("location:login.php?err=1");
}else{
    session_start();
    $row=mysqli_fetch_array($res);
    $_SESSION['id']=$row['User_ID'];
    header("location:studentAdmin.php");
}
?>