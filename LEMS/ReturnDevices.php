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
$result2 = mysqli_query($link, $sql_query2) or die(mysqli_error($link));
$userinfo = mysqli_fetch_array($result2);
$numrow = mysqli_num_rows($result);
if($numrow==0){
	if($userinfo['IsFaculty']==0){
		echo"<script> alert('No Device to Return');parent.location.href='UserSummary.php'</script>";
	}
	else{
		echo"<script> alert('No Device to Return');parent.location.href='Admin.php'</script>";
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
	<link href="ReturnDevices.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<title>Return Device</title>
<h1>Return Device</h1>
<form action="ReturnResult.php" method="post">
<table border="1" style="width:100%">
<tr>
	<th>RETURN</th>
	<th>DeviceID</th>
	<th>DeviceName</th>
	<th>Location</th>
	<th>BorrowDate</th>
	<th>Borrower</th>
	<th>ReturnDate</th>
	<th>Parameter</th>
</tr>
<?php foreach ($arr as $element): ?>
<tr>
<td><input type="radio" name="SelectedDevice" value="<?php echo $element['DeviceID']; ?>" required></td>
<td><?php echo $element['DeviceID']; ?></td>
<td><?php echo $element['DeviceName']; ?></td>
<td><?php echo $element['Location']; ?></td>
<td><?php echo $element['BorrowerDate']; ?></td>
<td><?php echo $element['Borrower']; ?></td>
<td><?php echo $element['ReturnDate']; ?></td>
<td><?php echo $element['Parameter']; ?></td>
</tr>
<?php endforeach ?>
<table>
<input type="Submit" value="submit" id=submit />
</form>

<form action="UserSummary.php" method="post">
	<input type="submit" value="B  a  c  k" id=back >
</form>

</body>
</html>
