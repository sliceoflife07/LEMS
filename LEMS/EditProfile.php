<?php
include 'dbinfo.php'; 
?>

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$username = $_SESSION['username'];
$sql_query = "Select * from student_faculty AS S Where S.Username = '$username' ";
$result = mysqli_query($link,$sql_query) or die(mysqli_error($link));
$numrow = mysqli_num_rows($result);
if($result == false) {
	echo"<script> alert('Database Error');parent.location.href='Login.php'</script>";
	exit();
} else {
	if($numrow != 0){
		$row = mysqli_fetch_array($result);
	}
}
?>

<?php
if(isset($_POST['name']) and isset($_POST['email']))  {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$DateofBirth = $_POST['DateofBirth'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$username = $_SESSION['username'];
	$dept = $_POST['dept'];
	$updateStatement = "UPDATE student_faculty SET Name='$name',DateofBirth='$DateofBirth',Email='$email',Gender='$gender',Address='$address',Dept='$dept' WHERE UserName='$username'";
	$result = mysqli_query ($link, $updateStatement)  or die(mysqli_error($link)); 
	if($result == false) {
		echo"<script> alert('Database Error');parent.location.href='Login.php'</script>";
		exit();
	} else {
		header('Location: Login.php');
	}
} 


?>
<html>
<head>
    <link href="EditProfile.css" rel="stylesheet" type="text/css" />
</head>
<title>Profile</title>
<h1>Profile</h1>
<form action="" method="post">
<table>
<tr>
    <td>First Name</td>
    <td><input type="text" name="name" value = <?php echo $row['Name']?> ></td>
</tr>

<tr>
    <td>DateofBirth</td>
    <td><input type="text" name="DateofBirth" value = <?php echo $row['DateofBirth']?> ></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="text" name="email" value = <?php echo $row['Email']?> ></td>
</tr>

<tr>
    <td>Address</td>
    <td><input name="address" value = <?php echo $row['Address']?>  ></input></td>
</tr>

<tr>
    <td>Gender</td>
	<td>
	<select name="gender">
	  <option value=<?php echo $row['Gender']; ?>><?php if($row['Gender']=='M'){echo 'male';}else{echo 'female';} ?></option>
	  <option value=<?php if($row['Gender']=='M'){echo 'F';}else{echo 'M';} ?>><?php if($row['Gender']=='M'){echo 'female';}else{echo 'male';} ?></option>
	</select>
	</td>
</tr>

<tr>
    <td>Department</td>
	<td>
	<select name="dept"> 
	  <option value=<?php echo $row['Dept'] ?>><?php echo $row['Dept']; ?></option>
	  <option value=<?php if($row['Dept']=="InfoSec"){echo "CommuEngineering";}else{echo "InfoSec";} ?>><?php if($row['Dept']=="InfoSec"){echo "CommuEngineering";}else{echo "InfoSec";} ?></option>
	</select>
	</td>
</tr>
</table>

<input type="submit" value="submit" id=submit />
</form>
<?php 
$sql_query2 = "SELECT * FROM student_faculty WHERE Username='$username'";
$result2 = mysqli_query($link,$sql_query2) or die(mysqli_error($link));
$temp = mysqli_fetch_array($result2);
$userinfo = $temp['IsFaculty'];
if($userinfo==0){
	$action = "UserSummary.php";
}
else{
	$action = "Admin.php";
}

?>

<form action=<?php echo $action; ?> method="post">
	<input type="submit" value="B  a  c  k" id=back >
</form>
<body>
<html>