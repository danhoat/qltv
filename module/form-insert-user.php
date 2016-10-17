<?php
$error 			= '';
$label_text 	= '';
$label_text_fail = '';
$frm_nguoilon 	= '';
$frm_treem 	= 'hide';
$loai_docgia  	= isset($_POST['loai_docgia']) ? $_POST['loai_docgia'] : 1;

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
		$ma_docgia 		= $docgia->themDocGia($hoten, $ngaysinh);
		if( $ma_docgia){
			if( $loai_docgia == 2 ){
				$frm_nguoilon 		= 'hide';
				$frm_treem 			= '';
				$ma_docgia_nguoilon = isset($_POST['ma_docgia_nguoilon']) ? $_POST['ma_docgia_nguoilon'] : 0;

				if( ! $ma_docgia_nguoilon ){
					$error = 'Vui lòng chọn mã người lớn';
				}
				if( empty($error) ){
					$docgia = TreEm::getInstance();
					$result = $docgia->themDocGia($ma_docgia, $ma_docgia_nguoilon);
					if( isCustomError($result) ){
						$error = $result->getMessage();
					} else {
						$label_text = 'Thêm độc giả trẻ em thành công';
					}
				} else {
					$label_text_fail .= ' Thêm độc giả trẻ em lỗi';
				}

			} else{
				$docgia = NguoiLon::getInstance();
				$result = $docgia->themNguoiLon($ma_docgia, $_POST);
				if( $result ){
					$label_text  .= ' Thêm độc giả người lớn thành công';
				}
			}
		} else {
			$error .= 'Thêm độc giả lỗi <br />';
		}
	}
}

?>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm Độc giả</a></li>
</ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<form action="#"  class="form-horizontal csf" method="POST" action="#">

	<?php if( !empty( $error ) ){ ?>
		<div class="form-group row error">
		  <label for="example-tel-input" class="col-xs-2 col-form-label">Lỗi:</label>
		  <div class="col-xs-10">
		    <?php echo $error;?>
		  </div>
		</div>
	<?php } ?>

	<?php if( !empty( $label_text ) ){ ?>
		<div class="form-group row">
		  <label for="example-tel-input" class="col-xs-2 col-form-label">Thông báo:</label>
		  <div class="col-xs-10">
		    <?php echo $label_text;?>
		  </div>
		</div>
	<?php } ?>


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
	<div class="form-group row">
	  <label for="example-tel-input" class="col-xs-2 col-form-label">Loại độc giả </label>
	  <div class="col-xs-10">
	    	<label for = "nguoilon" ><input class="loai-docgia" id = "nguoilon" type="radio" value="1" <?php if($loai_docgia != '2') echo 'checked';?> name="loai_docgia" > Người lớn </label>
	    	<label for = "treem" >
	    	<input <?php if($loai_docgia == '2') echo 'checked';?>  class = "loai-docgia" id = "treem" type="radio" value="2"  name="loai_docgia" >Trẻ em</label>
	  </div>
	</div>


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
	  <div class="col-xs-2">
	  		<input type="hidden" name="submit" value="1">
	    	<button type="submit" class="btn btn-default btn-md"> Thêm mới</button>
	  </div>
	</div>

</form>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    	Thêm người dùng trẻ em
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