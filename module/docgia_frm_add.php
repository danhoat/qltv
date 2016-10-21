<?php
$error 			= '';
$label_text 	= '';
$label_text_fail = '';
$frm_nguoilon 	= '';
$frm_treem 	= 'hide';
$loai_docgia  	= isset($_POST['loai_docgia']) ? $_POST['loai_docgia'] : 1;
$label = '';
$error = '';
if(isset($_POST['submit'])){

	$docgia 		= DocGia::getInstance();
	$hoten 			= isset($_POST['hoten']) ? $_POST['hoten'] : '';
	$ngaysinh 		= isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
	if(empty($hoten) ) {
		$error .= 'Vui lòng nhập họ tên <br />';
	}
	if ( empty($ngaysinh) ){
		$error .= 'Vui lòng nhập ngày sinh <br />';
	} else {
		$date 		= date_create($ngaysinh);
		$ngaysinh 	= date_format($date,"Y-m-d H:i:s");
	}

	if( empty( $error) ){

		if( $ma_docgia){
			$ma_docgia 		= $docgia->themDocGia($hoten, $ngaysinh);
			$label = 'Thêm độc giả thành công';
		} else {
			$error .= 'Thêm độc giả lỗi <br />';
		}
	}
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý Độc Giả</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm Đọc Giả</h3>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <form action="#"  class="form-horizontal csf" method="POST" action="#">

					<?php if( !empty( $error ) ){
						echo '<div class="alert alert-danger">';
                        echo $error;
                    	echo '</div>';
					 } else if( !empty( $label ) ){
						echo '<div class="alert alert-danger">';
                        echo $label;
                    	echo '</div>';
					 } ?>?>



					<div class="form-group row">
					  <label for="example-text-input" class="col-xs-2 col-form-label">Họ tên</label>
					  <div class="col-xs-10">
					    <input class="form-control required" type="text" required name="hoten" value="" placeholder="Nhập họ tên độc giả" id="example-text-input">
					  </div>
					</div>
					<div class="form-group row">
					  <label for="example-tel-input" class="col-xs-2 col-form-label">Ngày sinh </label>
					  <div class="col-xs-10"  data-provide="datepicker">
					   <input class="form-control datepicker" data-format="yyyy-MM-dd hh:mm:ss" type="date" name="ngaysinh" id="ngaysinh" value="2016-12-16 00:00:00" >
					  </div>
					</div>
					<!-- <div class="form-group row">
					  <label for="example-tel-input" class="col-xs-2 col-form-label">Loại độc giả </label>
					  <div class="col-xs-10">
					    	<label for = "nguoilon" ><input class="loai-docgia" id = "nguoilon" type="radio" value="1" <?php if($loai_docgia != '2') echo 'checked';?> name="loai_docgia" > Người lớn </label>
					    	<label for = "treem" >
					    	<input <?php if($loai_docgia == '2') echo 'checked';?>  class = "loai-docgia" id = "treem" type="radio" value="2"  name="loai_docgia" >Trẻ em</label>
					  </div>
					</div> -->


					<div class="row-default">
						<div class ="nguoilon <?php echo $frm_nguoilon;?>">
							<div class="form-group row">
							  <label for="example-tel-input" class="col-xs-2 col-form-label">Địa chỉ</label>
							  <div class="col-xs-10">
							    <input class="form-control is_required required" type="text" value="" placeholder="Nhập địa chỉ" name="diachi" id="example-text-input">
							  </div>
							</div>

							<div class="form-group row">
							  <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Quận</label>
							  <div class="col-xs-10">
							    <?php danhSachQuan();?>
							  </div>
							</div>
							<div class="form-group row">
							  <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Điện thoại</label>
							  <div class="col-xs-10">
							    <input class="form-control " type="text"  name="dienthoai" placeholder="Nhập điện thoại" />
							  </div>
							</div>

							<div class="form-group row">
							  <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Hạn sử dụng</label>
							  <div class="col-xs-10" >
							    <input class="form-control datepicker" data-format="yyyy-MM-dd hh:mm:ss" type="date" name="han_sd" id="han_sd" value="2016-12-16 00:00:00" >
							  </div>
							</div>
						</div>
						<div class="treem <?php echo $frm_treem;?>">
							<div class="form-group row">
							  <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Mã người lớn</label>
							  <div class="col-xs-10">
							     <?php danhSachNguoiLon();?>
							  </div>
							</div>
						</div>

					</div>
					<div class="form-group row">
					  <div class="col-xs-10">
					  &nbsp;
					  </div>
					  <div class="col-xs-2 col-right">
					  		<input type="hidden" name="submit" value="1">
					    	<button type="submit" class="btn btn-primary pull-right"> Thêm mới</button>
					  </div>
					</div>

					</form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(function() {
	    $(".loai-docgia").click(function(event){
	    	var is_check = this.checked;
	    	var id = $(this).attr('id');
	    	if(id == 'treem'){
	    		$(".treem").removeClass('hide');
	    		$(".nguoilon").addClass('hide');
	    		$(".nguoilon").find(".is_required").removeClass("required");
	    	} else {
	    		$(".nguoilon").removeClass('hide');
	    		$(".treem").addClass('hide');
	    	}

	    })
	});
</script>