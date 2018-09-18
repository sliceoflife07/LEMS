<?php
include 'dbinfo.php'; 
?> 

<?php


?>


<!DOCTYPE html>
<html>
<body>
	<head>
	    <link href="Admin.css" rel="stylesheet" type="text/css" />
		<title>Admin</title>
		<h1>Admin</h1>
	</head>
	<table id=table1 >
	<tr>
	<form action = "EditProfile.php" method="post">
		<td><input type="submit" value="Edit Profile" class="botton1"/></td>
	</form>

	<form action = "AdminRequestDevices.php" method="post">
		<td><input type="submit" value="Request Devices" class="botton1"/></td>
	</form>

	<form action="UserStatus.php" method="post">
		<td><input type="submit" value="User Status" class="botton1"/></td>	
	</form>

	<form action="AdminReturnDevices.php" method="post">
		<td><input type="submit" value="Return Devices" class="botton1"/></td>
	</form>

	<form action="ChangePassword.php" method="post">
		<td><input type="submit" value="Change Password" class="botton1"/></td>
	</form>
	</tr>
	</table>
	
	<table id=table2 >
	<form action="EditDevices.php" method="post">
		<td><input type="submit" value="Edit Devices" class="botton2"></td>
	</form>

	<form action="EditUser.php" method="post">
		<td><input type="submit" value="Edit User" class="botton2"></td>
	</form>
	
	<form action="Import.php" method="post">
		<td><input type="submit" value="Import Devices" class="botton2"/></td>
	</form>
	<form action="Export.php" method="post">
		<td><input type="submit" value="Export Data" class="botton2"></td>
	</form>
	<form action="DisplayDevices.php" method="post">
		<td><input type="submit" value="Display Devices" class="botton2"></td>
	</form>
	<form action="DisplayUsers.php" method="post">
		<td><input type="submit" value="Display Users" class="botton2"></td>
	</form>
	</table>

	<form action="Login.php" method="post">
		<input type="submit" value="Log Out" id=logout />
	</form>
</body>
</html>