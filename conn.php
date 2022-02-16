<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="quizdb";
$con = new mysqli($servername, $username, $password,$database) or die(mysqli_error($con));
?>