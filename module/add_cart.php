<?php
session_start();
$id = isset($_GET['id']) ? $_GET['id'] : '';
if($id){
	//$_SESSION['cart'] = array();
	if( isset($_SESSION['cart'][$id]) ){

		$_SESSION['cart'][$id] =  (int)$_SESSION['cart'][$id] + 1;
	} else {

		$_SESSION['cart'][$id] =  1;
	}
}

?>