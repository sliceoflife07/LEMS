<?php
include 'dbinfo.php'; 
?>

<?php
session_start();
$username = $_SESSION['username'];
?>

<html>
<head>
	<link href="AdminRequestDevices.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Search Device</h1>
<title>Search Device</title>
<form action="AdminDeviceStatus.php" method="post">
<table>
<tr>
    <td>DeviceName</td>
    <td><input type="text" name="DeviceName" required/></td>
</tr>

</table>

<input type="submit" value="Search" id=search />
</form>

<form action="Admin.php" method="post">
<input type="submit" value="B  a  c  k" id=back />
</form>

</body>
</html>