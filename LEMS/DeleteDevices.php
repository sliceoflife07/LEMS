<?php
include 'dbinfo.php'; 
?>


<!DOCTYPE html>
<html>
<head>
	<link href="DeleteDevices.css" rel="stylesheet" type="text/css"/>
	<title>Delete Devices</title>
	<h1>Delete Devices</h1>
	<form action="DeleteStatus.php" method="post">
</head>
<body>
<table>
<tr>
	<td><input type="text" name="DeviceName" id=devicename ></td>
	<td><input type="submit" value="Search Name" id=searchname ></td>
	</form>
</tr>
</table>

<form action="EditDevices.php" method="post">
	<input type="submit" value="B  a  c  k" id=back >
</form>

</body>
</html>