<?php
	$error = '';
	$button_text = 'Lưu tựa sách';
	$label_text = 'Thêm tựa sách';
	$is_update = 0;
	$tuasach = '';
	$tacgia = '';
	$ma_tuasach = 0;
	$tomtat = '';
	if( isset($_POST['submit']) ){
		$request 	= $_POST;
		$c_tuasach 	= isset($_POST['tuasach']) ? $_POST['tuasach'] :'';
		$c_tacgia 	= isset($_POST['tacgia']) ? $_POST['tacgia'] :'';
		$c_tomtat 	= isset($_POST['tomtat']) ? $_POST['tomtat'] :'';
		$is_update 	= isset($_POST['is_update']) ? $_POST['is_update'] :'';
		$ma_tuasach = isset($_POST['ma_tuasach']) ? $_POST['ma_tuasach'] :'';



		if( empty($c_tuasach) ){
			$error .= ' Vui lòng nhập tựa sách <br />';
		}
		if( empty($c_tacgia) ){
			$error .= ' Vui lòng nhập tác giả <br />';
		}
		if( empty($c_tomtat) ){
			$error .= ' Vui lòng nhập tóm tắt cuốn sách <br />';
		}
		if( empty($error) ){
			$cTuasach = new Tua_Sach();
			if( $ma_tuasach){
				// update tua sach
				$kq = $cTuasach->update_tua_sach($ma_tuasach, $c_tuasach, $c_tacgia, $c_tomtat);
				if($kq == TRUE){
					echo  'Cập nhật tựa sách thành công';
				} else {
					echo 'Cập nhật tựa sách lỗi';
				}
			} else {
				// them moi tua sach
				$kq = $cTuasach->them_tua_sach($c_tuasach, $c_tacgia, $c_tomtat);
				if($kq == TRUE){
					echo  'Thêm tựa sách thành công';

				} else {
					echo 'Thêm tựa sách lỗi';
				}
			}
		}
	}
	$ma_tuasach = isset($_GET['id']) ? $_GET['id'] : 0;
	if( $ma_tuasach ){

		$cTuaSach 		= new Tua_Sach();
		$obt_tuasach 	= $cTuaSach->get_tua_sach($_GET['id']);
		$tuasach 		= $obt_tuasach['tuasach'];
		$tacgia 		= $obt_tuasach['tacgia'];
		$tomtat 		= $obt_tuasach['tomtat'];
		$button_text 	= 'Cập nhật';
		$label_text 	= 'Cập nhật tựa sách';
		$is_update 		= 1;
	}
	?>
		<form class="form-horizontal" action="" method="POST">
			<h3> <?php echo $label_text;?> </h3>
			<div class="form-group form-error">
				<label class="control-label col-sm-2" for="email">&nbsp;</label>
		    	<div class="col-sm-10">
		      		<?php echo $error; ?>
		    	</div>

			</div>

		  	<div class="form-group">
		    	<label class="control-label col-sm-2" for="email">Tựa sách</label>
		    	<div class="col-sm-10">
		      		<input type="tuasach" class="form-control" name="tuasach" id="tuasach" placeholder="Nhập tựa sách" value="<?php echo $tuasach;?>">
		    	</div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Tác giả</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="tacgia" name="tacgia" placeholder="Tên tác giả" value="<?php echo $tacgia;?>">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Tóm tắt</label>
			    <div class="col-sm-10">
			      	<textarea name="tomtat" id="tomtat"> <?php echo $tomtat;?></textarea>
			      	<input type="hidden" name="is_update" value="<?php echo $is_update;?>">
			      	<input type="hidden" name="ma_tuasach" value="<?php echo $ma_tuasach;?>">
			    </div>
		  	</div>
		  	<div class="form-group">
		    <div class="col-sm-10">
		    &nbsp;
		    </div>
			    <div class="col-sm-2">
			    	<button type="submit" name="submit" class="btn btn-default"><?php echo $button_text;?></button>
			    </div>
		  	</div>
			</form>
		<?php

?>