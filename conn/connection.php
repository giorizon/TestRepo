<?php
$con = mysqli_connect('localhost',"root","","myschool2");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
else{
}
/*
session_start();

if (!(isset($_SESSION['log_id']))) {

header ("Location: Login/login.php");

}    */

?>