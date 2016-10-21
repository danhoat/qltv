<?php
if( isset($_SESSION) && $_SESSION['is_logged'] == 1 ){
	$_SESSION['is_logged']  = 0;
}
ob_start();
header("Location: login.php");
?>