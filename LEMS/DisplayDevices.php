<?php
include 'dbinfo.php'; 
?>

<?php 
session_start();
$username = $_SESSION['username'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT * FROM devices";
$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
$rownum = mysqli_num_rows($result);
if($rownum==0){
	echo "<script> alert('No Devices in the Dtabase');parent.location.href='Admin.php';</script>";
}
else{
	while($row = mysqli_fetch_assoc($result)){
		$arr[] = $row;
	}
}
?>


<!DOCTYPE html>
<html>
<head>
    <link href="DisplayDevices.css" rel="stylesheet" type="text/css" >
	<title>Display Devices</title>
	<h1>Display Devices</h1>
	<form action="DisplayRecord.php" method="post">
</head>
<body>

<table border="1" style="width:100%">
<tr>
<th>SELECT</th>
<th>Picture</th>
<th>DeviceID</th>
<th>DeviceName</th>
<th>Location</th>
<th>BorrowDate</th>
<th>ReturnDate</th>
<th>Parameter</th>
</tr>

<?php foreach ($arr as $element): ?>

<?php
$name = $element['DeviceName'];
$sql_query2 ="SELECT * FROM devpic WHERE Devicename='$name'";
$result2 = mysqli_query($link,$sql_query2) or die(mysqli_error($link));
$temp = mysqli_fetch_assoc($result2);
$path = $temp['Picpath'];
?>
<td><input type="radio" name="SelectedDevice" value="<?php echo $element['DeviceID']; ?>" required></td>
<td><img src=<?php echo $path; ?>></td>
<td><?php echo $element['DeviceID']; ?></td>
<td><?php echo $element['DeviceName']; ?></td>
<td><?php echo $element['Location']; ?></td>
<td><?php echo $element['BorrowerDate']; ?></td>
<td><?php echo $element['ReturnDate']; ?></td>
<td><?php echo $element['Parameter']; ?></td>
</tr>

<?php endforeach ?>

</table>

<table>
<input type="submit" value="show record" id=showrecord >
</form>
<form action="Admin.php" method="post">
<input type="submit" value="b  a  c  k" id=back >
</form>
</body>
</html>