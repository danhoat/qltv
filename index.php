<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<?php
	require_once("inc/connect.php");
	require_once("inc/require.php");
?>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="assest/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script src="assest/js/bootstrap.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

	<meta charset ="utf-8"/>
	<title><?php echo get_site_title();?></title>
	<script type="text/javascript">
		function remove_tua_sach(){
			return confirm("Bạn thực sự muốn xóa?");
		}

	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div  id="header" >
				<center>Đồ Án Quản lý thư viện</center>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 left sidebar">
			<?php require_once('left.php');?>
			</div>
			<div class="main col-md-9">
				<?php

					$view = isset($_GET['act']) ? $_GET['act']:'list';
					$module = 'module/'.$view.'.php';
					require($module);
					require_once("inc/disconnect.php");
				?>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$('.selectpicker').selectpicker({
		  style: 'btn-info',
		  size: 4
		});
	$(function() {
	    $(".selectall").click(function(event){
	    	var is_check = this.checked;
	    	$( "input.checkbox" ).each(function( index, element ) {
		    	// element == this
		    	$( element ).prop('checked', is_check );

		  	});
	    });
	    var t = new Date;
	   	var ns =  new Date("2000-06-20T12:00:00");
	    document.getElementById('han_sd').valueAsDate = t;
	    document.getElementById('ngaysinh').valueAsDate = ns;
		//$('#han_sd').val(new Date().toDateInputValue());

	});

</script>
</body>
</html>