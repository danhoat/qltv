<?php
	$error 		= '';
	$ma_tuasach = 0;
	$ngonngu 	= 0;
	$bia 		= '';
	$isbn 		= isset($_GET['id']) ? $_GET['id'] : 0;
	$objDausach = DauSach::getInstance();
	$dausach 	= $objDausach->getDauSach($isbn);
	?>
		<form class="form-horizontal" action="" method="POST">
			<h3> Chi tiết đầu sách</h3>
			<div class="form-group form-error">
				<label class="control-label col-sm-2" for="email">&nbsp;</label>
		    	<div class="col-sm-10">

		    	</div>
			</div>

		  	<div class="form-group">
		    	<label class="control-label col-sm-2" for="email">Tựa sách</label>
		    	<div class="col-sm-10">
		    		<?php echo getTuaSachByISBN($isbn);?>
		    	</div>
		  	</div>

		  		<div class="form-group">
		    	<label class="control-label col-sm-2" for="email">Ngôn ngữ</label>
		    	<div class="col-sm-10">
		    	<?php echo 'Tiếng '.get_ngon_ngu($dausach['ngonngu']);?>
		    	</div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Bìa </label>
			    <div class="col-sm-10">
			     	<?php echo $dausach['bia'];?>
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Trạng thái</label>
			    <div class="col-sm-10">
			    	<input type="radio" value="1" checked name="trangthai" > Có sẵn
			    	<input type="radio" value="0"  name="trangthai" > Chưa sẵn sàng
			    </div>
		  	</div>


		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd"> Số lượng sách</label>
			    <div class="col-sm-10">
			    	<?php echo demSoLuongDauSach($isbn);?>
			    </div>
		  	</div>

			</form>
		<?php

?>