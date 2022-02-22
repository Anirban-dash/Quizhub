<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
if(!isset($_POST['submit'])){
    header("location:signup.php");
    die();
}
$us_id=$_SESSION['id'];
$img_check=intval($_POST['imageCheck']);
$name=mysqli_escape_string($con,$_POST['name']);
$mail=mysqli_escape_string($con,$_POST['mail']);
$gender=mysqli_escape_string($con,$_POST['gender']);
$address=mysqli_escape_string($con,$_POST['addr']);
$mobile=intval($_POST['mobile']); 
$ftopic=mysqli_escape_string($con,$_POST['finter']);
$stopic=mysqli_escape_string($con,$_POST['secondinter']);
$ttopic=mysqli_escape_string($con,$_POST['thirdinter']);
$mcheck="SELECT * FROM `user` where email='$mail' and User_ID <> '$us_id';";
$mquery=mysqli_query($con,$mcheck) or die(mysqli_error($con));
if(mysqli_num_rows($mquery)>0){
    header("location:editUser.php?err=1");
    die();
}else{
$sql="UPDATE `user` SET `name` = '$name', `email` = '$mail', `mobile` = '$mobile',`skill1` = '$ftopic', `skill2` = '$stopic', `skill3` = '$ttopic', `address` = '$address', `Gender` = '$gender' WHERE `user`.`User_ID` = '$us_id'";
$res=mysqli_query($con,$sql)or die(mysqli_error($con));
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if($img_check==0){
    $image_sql="UPDATE `images` SET `file_name` = 'User-Profile.png' where `images`.`us_id`='$us_id'";
    $image_query=mysqli_query($con,$image_sql) or die(mysqli_error($con));
}else{
    if(!empty($_FILES["file"]["name"])){
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $image_sql="UPDATE `images` SET `file_name` = '$fileName' where `images`.`us_id`='$us_id'";
            $image_query=mysqli_query($con,$image_sql) or die(mysqli_error($con));
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
    }
}

header("location:profile.php");

}


?>
</script>
</body>