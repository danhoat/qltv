<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset ="utf-8"/>
	<title> Đồ án quản lý thư viện</title>
</head>
<body>
	<div class="wrapper">
		<div id="header">
		</div>
		<?php require_once('left.php');?>
		<div class="main">
			<?php
				require_once("inc/connect.php");
				require_once("inc/main.php");
				$view = isset($_GET['act']) ? $_GET['act']:'list';
				$module = 'module/'.$view.'.php';
				require($module);
				require_once("inc/disconnect.php");

			?>
		</div>
	</div>

</body>
</html>