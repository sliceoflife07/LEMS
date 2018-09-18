<?php
include 'dbinfo.php'; 
?>  
<?php
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<link href="UserSummary.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>User Summary</h1>
<title>User Summary</title>
<form action="EditProfile.php" method="post">
	<input type="submit" value="Edit Profile" class="button" />
</form>

<form action="RequestDevices.php" method="post">
	<input type="submit" value="Request Devices" class="button" />
</form>

<form action="UserStatus.php" method="post">
	<input type="submit" value="User Status" class="button" />
</form>

<form action="ReturnDevices.php" method="post">
	<input type="submit" value="Return Devices" class="button" />
</form>

<form action="ChangePassword.php" method="post">
	<input type="submit" value="Change Password" class="button" />
</form>

<form action="Login.php" method="post">
	<input type="submit" value="Log Out" id=logout />
</form>
</body>
</html>
