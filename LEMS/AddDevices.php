<?php 
include 'dbinfo.php';
?>

 <?php 
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['DeviceName']) and isset($_POST['Location']) and isset($_POST['Parameter'])){
	$devicename = $_POST['DeviceName'];
	$location = $_POST['Location'];
	$parameter = $_POST['Parameter'];
	$addstatement = "INSERT INTO devices (DeviceName, Location, IsBorrowed,Parameter) 
	VALUES ('$devicename','$location',0,'$parameter')";
	$result = mysqli_query ($link, $addstatement)  or die(mysqli_error($link));
	if($result == false){
		echo "Unable to add devices";
		exit();
	}
	else{
		echo "<script> alert('Add Succeed');parent.location.href='EditDevices.php';</script>";
	}

}
 
?>


 <!DOCTYPE html>
 <html>
 <head>
	<link href="AddDevices.css" rel="stylesheet" type="text/css" />
 	<title>Add Deviecs</title>
 	<h1>Add Device</h1>
 	<form action="" method="post">
 </head>
 <body>
 <table>
 <tr>
 	<td>Device Name</td>
 	<td><input type="text" name="DeviceName" required></td>
 </tr>

 <tr>
 	<td>Location</td>
 	<td><input type="text" name="Location" required></td>
 </tr>
 <tr>
 	<td>Parameter</td>
 	<td><input type="text" name="Parameter"></td>
 </tr>
 </table>
	<input type="submit" value="ADD" id=add >
</form>
<form action="EditDevices.php" method="post">
<input type="submit" value="B  a  c  k" id=back >
</form>
 </body>
 </html>