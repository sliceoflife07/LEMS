<?php
include 'dbinfo.php'; 
?>

<?php 
session_start();
$deviceid = $_SESSION['deviceid'];
$devicename = $_POST['devicename'];
$parameter = $_POST['parameter'];
$location =$_POST['location'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$updatetatement  ="UPDATE devices SET DeviceName = '$devicename',Location = '$location',Parameter = '$parameter' WHERE DeviceID = '$deviceid'";
$result = mysqli_query($link,$updatetatement) or die(mysqli_error($link));
if($result ==false){
	echo "Uable to change";
}
else{
	echo "<script> alert('Change Succeed');parent.location.href='EditDevices.php';</script>";
}
?>