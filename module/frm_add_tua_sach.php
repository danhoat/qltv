<?php
	$error = '';

	if( isset($_POST['submit']) ){

		$request 	= $_POST;
		$tuasach 	= isset($_POST['tuasach']) ? $_POST['tuasach'] :'';
		$tacgia 	= isset($_POST['tacgia']) ? $_POST['tacgia'] :'';
		$tomtat 	= isset($_POST['tomtat']) ? $_POST['tomtat'] :'';

		if( empty($tuasach) ){
			$error .= ' Vui lòng nhập tựa sách <br />';
		}
		if( empty($tacgia) ){
			$error .= ' Vui lòng nhập tác giả <br />';
		}
		if( empty($tomtat) ){
			$error .= ' Vui lòng nhập tóm tắt cuốn sách <br />';
		}
		if(empty($error)){
			$cTuasach = new Tua_Sach();
			$kq = $cTuasach->them_tua_sach($tuasach, $tacgia, $tomtat);
		}
	}
	?>
		<form class="form-horizontal" action="" method="POST">
			<h3> Thêm tựa sách</h3>
			<div class="form-group form-error">
				<label class="control-label col-sm-2" for="email">&nbsp;</label>
		    	<div class="col-sm-10">
		      		<?php echo $error; ?>
		    	</div>

			</div>

		  	<div class="form-group">
		    	<label class="control-label col-sm-2" for="email">Tựa sách</label>
		    	<div class="col-sm-10">
		      		<input type="tuasach" class="form-control" name="tuasach" id="tuasach" placeholder="Nhập tựa sách">
		    	</div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Tác giả</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="tacgia" name="tacgia" placeholder="Tên tác giả">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Tóm tắt</label>
			    <div class="col-sm-10">
			      	<textarea name="tomtat" id="tomtat"></textarea>
			    </div>
		  	</div>
		  	<div class="form-group">
		    <div class="col-sm-10">
		    &nbsp;
		    </div>
			    <div class="col-sm-2">
			    	<button type="submit" name="submit" class="btn btn-default">Lưu tựa sách</button>
			    </div>
		  	</div>
			</form>
		<?php

?>