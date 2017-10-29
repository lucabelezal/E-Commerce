<?php
header('Content-Type: text/html; charset=utf-8');


$db_con = mysqli_connect("localhost:3306","root","root","b_furniture");
mysqli_set_charset($db_con,"utf8");

if(mysqli_connect_errno()){
	die("database connection failed");
}
?>