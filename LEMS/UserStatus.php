<?php
include 'dbinfo.php'; 
?>
<?php
session_start();
$username = $_SESSION['username'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT * FROM devices WHERE Borrower = '$username' ";
$sql_query2 = "SELECT * FROM student_faculty WHERE Username = '$username'";
$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
$result2 = mysqli_query($link, $sql_query2)  or die(mysqli_error($link));
$numrow = mysqli_num_rows($result);
$userinfo = mysqli_fetch_array($result2);

if($numrow == 0){
	if($userinfo['IsFaculty']==0){
		echo"<script> alert('No Device Borrowed');parent.location.href='UserSummary.php'</script>";
	}
	else{
		echo"<script> alert('No Device Borrowed');parent.location.href='Admin.php'</script>";
	}
	
}
else{
	while($row = mysqli_fetch_assoc($result)){
		$arr[] = $row;
	}
}
?>
<html>
<head>
	<link href="UserStatus.css" rel="stylesheet" type="text/css" />
</head>
<body>
<title> User Status </title>
<h1> User Status</h1>
<table border="1" style="width:100%">

<tr>
<th>DeviceID</th>
<th>DeviceName</th>
<th>Location</th>
<th>BorrowDate</th>
<th>ReturnDate</th>
</tr>

<?php foreach ($arr as $element): ?>

<tr>
<td><?php echo $element['DeviceID']; ?></td>
<td><?php echo $element['DeviceName']; ?></td>
<td><?php echo $element['Location']; ?></td>
<td><?php echo $element['BorrowerDate']; ?></td>
<td><?php echo $element['ReturnDate']; ?></td>
</tr>

<?php endforeach ?>

<table>
<form action=<?php if($userinfo['IsFaculty']==0){echo "UserSummary.php";}else{echo "Admin.php";} ?> method="post">
<input type="Submit" value="B  a  c  k" id=back />
</form>
</table>

</body>
</html>