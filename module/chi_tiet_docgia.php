<div id="page-wrapper">
<?php
$ma_docgia = isset($_GET['id']) ? $_GET['id'] : 0;
$dociga 		= DocGia::getInstance();
$record 		= $dociga->getThongTinDocGia($ma_docgia);

$diachi 		= !empty($record['diachi']) ? $record['diachi'] : 'Chưa có địa chỉ';
$hoten 			= !empty($record['hoten']) ? $record['hoten'] : 'Chưa nhập họ tên';
$quan 			= !empty($record['quan']) ? $record['quan'] : 'Chưa nhập quận';
$ngaysinh 		= !empty($record['ngaysinh']) ? $record['ngaysinh'] : 'Chưa nhập ngày sinh';
$han_sd 		= !empty($record['han_sd']) ? $record['han_sd'] : 'Chưa nhập ngày sinh';
$massv 			= !empty($record['massv']) ? $record['massv'] : '';

$con_hsd 		= $record['con_hsd'];
$han_sd_text  	= ($con_hsd  == '1') ? 'Còn hạn sử dụng' :'<span class="error"> Hết hạn sử dụng </span>';
?>
<div class="form-group row">
	<div class ="col-xs-12">
  		<h3> Thông tin độc giả </h3>
  	</div>
</div>

<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Tên độc giả</label>
  	<div class="col-xs-6">
  		<?php echo $hoten;?>
  	</div>
</div>
<?php if(!empty($massv)){ ?>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Mã sinh viên</label>
  	<div class="col-xs-6">
  		<?php echo $massv;?>
  	</div>
</div>
<?php } ?>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Địa chỉ</label>
  	<div class="col-xs-6">
  		<?php echo $diachi;?>
  	</div>
</div>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Ngày sinh</label>
  	<div class="col-xs-6">
  		<?php echo $ngaysinh;?>
  	</div>
</div>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Ngày hết hạn</label>
  	<div class="col-xs-6">
  		<?php echo $han_sd;?>
  	</div>
</div>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Tình Trạng</label>
  	<div class="col-xs-6">
  		<?php echo $han_sd_text;?>
  	</div>
</div>

<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Địa chỉ</label>
  	<div class="col-xs-6">
  		<?php echo $diachi;?>
  	</div>
</div>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Số sách đang mượn</label>
  	<div class="col-xs-6">
  		<?php echo soSachDangMuon($ma_docgia);?>
  	</div>
</div>
<style type="text/css">
	.form-group{
		margin-bottom: 5px;
	}
</style>
<?php
	if( soSachDangMuon($ma_docgia) ){
		$list = Muon::getInstance()->muonByDocGia($ma_docgia);
		if($list){
			echo '<table class="table">';
			echo '<thead><th> Bìa </th><th>Ngày mượn</th><th>Ngày trả</th><th> Chi tiết</th></thead>';
			while( $row = $list->fetch_assoc() ) {
				echo '<tr>';
				echo '<td>' . $row['bia'] .'</td>';
				echo '<td>' . $row['ngaygio_muon'] .'</td>';
				echo '<td>' . $row['ngay_hethan'] .'</td>';
				echo '<td>';
				echo "<a href='index.php?act=chi_tiet_muon&mcs={$row['ma_cuonsach']}'>Chi tiết</a>";
				echo '</td>';
			}
			echo '</table>';
		}
	}

?>
</div>