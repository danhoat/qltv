<?php
	$ma_cuonsach = isset($_GET['mcs']) ? $_GET['mcs'] : 0;
	$isbn = isset($_GET['isbn']) ? $_GET['isbn'] : 0;
  if( !$isbn ){
    $isbn =CuonSach::getInstance()->getISBN($ma_cuonsach);
  }
	$muon = Muon::getInstance()->chiTietMuonSach($ma_cuonsach, $isbn);
  // echo '<pre>';
  // var_dump($muon);
  // echo '</pre>';

  $ma_docgia  = $muon['ma_docgia'];
  $docgia     = DocGia::getInstance()->getThongTinDocGia($ma_docgia);

?>
<div class="form-group row">
    <h3 class="col-xs-12 col-form-label"> Chi tiết mượn sách</h3>
</div>
<div class="form-group row">
    <label for="example-tel-input" class="col-xs-4 col-form-label">Độc giả mượn</label>
    <div class="col-xs-6">
      <?php echo $docgia['hoten'] ;?><a href="index.php?act=chi_tiet_docgia&id=<?php echo $ma_docgia;?>"> Chi tiết</a>
    </div>
</div>
<div class="form-group row">
    <label for="example-tel-input" class="col-xs-4 col-form-label">Số sách đang mượn</label>
    <div class="col-xs-3">
      <?php echo soSachDangMuon($ma_docgia);?>
    </div>

</div>

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
    <label for="example-tel-input" class="col-xs-4 col-form-label">Đầu sách</label>
    <div class="col-xs-6">
      <?php
      $dausach = DauSach::getInstance()->getDauSach($isbn);
      echo $dausach['bia'] ;
      ?>
    </div>
</div>
<div class="form-group row">
    <label for="example-tel-input" class="col-xs-4 col-form-label">&nbsp; </label>
    <div class="col-xs-3">
      <a class="btn" href ="index.php?act=chi_tiet_muon&mcs=<?php echo $ma_cuonsach;?>&isbn=<?php echo $isbn;?>&trasach=1"> Trả cuốn sách này </a>
    </div>

</div>
