<?php
include 'dbinfo.php'; 
?>  
<?php 
session_start();
$username = $_SESSION['username'];
if($_POST['DeviceName']!=null){
	$DeviceName = $_POST['DeviceName'];
	$_SESSION['DeviceName'] = $DeviceName;
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");
	$sql_query = "Select * from devices AS D where D.DeviceName ='$DeviceName'";
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
	$numrow = mysqli_num_rows($result);
	if($result == false)
		{
		echo "<script> alert('Database Error');parent.location.href='Admin.php';</script>";
	}
	if($numrow == 0){
		echo "<script> alert('No such Device');parent.location.href='Admin.php';</script>";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$arr[] = $row;
		}
	}
}
?>
<html>
<head>
	<link href="AdminDeviceStatus.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<title>Device Status</title>
<h1>Device Status</h1>
<form action="AdminRequestResult.php" method="post">
<table border="1" style="width:100%">
<tr>
	<th>SELECT</th>
	<th>Picture</th>
	<th>DeviceID</th>
	<th>DeviceName</th>
	<th>Location</th>
	<th>BorrowDate</th>
	<th>Borrower</th>
	<th>ReturnDate</th>
	<th>Parameter</th>
</tr>
<?php foreach ($arr as $element):?>
<?php
$name = $element['DeviceName'];
$sql_query2 ="SELECT * FROM devpic WHERE Devicename='$name'";
$result2 = mysqli_query($link,$sql_query2) or die(mysqli_error($link));
$temp = mysqli_fetch_assoc($result2);
$path = $temp['Picpath'];
?>	
<tr>
<td><input type="radio" name="SelectedDevice" value="<?php echo $element['DeviceID']; ?>" required></td>
<td><img src=<?php echo $path; ?>></td>
<td><?php echo $element['DeviceID']; ?></td>
<td><?php echo $element['DeviceName']; ?></td>
<td><?php echo $element['Location']; ?></td>
<td><?php echo $element['BorrowerDate']; ?></td>
<td><?php echo $element['Borrower']; ?></td>
<td><?php echo $element['ReturnDate']; ?></td>
<td><?php echo $element['Parameter']; ?></td>
</tr>

<?php endforeach ?>
<table>
<input type="Submit" value="submit" id=submit />
</form>
</table>

<table>
<form action="AdminRequestDevices.php" method="post">
<input type="submit" value="b  a  c  k" id=back >
</form>
</table>

</body>
</html>