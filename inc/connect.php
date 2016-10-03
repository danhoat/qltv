<?php
	global $connect;
	$connect = mysql_connect("localhost","root","");
	if(!$connect)
		die("can not connect");
	$db = mysql_select_db("qltv", $connect);
	if(!$db){
		die(" Can not select db");
	}
?>