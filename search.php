<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysqli_connect("localhost", "root", "root");
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$db_selected = mysqli_select_db($link, "test_db");
	
	if (!$db_selected) {
		die('Cannot access: ' . mysqli_error($link));
	}
	$sql = "SELECT * from test_data";

	if (!mysqli_query($link, $sql)) {
		die('Error: ' . mysqli_error($link));
	}
	$results = mysqli_query($link, $sql);
	while($row = mysql_fetch_array($results)) {
		echo $row['username']; // Print a single column data
		echo print_r($row);       // Print the entire row data
	}
	
	mysqli_close($link);
?>
</body> 
</html>