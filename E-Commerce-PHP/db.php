<?php
	$db_con = mysqli_connect("localhost:3306","root","root","b_furniture");

	if(mysqli_connect_errno()){
		die("database connection failed");
	}
?>