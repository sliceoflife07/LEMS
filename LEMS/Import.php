<?php
include 'dbinfo.php'; 
?> 


<?php 
if(isset($_POST["Import"]))
{
    session_start();
    $link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            
            $sql_query = "INSERT INTO devices (DeviceName, Location, IsBorrowed,Parameter) VALUES ('$emapData[0]','$emapData[1]',0,'$emapData[2]')";
            $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
        }
        fclose($file);
        echo 'CSV File has been successfully Imported';
        header('Location: Admin.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="Import.css" rel="stylesheet" type="text/css" />
	<title>Import</title>
	<h1>Import</h1>
</head>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="Import" value="Import" id=import >Upload</button>
</form>
<form action="Admin.php">
    <input type="submit" value="B  a  c  k" id=back >
</form>
</body>
</html>