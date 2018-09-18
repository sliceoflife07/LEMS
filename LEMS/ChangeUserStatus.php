<?php
include 'dbinfo.php'; 
?> 

<?php 
session_start();
$selecteduser = $_POST['SelectedUser'];
// echo $selecteduser;
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$searchstatement1 = "SELECT * FROM student_faculty WHERE Username ='".$selecteduser."'";
$result1 = mysqli_query($link,$searchstatement1);
$numrow = mysqli_num_rows($result1);
echo $numrow;

if($result1==false){
	echo "<script> alert('Uable to find User');parent.location.href='EditUser.php';</script>";
}
$row = mysqli_fetch_array($result1);

	if($row['IsDebarred']==0){
		$changestatement1 = "UPDATE student_faculty SET IsDebarred = 1 WHERE Username = '$selecteduser'";
		$result2 = mysqli_query($link, $changestatement1) or die(mysqli_error($link));
		echo "<script> alert('The User Has Been Debarred');parent.location.href='EditUser.php';</script>";
	}
	else{
		$changestatement2 = "UPDATE student_faculty SET IsDebarred = 0 WHERE Username = '$selecteduser'";
		$result3 = mysqli_query($link,$changestatement2) or die(mysqli_error($link));
		echo "<script> alert('The User Has Been UnDebarred');parent.location.href='EditUser.php';</script>";
	}
?>


