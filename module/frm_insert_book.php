<?php
	$error = '';

	if( isset($_POST['submit']) ){
		$request 	= $_POST;
		$isbn = isset($_POST['isbn']) ? $_POST['isbn'] :'';
		if( empty($isbn) || $isbn == 0 ){
			$error .= ' Vui lòng chọn đầu sách <br />';
		}
		if( empty($error) ){
			$obtCuonSach = CuonSach::getInstance();
			$isbn = $obtCuonSach->themCuonSach($isbn);
			if( $isbn ){
				echo  'Thêm cuốn sách thành công';
			} else {
				echo 'Thêm cuốn sách lỗi';
			}
		}
	}
	?>
		<form class="form-horizontal" action="" method="POST">
			<h3> Thêm cuốn sách</h3>
			<div class="form-group form-error">
				<label class="control-label col-sm-2" for="email">&nbsp;</label>
		    	<div class="col-sm-10">
		      		<?php echo $error; ?>
		    	</div>

			</div>

		  	<div class="form-group">
		    	<label class="control-label col-sm-3" for="email">Chọn đầu sách</label>
		    	<div class="col-sm-9">
		      		<select class="form-control selectpicker" required name="isbn" data-live-search="true">
		      			<?php
			      			$result = DauSach::list_DauSach();
							if( !empty($result) ){
								echo '<option value="0"> Chọn đầu sách</option>';
								while( $row = $result->fetch_assoc() ) {
									$isbn = $row['isbn'];
									echo "<option value='".$row['isbn']."'> ".get_tuasach_by_isbn($isbn). "  - ". get_ngon_ngu($row['ngonngu']) . "</option>";
								}
							} else {
								echo '<option value="0"> Đầu sách rỗng</option>';
							}
						?>
		      		</select>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    <div class="col-sm-10">
		    &nbsp;
		    </div>
			    <div class="col-sm-2">
			    	<button type="submit" name="submit" class="btn btn-default">Lưu sách</button>
			    </div>
		  	</div>
			</form>
		<?php

?>