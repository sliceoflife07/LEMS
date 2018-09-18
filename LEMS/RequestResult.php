<?php include 'dbinfo.php'; ?>

<?php
session_start();
$username = $_SESSION['username'];
$selecteddevice = $_POST['SelectedDevice'];
$_SESSION['selecteddevice'] = $selecteddevice;
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
// echo "<script> alert('aaa')</script>";
$sql_query = "SELECT * FROM devices AS D WHERE D.DeviceID = '$selecteddevice'";
$sql_query2 = "UPDATE devices SET BorrowerDate = current_timestamp(),Borrower = '$username',ReturnDate = DATE_ADD(current_timestamp(),INTERVAL 2 HOUR),IsBorrowed = 1 WHERE DeviceID = '$selecteddevice'";
$result1 = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
$row = mysqli_fetch_array($result1);

if($row['DeviceName']=="computer"){
	$table_name = 'computer_record';
}
else{
	if($row['DeviceName']=="switch"){
		$table_name = 'switch_record';
	}
	else{
		$table_name = 'oscilloscope_record';
	} 
}

if ($row['IsBorrowed']== 1){
	echo "<script> alert('Device not Available');parent.location.href='RequestDevices.php';</script>";
}
else{
	$result2 = mysqli_query($link,$sql_query2) or die(mysqli_error($link));
	$sql_query3 = "INSERT INTO $table_name (DeviceID,Borrower,BorrowDate) VALUES('$selecteddevice','$username',current_timestamp())";
	$result3 = mysqli_query($link,$sql_query3) or die(mysqli_error($link));
	echo "<script> alert('Borrowed');parent.location.href='UserStatus.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="RequestResult.css" rel="stylesheet" type="text/css"/>
	<title>
		Request Result
	</title>
</head>
<body>

</body>
</html>