<?php
include 'dbinfo.php'; 
?>

<?php 
session_start();
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
?>

<!DOCTYPE html>
<html>
<head>
	<link href="Export.css" rel="stylesheet" type="text/css"/>
	<title>Export Data</title>
	<h1>Export Data</h1>
</head>
<body>
<table>

<tr>
<form action="ExportUser.php" method="post">
<td><input type="submit" value="Export User" class="button"></td>
</form>
</tr>

<tr>
<form action="ExportDevices.php" method="post">
<td><input type="submit" value="Export Devices" class="button"></td>
</form>
</tr>

</table>

<form action="Admin.php" method="post">
	<input type="submit" value="B  a  c  k" id=back >
</form>
</body>
</html>