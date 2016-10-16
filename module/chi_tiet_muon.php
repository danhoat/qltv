<?php
	$ma_cuonsach = isset($_GET['mcs']) ? $_GET['mcs'] : 0;
	$isbn = isset($_GET['isbn']) ? $_GET['isbn'] : 0;

	$muon = Muon::getInstance()->chiTietMuonSach($ma_cuonsach, $isbn);
	// echo '<pre>';
	// var_dump($muon);
	// echo '</pre>';
?>

<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Tên Cuốn sách</label>
  	<div class="col-xs-6">
  		<?php echo $muon['bia'] ;?>
  	</div>
</div>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Ngày mượn</label>
  	<div class="col-xs-6">
  		<?php echo $muon['ngaygio_muon'] ;?>
  	</div>
</div>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Ngày hết hạn</label>
  	<div class="col-xs-6">
  		<?php echo $muon['ngay_hethan'];?>
  	</div>
</div>
<div class="form-group row">
  	<label for="example-tel-input" class="col-xs-4 col-form-label">Tên Cuốn sách</label>
  	<div class="col-xs-6">

  	</div>
</div>

