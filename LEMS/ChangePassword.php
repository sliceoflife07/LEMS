<?php
include 'dbinfo.php'; 
?> 

<?php 
session_start();
$username = $_SESSION['username'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT * FROM user WHERE Username = '$username'";
$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
if($result==false){
	echo "<script> alert('Uable to find User');parent.location.href='EditUser.php';</script>";
}
else{
	$row = mysqli_fetch_array($result);
	
}

if(isset($_POST['oldpassword']) and isset($_POST['newpassword']) and isset($_POST['confirmpassword'])){
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$confirmpassword  = $_POST['confirmpassword'];
	if(sha1($oldpassword)!=$row['Password']){
		echo "<script> alert('Password is Wrong');parent.location.href='ChangePassword.php';</script>";
	}
	if($newpassword!=$confirmpassword){
		echo "<script> alert('Confirm password is not consistent');parent.location.href='ChangePassword.php';</script>";
	}
	else{
		$newpassword = sha1($newpassword);
		$updatetatement = "UPDATE user SET Password  = '$newpassword' WHERE Username = '$username'";
		// var_dump($updatetatement);
		$result1 = mysqli_query($link, $updatetatement)or die(mysqli_error($link));
	}
}
?>

<?php 
$sql_query2 = "SELECT * FROM student_faculty WHERE Username = '$username' ";

$result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));

$temp = mysqli_fetch_array($result2);
$userinfo = $temp['IsFaculty'];
if($userinfo==0){
	$action="UserSummary.php";
}
else{
	$action="Admin.php";
}	
?>







<!DOCTYPE html>
<html>
<head>
	<link href="ChangePassword.css" rel="stylesheet" type="text/css"/>
	<title>
		Change Password
	</title>
	<h1>Change Password</h1>
	<form action=<?php echo $action; ?> method="post">
</head>
<body>
<table id=table1 >
	<tr>
		<td>Old Password</td>
		<td><input type="password" name="oldpassword"></td>
	</tr>
	<tr>
		<td>New Password</td>
		<td><input type="password" name="newpassword"></td>
	</tr>
	<tr>
		<td>Confirm Password</td>
		<td><input type="password" name="confirmpassword"></td>
	</tr>
</table>
<table>

	<input type="submit" value="Change Password" id=changepassword >
	</form>
</table>
<table>



	<form action=<?php echo $action; ?> method="post">
		<input type="submit" value="b  a  c  k" id=back >	
	</form>
</table>
</body>
</html>