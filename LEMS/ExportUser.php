<?php
include 'dbinfo.php'; 
?> 

<?php 
session_start();
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query="SELECT * FROM student_faculty INTO OUTFILE'/Users/sliceOFlife/Desktop/user.xls'";
$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
if($result==false){
	echo"<script> alert('Unable to Export');parent.location.href='Export.php'</script>";
}
else{
	echo"<script> alert('Export Succeed');parent.location.href='Export.php'</script>";
}

?>