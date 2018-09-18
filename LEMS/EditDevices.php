<?php
include 'dbinfo.php'; 
?>
<?php 



 ?>




<!DOCTYPE html>
 <html>
 <head>
	<link href="EditDevices.css" rel="stylesheet" type="text/css"/>
 	<title>Edit Devices</title>
 	<h1>Edit Devices</h1>
 </head>

 <body>
 <form action="AddDevices.php" method="post">
 	<input type="submit" value="Add Devices" class="button">
 </form>

 <form action="DeleteDevices.php" method="post">
 	<input type="submit" value="Delete Devices" class="button">
 </form>
 <form action="ChangeDevices.php" method="post">
 	<input type="submit" value="Change Devices" class="button">
 </form>
 <form action="Admin.php">
 	<input type="submit" value="B  a  c  k" id=back >
 </form>
 </body>
 </html> 