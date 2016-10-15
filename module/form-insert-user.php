<?php
if(isset($_POST['submit'])){
	$docgia = NguoiLon::getInstance();
	$result = $docgia->themNguoiLon($_POST);
	if($result){
		echo ' Thêm người dùng thành công';
	}
}
?>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thêm Độc giả</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thêm Độc giả trẻ em</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<form action="#"  class="form-horizontal" method="POST" action="#">
	<div class="form-group row">
	  <label for="example-text-input" class="col-xs-2 col-form-label">Họ</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" name="ho" value="" placeholder="Nhập họ của bạn" id="example-text-input">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-tel-input" class="col-xs-2 col-form-label">Tên lót</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" value="" name="tenlot" placeholder="nhập tên lót" id="example-text-input">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-tel-input" class="col-xs-2 col-form-label">Tên </label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" value="" placeholder="nhập tên" name="ten" id="example-text-input">
	  </div>
	</div>
	<div class="form-group row">
	  <label for="example-tel-input" class="col-xs-2 col-form-label">Ngày sinh </label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" value="2016-10-13 00:00:0" name="ngaysinh" id="example-text-input">
	  </div>
	</div>
	<div class="form-group row">
	  <label for="example-tel-input" class="col-xs-2 col-form-label">Loại độc giả </label>
	  <div class="col-xs-10">
	    	<input type="radio" value="1" checked name="loai_docgia" > Người lớn
	    	<input type="radio" value="0"  name="loai_docgia" >Trẻ em
	  </div>
	</div>


	<div class="row-default">
		<div class="form-group row">
		  <label for="example-tel-input" class="col-xs-2 col-form-label">Địa chỉ</label>
		  <div class="col-xs-10">
		    <input class="form-control" type="text" value="" placeholder="Nhập địa chỉ" name="diachi" id="example-text-input">
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
		    <input class="form-control" type="text" name="dienthoai" placeholder="Nhập điện thoại" />
		  </div>
		</div>

		<div class="form-group row">
		  <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Hạn sử dụng</label>
		  <div class="col-xs-10">
		    <input class="form-control" type="text" name="han_sd" value="2016-12-16 00:00:00" >
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

