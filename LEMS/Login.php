<?php
include 'dbinfo.php'; 
?> 

<?php
session_start(); 
try{
	$link = new PDO($dsn,$user,$pass);
}
catch (PDOException $e) 
{
    die ("Error!: " . $e->getMessage() . "<br/>");
}

if(isset($_POST['username']) and isset($_POST['password'])){
	$username = $_POST['username'];
	$_SESSION['username'] = $username;
	$sql_query=$link->prepare("SELECT * FROM user WHERE Username = ? AND Password = ? ");
	$sql_query->execute(array($_POST['username'],sha1($_POST['password'])));
	$row = $sql_query->rowCount();
	if($row==0){
		echo"<script> alert('Username or Password Wrong');parent.location.href='Login.php'</script>";
	}
	else{
		$result = $sql_query->fetchAll(PDO::FETCH_ASSOC);
		$sql_query2 = $link->prepare("SELECT * FROM student_faculty WHERE Username = ?");
		$sql_query2->execute(array($_POST['username']));
		$result2 = $sql_query2->fetchAll(PDO::FETCH_ASSOC);
		if($result[0]['Password']==sha1($_POST['password'])){
			if ($result2[0]['IsFaculty']==0) {
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
<h1>WELCOME</h1>
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

