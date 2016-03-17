<?php
	$con=mysqli_connect("localhost","root","password","GYYQ_database");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else {
		mysqli_query($con, "SET NAMES UTF8");
	}
?>