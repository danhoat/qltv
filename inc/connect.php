<?php
	global $conn;
	// $connect = mysql_connect("localhost","root","");
	// if(!$connect)
	// 	die("can not connect");
	// $db = mysql_select_db("qltv", $connect);
	// if(!$db){
	// 	die(" Can not select db");
	// }

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "qltv";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}
?>