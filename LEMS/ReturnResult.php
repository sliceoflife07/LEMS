<?php
include 'dbinfo.php'; 
?>

<?php
session_start();
$username = $_SESSION['username'];
$selecteddevice = $_POST['SelectedDevice'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "UPDATE devices SET IsBorrowed = 0 ,BorrowerDate = NULL ,Borrower = NULL ,ReturnDate = NULL WHERE DeviceID ='$selecteddevice' ";
$sql_query2 ="SELECT * FROM student_faculty WHERE Username = '$username'";
$sql_query3 = "SELECT * FROM devices WHERE DeviceID = '$selecteddevice'";
$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
$result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));
$result3 = mysqli_query ($link, $sql_query3)  or die(mysqli_error($link));
$row3 = mysqli_fetch_array($result3);
if($row3['DeviceName']=="computer"){
	$table_name = 'computer_record';
}
else{
	if($row3['DeviceName']=="switch"){
		$table_name = 'switch_record';
	}
	else{
		$table_name = 'oscilloscope_record';
	}
}
$sql_query4 = "UPDATE $table_name SET ReturnDate = current_timestamp() WHERE DeviceID = '$selecteddevice' AND ReturnDate IS NULL";

$result4 = mysqli_query ($link, $sql_query4)  or die(mysqli_error($link));
$numrow = mysqli_num_rows($result);
$userinfo = mysqli_fetch_array($result2);
if($userinfo['IsFaculty']==0){
	if($numrow == 0){
	echo "<script> alert('Return Succeed');parent.location.href='UserSummary.php';</script>";
	}
	else{
		echo "<script> alert('Return Succeed');parent.location.href='ReturnDevices.php';</script>";
	}
}
else{
	if($numrow == 0){
	echo "<script> alert('Return Succeed');parent.location.href='Admin.php';</script>";
}
else{
	echo "<script> alert('Return Succeed');parent.location.href='AdminReturnDevices.php';</script>";
}
}
?>