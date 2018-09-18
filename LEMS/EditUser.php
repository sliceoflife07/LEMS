<?php
include 'dbinfo.php'; 
?> 

<?php 
session_start();
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$searchstatement = "SELECT * FROM student_faculty WHERE IsFaculty = 0";
$result = mysqli_query ($link, $searchstatement)  or die(mysqli_error($link));
$numrow = mysqli_num_rows($result);
if ($numrow==0){
	echo "<script> alert('No Non-Admin User');parent.location.href='Admin.php';</script>";
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
	<link href="EditUser.css" rel="stylesheet" type="text/css"/>
	<title>Edit User</title>
	<h1>Edit User</h1>
</head>
<body>
<form action="ChangeUserStatus.php" method="post">
<table border="1" style="width:100%">
	<tr>
		<th>SELECT</th>
		<th>UserName</th>
		<th>Name</th>
		<th>Email</th>
		<th>IsDebarred</th>
	</tr>
<?php foreach ($arr as $element): ?>
<tr>
	<td><input type="radio" name="SelectedUser" value=<?php echo '"'.addslashes($element['Username']).'"';?></td>
	<td><?php echo $element['Username']; ?></td>
	<td><?php echo $element['Name']; ?></td>
	<td><?php echo $element['Email']; ?></td>
	<td><?php if($element['IsDebarred']==0){echo "NOT DEBARRED";}else{echo "DEBBARED";} ?></td>
</tr>	
<?php endforeach ?>
</table>
<input type="submit" value="Change Status" id=changestatus >
</form>
<table>
	<form action="Admin.php" method="post">
		<input type="submit" value="B  A  C  K" id=back >
	</form>
</table>
</body>
</html>