<?php
	$servername = "localhost";
	$username = "root";
	$pass = "";
	$dbname = "panu";

	$conn = new mysqli($servername, $username, $pass, $dbname);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected";
	

	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	else{
		// echo "Connected";
	}
	
	// echo "Connection successfull";
	
?>