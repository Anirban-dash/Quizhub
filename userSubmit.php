<?php
require("conn.php");
if(!isset($_POST['submit'])){
    header("location:signup.php");
    die();
}
$name=mysqli_escape_string($con,$_POST['name']);
$mail=mysqli_escape_string($con,$_POST['mail']);
$gender=mysqli_escape_string($con,$_POST['gender']);
$address=mysqli_escape_string($con,$_POST['addr']);
$mobile=intval($_POST['mobile']); 
$ftopic=mysqli_escape_string($con,$_POST['finter']);
$stopic=mysqli_escape_string($con,$_POST['secondinter']);
$ttopic=mysqli_escape_string($con,$_POST['thirdinter']);
$pass=mysqli_escape_string($con,$_POST['passport']);
$mcheck="SELECT * FROM `user` where email='$mail';";
$mquery=mysqli_query($con,$mcheck) or die(mysqli_error($con));
if(mysqli_num_rows($mquery)>0){
    header("location:signup.php?err=1");
    die();
}else{
$sql="INSERT INTO `user` (`name`, `email`, `mobile`, `pass`, `skill1`, `skill2`, `skill3`, `level`, `address`, `Gender`) VALUES ('$name', '$mail', '$mobile', '$pass', '$ftopic', '$stopic', '$ttopic', '1', '$address', '$gender')";
$res=mysqli_query($con,$sql)or die(mysqli_error($con));
$u_id=mysqli_insert_id($con);
$cat_sql="SELECT * FROM catagory";
$cat_res=mysqli_query($con,$cat_sql) or die(mysqli_error($con));
while($row=mysqli_fetch_array($cat_res)){
    $c_id=$row['Cat_id'];
    $us_cat="INSERT INTO `user_catagory` (`u_id`, `set_id`, `cat_id`) VALUES ('$u_id', '1', '$c_id')";
    $us_res=mysqli_query($con,$us_cat) or die(mysqli_error($con));
}
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES["file"]["name"])){
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $image_sql="INSERT into images (file_name, us_id) VALUES ('$fileName', '$u_id')";
            $image_query=mysqli_query($con,$image_sql) or die(mysqli_error($con));
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $image_sql="INSERT into images (file_name, us_id) VALUES ('User-Profile.png', '$u_id')";
    $image_query=mysqli_query($con,$image_sql) or die(mysqli_error($con));
}
header("location:login.php");

}


?>
</script>
</body>