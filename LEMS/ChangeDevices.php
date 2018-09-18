<?php
include 'dbinfo.php'; 
?>

<?php 
session_start();
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$searchstatement = "SELECT * FROM devices WHERE IsBorrowed = 0";
$result = mysqli_query ($link, $searchstatement)  or die(mysqli_error($link));
$numrow = mysqli_num_rows($result);
if ($numrow==0){
	echo "All devices is borrowed no change can be made";
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
	<link href="ChangeDevices.css" rel="stylesheet" type="text/css"/>
	<title>Change Devices</title>
	<h1>Change Devices</h1>
	<form action="ChangeStatus.php" method="post">
</head>
<body>
<table border="1" style="width:100%">

<tr>
	<th>SELECT</th>
	<th>DeviceID</th>
	<th>DeviceName</th>
	<th>Location</th>
	<th>Parameter</th>
</tr>

<?php foreach ($arr as $element): ?>
<tr>
	<td><input type="radio" name="SelectedDevice" value="<?php echo $element['DeviceID']; ?>" required></td>
	<td><?php echo $element['DeviceID']; ?></td>
	<td><?php echo $element['DeviceName']; ?></td>
	<td><?php echo $element['Location']; ?></td>
	<td><?php echo $element['Parameter']; ?></td>
</tr>	
<?php endforeach ?>
</table>
<table>
<input type="submit" value="Change" id=change >
</form>
<form action="EditDevices.php" method="post" >
<input type="submit" value="b  a  c  k" id=back >
</form>
</table>
</body>
</html>
