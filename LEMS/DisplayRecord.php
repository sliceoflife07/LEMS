<?php include 'dbinfo.php'; ?>

<?php 
session_start();
$username = $_SESSION['username'];
$selecteddevice = $_POST['SelectedDevice'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "SELECT * FROM devices WHERE DeviceID='$selecteddevice'";
$result = mysqli_query($link, $sql_query) or die(mysqli_error($link));
$temp = mysqli_fetch_array($result);

if($temp['DeviceName']=="computer"){
	$table_name = 'computer_record';
}
else{
	if($temp['DeviceName']=="switch"){
		$table_name = 'switch_record';
	}
	else{
		$table_name = 'oscilloscope_record';
	}
}

$sql_query2 = "SELECT * FROM $table_name WHERE DeviceID = '$selecteddevice' ";
$result2 = mysqli_query($link, $sql_query2) or die(mysqli_error($link));
$rownum = mysqli_num_rows($result2);
if($rownum==0){
	echo "<script> alert('No record for this devices');parent.location.href='DisplayDevices.php';</script>";
}
else{
	while($row = mysqli_fetch_assoc($result2)){
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




<html>
<head>
	<link href="DisplayRecord.css" rel="stylesheet" type="text/css" />
	<title>BorrowRecord</title>
	<h1>Borrow Record</h1>
</head>
<body>
<!--startprint-->
<table border="1" style="width:100%">
<tr>
	
	<th>DeviceID</th>
	<th>DeviceName</th>
	<th>Borrower</th>
	<th>BorrowDate</th>
	<th>ReturnDate</th>
</tr>
<?php foreach ($arr as $element):?>
<tr>
<td><?php echo $element['DeviceID']; ?></td>
<td><?php echo $element['Devicename']; ?></td>
<td><?php echo $element['Borrower']; ?></td>
<td><?php echo $element['BorrowDate']; ?></td>
<td><?php echo $element['ReturnDate']; ?></td>
</tr>

<?php endforeach ?>
</table>
<!--endprint-->

<table>
<input type="button" name="print" value="Print" onclick="preview()" id=print >

<form action="Admin.php" method="post">
<input type="submit" value="b  a  c  k" id=back >
</form>
</table>

</body>
</html>






