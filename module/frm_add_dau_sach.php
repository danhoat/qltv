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
		      		<select class="form-control selectpicker" name="ma_tuasach" data-live-search="true">
		      			<option value="0"> Chọn tựa sách</option>
		      			<option value="1"> Cuốn sách 1</option>
		      			<option value="2"> Cuốn sách 2</option>
		      		</select>
		    	</div>
		  	</div>

		  		<div class="form-group">
		    	<label class="control-label col-sm-2" for="email">Ngôn ngữ</label>
		    	<div class="col-sm-10">
		      		<select class="form-control" name="ma_tuasach">
		      			<option value="0"> Chọn tựa sách</option>
		      			<option value="1"> Anh</option>
		      			<option value="1"> Pháp </option>
		      			<option value="1"> Việt</option>

		      		</select>
		    	</div>
		  	</div>

		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Bìa </label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="tacgia" name="tacgia" placeholder="Tên tác giả">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">Trạng thái</label>
			    <div class="col-sm-10">
			    	<input type="radio" value="0" checked name="trangthai" > đang mượn
			    	<input type="radio" value="1" name="trangthai" > đang rãnh
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