<?php
	$error = '';

	if( isset($_POST['submit']) ){

		$request 	= $_POST;
		$ma_tuasach = isset($_POST['ma_tuasach']) ? $_POST['ma_tuasach'] :'';
		$ngonngu 	= isset($_POST['ngonngu']) ? $_POST['ngonngu'] :'';
		$bia 		= isset($_POST['bia']) ? $_POST['bia'] :'';
		$trangthai 	= isset($_POST['trangthai']) ? $_POST['trangthai'] :'';
		$soluong 	= isset($_POST['soluong']) ? $_POST['soluong'] :'';
		$soluong 	= max($soluong, 1);
		if( empty($ma_tuasach) || $ma_tuasach == 0 ){
			$error .= ' Vui lòng chọn tựa sách <br />';
		}
		if( empty($ngonngu) ){
			$error .= ' Vui lòng chọn ngôn ngữ <br />';
		}

		if( empty($error) ){

			$cDausach = DauSach::getInstance();
			$isbn = $cDausach->themDauSach($ma_tuasach, $ngonngu, $bia, $trangthai);
			if( $isbn  ){
				$cuonSach = CuonSach::getInstance();
				for($i =0; $i < $soluong; $i++) {
					$cuonSach->themCuonSach($isbn);
				}
			}
			if( $isbn ){
				$result_text =   'Thêm đầu sách thành công';
			} else {
				$result_text =  'Thêm đầu sách lỗi';
			}
		}
	}
	?>
		<form class="form-horizontal" action="" method="POST">
			<h3> Thêm đầu sách</h3>
			<div class="form-group form-error">
				<label class="control-label col-sm-2" for="email">&nbsp;</label>
		    	<div class="col-sm-10">
		      		<?php echo $error; ?>
		    	</div>

			</div>

		  	<div class="form-group">
		    	<label class="control-label col-sm-2" for="email">Tựa sách</label>
		    	<div class="col-sm-10">
		      		<select class="form-control selectpicker" required name="ma_tuasach" data-live-search="true">

		      			<?php
			      			$result = Tua_Sach::list_tua_sach();
							if( !empty($result) ){
								echo '<option value="0"> Chọn tựa sách</option>';
								while( $row = $result->fetch_assoc() ) {
									echo "<option value='".$row['ma_tuasach']."'> ".$row['tuasach']."</option>";
								}
							} else {
								echo '<option value="0"> Đầu sách rỗng</option>';
							}
						?>
		      		</select>
		    	</div>
		  	</div>

		  		<div class="form-group">
		    	<label class="control-label col-sm-2" for="email">Ngôn ngữ</label>
		    	<div class="col-sm-10">
		    	<?php list_ngon_ngu();?>
		    	</div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Bìa </label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="tacgia" name="tacgia" placeholder="Bìa cuốn sách">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Trạng thái</label>
			    <div class="col-sm-10">
			    	<input type="radio" value="1" checked name="trangthai" > Đang rãnh
			    	<input type="radio" value="0"  name="trangthai" > Đang mượn
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd"> Số lượng sách</label>
			    <div class="col-sm-10">
			    	<input type="number" value="1" min="1" checked name="soluong" />

			    </div>
		  	</div>
		  	<div class="form-group">
		    <div class="col-sm-10">
		    &nbsp;
		    </div>
			    <div class="col-sm-2">
			    	<button type="submit" name="submit" class="btn btn-default">Lưu đầu sách</button>
			    </div>
		  	</div>
			</form>
		<?php

?>