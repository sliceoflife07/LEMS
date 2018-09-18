<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['name']) and isset($_POST['email']))  {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$DateofBirth = $_POST['DateofBirth'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$username = $_SESSION['username'];
	$dept = $_POST['dept'];
	$insertStatement = "INSERT INTO student_faculty (Username, Name, DateofBirth, Email, Gender, Address,Dept) 
	VALUES ('$username', '$name', '$DateofBirth', '$email', '$gender', '$address','$dept')";
	$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
	if($result == false) {
		echo 'The query failed.';
		exit();
	} else {
		header('Location: Login.php');
	}
} 


?>

<html>
<head>
    <link href="CreateProfile.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Create Profile</h1>
<title>Create Profile</title>
<form action="" method="post"> 
<table> 

<tr>
    <td>Name</td>
    <td><input type="text" name="name" required/></td>
</tr>

<tr>
    <td>DateofBirth</td>
    <td><input type="text" name="DateofBirth"/></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="text" name="email" required/></td>
</tr>

<tr>
    <td>Address</td>
    <td><textarea name="address" rows="5" cols="30"></textarea></td>
</tr>

<tr>
    <td>Gender</td>
	<td>
	<select name="gender">
	  <option value="M">male</option>
	  <option value="F">female</option>
	</select>
	</td>
</tr>

<tr>
    <td>Department</td>
	<td>
	<select name="dept">
	  <option value="Infosec">Infomation Security</option>
	  <option value="CommuEngineering">Communication Engineering</option>
	</select>
	</td>
</tr>

</table>

<table>
<input type="submit" value="submit" id=submit />
</form>
</table>

</body>
</html>