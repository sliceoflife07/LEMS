<?php
include 'dbinfo.php'; 
?>

<?php
session_start();
$username = $_SESSION['username'];
$link = new PDO($dsn,$user,$pass);
$sql_query = $link->prepare("SELECT * FROM student_faculty WHERE Username = ?");
$sql_query->execute(array($username));
$userinfo = $sql_query->fetchALL(PDO::FETCH_ASSOC);
if($userinfo[0]['IsDebarred']==1){
	echo"<script> alert('You have been banned');parent.location.href='UserSummary.php'</script>";
}
?>

<html>
<head>
	<link href="RequestDevices.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Search Device</h1>
<title>Search Device</title>
<form action="DeviceStatus.php" method="post">

<table>
<tr>
    <td>DeviceName</td>
    <td><input type="text" name="DeviceName" required/></td>
</tr>

</table>
<form action="DeviceStatus.php" method="post">
<input type="submit" value="Search" id=search />
</form>

<form action="UserSummary.php" method="post">
<input type="submit" value="B  a  c  k" id=back />
</form>


</body>
</html>