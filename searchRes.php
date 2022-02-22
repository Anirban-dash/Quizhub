<?php
require "conn.php";
$name = mysqli_real_escape_string($con, $_POST['name']);
$search = $name . '%';
$sql = "SELECT * FROM `user` WHERE name LIKE '$search'";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
if(mysqli_num_rows($query)==0){
    echo '<tr class="warning no-result">
    <td colspan="4"><i class="fa fa-warning"></i> No result</td>
  </tr>';
}
while ($row = mysqli_fetch_array($query)) {
    $search_name='<b>'.substr($row['name'],0,strlen($name)).'</b>'.substr($row['name'],strlen($name));
    $id = $row['User_ID'];
    $img_sql = "SELECT * FROM `images` WHERE us_id ='$id'";
    $img_query = mysqli_query($con, $img_sql) or die(mysqli_error($con));
    $img=mysqli_fetch_array($img_query)['file_name'];
    $url='searchProfile.php?id='.strval($id);
    echo '<tr onclick="window.location=\''.$url.'\'">
    <td>'.'<img src="./uploads/'.$img.'" alt="" width="35px" height="35px" style="border-radius: 50%;">   '.$search_name.'</td>
    <td></td>
  </tr>';
}
