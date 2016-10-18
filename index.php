<?php  session_start(); ?>
<?php
$login_error= '';
if( isset($_POST['submit']) && $_POST['submit'] == 'login' ){
   $username = isset($_POST['username']) ? $_POST['username'] : '';
   $password = isset($_POST['password']) ? $_POST['password'] : '';

   if( $username == 'admin' && $pass  = 'admin' ) {
      $_SESSION['is_logged'] = 1;
      ob_start();
      header("Location: index.php");
   } else {
   		$login_error = 'Tên đăng nhập và mật khẩu chưa chính xác';
      $_SESSION['is_logged'] = 0;
   }

}

?>
<!DOCTYPE html>
<html>
<?php
	require_once("inc/connect.php");
	require_once("inc/require.php");
?>
<head>
	<link rel="stylesheet" type="text/css" href="assest/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css"> -->
	<link rel="stylesheet" href="assest/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
	<script src="assest/js/jquery.min.js"></script>
	<script src="assest/js/bootstrap.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script> -->
	<script src="assest/js/bootstrap-select.min.js"></script>

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
		<div class="row" id="header">
			<h1><center>Đồ Án Quản lý thư viện</center></h1>
		</div>
		<div class="row row-middle">
			<div class="col-md-3 left sidebar">
			<?php require_once('left.php');?>
			</div>
			<div class="main col-md-9">
				<?php
				$login = isLogin();
				if ($login){
					$view = isset($_GET['act']) ? $_GET['act']:'list_dau_sach';
					$module = 'module/'.$view.'.php';
					require($module);
					require_once("inc/disconnect.php");
				} else {
					require( 'module/login.php' );
				}
				?>
			</div>
		</div>
		<div class="row footer">
			<br />
			<center> Đồ án quản lý thư viện.<br /> Xây dựng bằng ngôn ngữ PHp & MySql </center>
			<br />
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
	    console.log(t);
		document.getElementById('ngaygio_tra').valueAsDate = t;
	    document.getElementById('ngaysinh').valueAsDate = ns;
		//$('#han_sd').val(new Date().toDateInputValue());

	});

</script>
</body>
</html>