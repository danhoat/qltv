<?php ob_start(); ?>
<!DOCTYPE html>
<html> 
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset ="utf-8"/>
	<title></title>
	<script type="text/javascript">
		function confirm_del(){
			var t = confirm('Co xoa khong ?');
			if(t)
				return true;
			return false;
		}
		function check_form(){
			var post_title 		= document.getElementById("post_tile");
			var post_content 	= document.getElementById("post_content");
			if(post_tile.value == ''){
				alert('Tựa đề k được rỗng');
				return false;
			}

			if( post_content.value == ''){
				alert('noi dung k dc rỗng');
				return false;
			}
			return true;
		}
	</script
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