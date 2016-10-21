<?php
	session_start();
	require_once("inc/connect.php");
	require_once("inc/require.php");

	$login = isLogin();
	if(!$login) {
		header("Location: login.php");
	}

	require_once("View/header.php");

	$view = isset($_GET['act']) ? $_GET['act']:'dausach_list';
	$module = 'module/'.$view.'.php';
	require($module);
	require_once("inc/disconnect.php");

	require_once("view/footer.php");
	?>