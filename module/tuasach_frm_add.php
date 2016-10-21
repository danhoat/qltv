<?php
	$error = '';
	$button_text = 'Lưu tựa sách';
	$label_text = 'Thêm tựa sách';
	$is_update = 0;
	$tuasach = '';
	$tacgia = '';
	$ma_tuasach = 0;
	$tomtat = '';

	$_ma_tuasach = isset($_GET['id']) ? $_GET['id'] : 0;
	$obt_tuasach =TuaSach::getInstance();

	if( isset($_POST['submit']) ){
		$request 	= $_POST;
		$c_tuasach 	= isset($_POST['tuasach']) ? $_POST['tuasach'] :'';
		$c_tacgia 	= isset($_POST['tacgia']) ? $_POST['tacgia'] :'';
		$c_tomtat 	= isset($_POST['tomtat']) ? $_POST['tomtat'] :'';
		$ma_tuasach = isset($_POST['ma_tuasach']) ? $_POST['ma_tuasach'] :'';

		if( empty($c_tuasach) ){
			$error .= ' <p>Vui lòng nhập tựa sách </p>';
		}
		if( empty($c_tacgia) ){
			$error .= ' <p>Vui lòng nhập tác giả</p>';
		}
		if( empty($c_tomtat) ){
			$error .= ' <p>Vui lòng nhập tóm tắt cuốn sách </p>';
		}
		if( empty($error) ){

			if( $ma_tuasach){
				// update tua sach
				$kq = $obt_tuasach->capNhatTuaSach($ma_tuasach, $c_tuasach, $c_tacgia, $c_tomtat);
				if($kq == TRUE){
					$success =  'Cập nhật tựa sách thành công';
				} else {
					$error =  'Cập nhật tựa sách lỗi';
				}
			} else {
				// them moi tua sach
				$kq = $obt_tuasach->themTuaSach($c_tuasach, $c_tacgia, $c_tomtat);
				if($kq == TRUE){
					$success =  'Thêm tựa sách thành công';

				} else {
					$error = 'Thêm tựa sách lỗi';
				}
			}
		}
	}

	if( $_ma_tuasach ){

		$record 		= $obt_tuasach->getTuaSach($_ma_tuasach);
		$tuasach 		= $record['tuasach'];
		$tacgia 		= $record['tacgia'];
		$tomtat 		= $record['tomtat'];
		$button_text 	= 'Cập nhật';
		$label_text 	= 'Cập nhật tựa sách';
		$is_update 		= 1;
	}
	?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý tựa sách</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $label_text;?></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php
                        	if(isset($error) && $error != "")
                        	{
								echo '<div class="alert alert-danger">';
                                echo $error;
                            	echo '</div>';
                        	}
                        	if(isset($success) && $success != "") {
								echo '<div class="alert alert-success">';
                                echo $success;
                            	echo '</div>';
                        	}
                        ?>
                        		<form class="form-horizontal" action="" method="POST">
									<div class="form-group form-error">
										<label class="control-label col-sm-2" for="email">&nbsp;</label>
								    	<div class="col-sm-10">
								      		
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
									      	<textarea class="form-control" name="tomtat" id="tomtat" rows="10"> <?php echo $tomtat;?></textarea>
									      	<input type="hidden" name="ma_tuasach" value="<?php echo $_ma_tuasach;?>">
									    </div>
								  	</div>
								  	<div class="form-group">
								    <div class="col-sm-10">
								    &nbsp;
								    </div>
									    <div class="col-sm-2">
									    	<button type="submit" name="submit" class="btn btn-primary pull-right"><?php echo $button_text;?></button>
									    </div>
								  	</div>
								</form>
                        </div>
                    </div>	
                </div>
            </div>
        </div>