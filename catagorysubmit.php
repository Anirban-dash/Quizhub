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
$cat_id=mysqli_insert_id($con);
$u_sql="SELECT * from user";
$result=mysqli_query($con,$u_sql) or die(mysqli_error($con));
while($row=mysqli_fetch_array($result)){
    $u_id=$row['User_ID'];
    $uc_sql="INSERT INTO `user_catagory` (`u_id`, `set_id`, `cat_id`) VALUES ('$u_id', '1', '$cat_id')";
    $cat_result=mysqli_query($con,$uc_sql) or die(mysqli_error($con));
}
header("location:catagoryadd.php?suc=1");
?>