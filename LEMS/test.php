<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 

if(isset($_POST['username']) and isset($_POST['password']))  { 
	$username = $_POST['username']; 
	$password = $_POST['password']; 
	$_SESSION['username']=$username;
	$password = sha1($password);
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");

	$sql_query = "Select U.Username From user AS U Where U.Username = '$username' AND U.Password = '$password'";  
	$sql_query2 = "SELECT IsFaculty FROM student_faculty WHERE Username = '$username' ";
         
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false){
		echo"<script> alert('Database Error');parent.location.href='Login.php'</script>";
		exit();
	}
	else{
		if(mysqli_num_rows($result) == 1){ 
			$result2 = mysqli_query ($link, $sql_query2)  or die(mysqli_error($link));
			$row = mysqli_fetch_array($result2);
			if($row['IsFaculty']==0){
				header("Location:UserSummary.php");
			}
			else{
				header("Location:Admin.php");
			}
		}
		else{
			echo"<script> alert('Username or Password Wrong');parent.location.href='Login.php'</script>";
		}
	}
}	
									
?>

<!DOCTYPE html>	
<html>
<head>
    <link href="Login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<title>Login</title>
<h1>WELCOME!</h1>
<form action="" method="post">
<table id=table1 >
<tr>
    <td>Username</td>
    <td><input type="text" name="username" required class="text" /></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="password" name="password" required class="text" /></td>
</tr>
</table>

<table id=table2 >
<tr>
<td><input type="Submit" value="Login" id=login /></td>
</form>
<form action="NewUserRegistration.php" method="post">
<td><input type="Submit" value="Create Account" id=createaccount /></td>
</form>
</tr>
</table>

</body>
</html>

