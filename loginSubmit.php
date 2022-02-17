<?php 
require("conn.php");
$email=mysqli_real_escape_string($con,$_POST['userName']);
$pass=mysqli_real_escape_string($con,$_POST['password']);
if(is_numeric($email)){
    $sql="SELECT * FROM admin where ad_id='$email' and pass='$pass'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($res)==0){
        header("location:login.php?err=1");
    }else{
        session_start();
        $row=mysqli_fetch_array($res);
        $_SESSION['admin']=$row['id'];
        $_SESSION['name']=$row['name'];
        header("location:admin.php");
    }
}else{
    $sql="SELECT * FROM user where email='$email' and pass='$pass'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($res)==0){
        header("location:login.php?err=1");
    }else{
        session_start();
        $row=mysqli_fetch_array($res);
        $_SESSION['id']=$row['User_ID'];
        $_SESSION['name']=$row['name'];
        header("location:studentAdmin.php");
    }
}
?>