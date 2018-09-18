<?php
include 'dbinfo.php'; 
?>

<?php 
session_start();
$deviceid=$_POST['SelectedDevice'];
$_SESSION['deviceid']=$deviceid;
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT * FROM devices WHERE DeviceID = '$deviceid'";
$result = mysqli_query($link,$sql_query) or die(mysqli_error($link));
$numrow = mysqli_num_rows($result);
if($result == false){
	echo "Uable to Change";
	exit();
 }
 else{
 	if($numrow != 0){
 		$row = mysqli_fetch_array($result);
 	}
 }

?>

<html>
<head>
    <link href="ChangeStatus.css" rel="stylesheet" type="text/css"/>
	<title>Change Devices</title>
	<h1>Change Devices</h1>
</head>
<body>

<table>
<form action="ChangeResult.php" method="post">
<tr>
	<td>DeviceName</td>
	<td><input type="text" name="devicename" value= <?php echo $row['DeviceName'] ?>  ></td>	
</tr>

<tr>
	<td>Location</td>
	<td><input type="text" name="location" value= <?php echo $row['Location'] ?>  ></td>
</tr>

<tr>
	<td>Parameter</td>
	<td><input type="text" name="parameter" value= <?php echo $row['Parameter'] ?>  ></td>
</tr>

</table>
<tr>
<input type="submit" value="CHANGE" id=change >
</tr>
</form>
</body>
</html>




