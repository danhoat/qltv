<?php
	$error 		= '';
	$ma_tuasach = 0;
	$ngonngu 	= 0;
	$bia 		= '';
	$_isbn 		= isset($_GET['id']) ? $_GET['id'] : 0;
	$cDausach 	= DauSach::getInstance();
	$result_text = '';
	$label_text = 'Thêm đầu sách';
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
	if( $_isbn ){
		$record 		= $cDausach->getDauSach($_isbn);
		$ma_tuasach 	= $record['ma_tuasach'];
		$ngonngu 		= $record['ngonngu'];
		$bia 			= $record['bia'];
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
						echo '<div class="alert alert-info">';
                        echo $result_text;
                    	echo '</div>';
                	}
                ?>

				<form class="form-horizontal" action="" method="POST">
				  	<div class="form-group">
				    	<label class="control-label col-sm-2" for="email">Tựa sách</label>
				    	<div class="col-sm-10">
				      		<select class="form-control selectpicker" required name="ma_tuasach" data-live-search="true">

				      			<?php
					      			$result = TuaSach::list_tua_sach();
									if( !empty($result) ){ ?>
										<option value="0" <?php add_selected(0, $ma_tuasach);?> > Chọn tựa sách</option>';
										<?php
										while( $row = $result->fetch_assoc() ) {
											$_ma_tuasach = $row['ma_tuasach'];
											$selected = '';
											if($ma_tuasach == $_ma_tuasach){
												$selected = 'selected';
											}
											echo "<option {$selected} value='".$_ma_tuasach."'> ".$row['tuasach']."</option>";
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
				    	<?php list_ngon_ngu($ngonngu );?>
				    	</div>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Bìa </label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control required" required id="bia" name="bia" placeholder="Bìa cuốn sách" value="<?php echo $bia;?>">
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Trạng thái</label>
					    <div class="col-sm-10">
					    	<input type="radio" value="1" checked name="trangthai" > Có sẵn
					    	<input type="radio" value="0"  name="trangthai" > Chưa sẵn sàng
					    </div>
				  	</div>
				  	<?php
				  	if( !$_isbn ){?>
				  	<div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Số lượng sách</label>
					    <div class="col-sm-1">
					    	<input class="form-control" type="number" value="1" min="1" checked name="soluong" />
					    </div>
				  	</div>
				  	<?php } ?>
				  	<div class="form-group">
				    <div class="col-sm-10">
				    &nbsp;
				    </div>
					    <div class="col-sm-2">
					    	<button type="submit" name="submit" class="btn btn-default btn-primary pull-right">Lưu đầu sách</button>
					    </div>
				  	</div>
					</form>
            </div>
        </div>
    </div>
</div>