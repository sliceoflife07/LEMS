<?php
include 'dbinfo.php'; 
?>

<?php 
session_start();
$selecteddevice = $_POST['SelectedDevice'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$deletestatement = "DELETE FROM devices where DeviceID = '$selecteddevice' ";
$result = mysqli_query ($link, $deletestatement)  or die(mysqli_error($link));
if ($result==false){
	echo "Unable to delete";
}
else{
echo "<script> alert('Delete Succeed');parent.location.href='DeleteDevices.php';</script>";
}

?>
