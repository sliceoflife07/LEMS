<?php
include 'dbinfo.php'; 
?>

<?php 
session_start();
$username = $_SESSION['username'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT * FROM student_faculty";
$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
$rownum = mysqli_num_rows($result);
if($rownum==0){
	echo "<script> alert('No UserInfo in the Dtabase');parent.location.href='Admin.php';</script>";
}
else{
	while($row = mysqli_fetch_assoc($result)){
		$arr[] = $row;
	}

}

?>

<?php 
echo '<script language="javascript"> 
function preview() 
{ 
bdhtml=window.document.body.innerHTML; 
sprnstr="<!--startprint-->"; 
eprnstr="<!--endprint-->"; 
prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
window.document.body.innerHTML=prnhtml; 
window.print(); 
window.location.href="Admin.php"; 
} 
</script>'; 
?>








<!DOCTYPE html>
<html>
<head>
	<link href="DisplayUsers.css" rel="stylesheet" type="text/css"/>
	<title>Display Users</title>
	<h1>Display Users</h1>
</head>
<body>
<!--startprint-->
<table border="1" style="width:100%">
<tr>
<th>Username</th>
<th>Name</th>
<th>DateofBirth</th>
<th>Email</th>
<th>Department</th>
<th>Address</th>
<th>Status</th>
</tr>

<?php foreach ($arr as $element): ?>


<td><?php echo $element['Username']; ?></td>
<td><?php echo $element['Name']; ?></td>
<td><?php echo $element['DateofBirth']; ?></td>
<td><?php echo $element['Email']; ?></td>
<td><?php echo $element['Dept']; ?></td>
<td><?php echo $element['Address']; ?></td>
<td><?php if($element['IsDebarred']==0){echo "Not debarred";}else{echo "debarred";} ?></td>
</tr>

<?php endforeach ?>

</table>
<!--endprint-->
<table>
<input type="button" name="print" value="Print" onclick="preview()" id=print >
<form action="Admin.php" method="post">
<input type="submit" value="b  a  c  k" id=back >
</form>
</body>
</html>












