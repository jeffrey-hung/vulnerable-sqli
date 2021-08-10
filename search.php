<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysql_connect("localhost", "root", "root");
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$db_selected = mysql_select_db($link, "test_db");

	if (!$db_selected) {
		die('Cannot access' . DB_NAME . ': ' . mysqli_error());
	}
	
	$query = $_GET['query']; 
	// gets value sent over search form
	$sql= "SELECT * FROM test_data WHERE `username` LIKE '%" . $query . "%'"
	$raw_results = mysql_query($link,$sql);
	echo $raw_results;
?>
</body>
</html>