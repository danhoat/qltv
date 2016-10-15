<?php
$ma_docgia = isset($_GET['id']) ? $_GET['id'] : 0;
$docgia = TreEm::getInstance();
echo "Mã độc giả : {$ma_docgia}".'<br />';
$is_tre_em =  $docgia->isDocGiaTreEm($ma_docgia) ;

if( $is_tre_em ) {
	echo 'Loại độc giả: Trẻ em <br />';
	$record = $docgia->getThongTinDocGia($ma_docgia);
	echo 'Thông tin độc giả người lớn : <br />';
	$ma_docgia = $docgia->maDocGiaNguoiLon($ma_docgia);
}
$nguoilon = NguoiLon::getInstance();
$record = $nguoilon->getThongTinDocGia($ma_docgia);


if(!$is_tre_em){
	echo 'Loại độc giả: Người lớn <br />';
}
$diachi = !empty($record['diachi']) ? $record['diachi'] : 'Chưa có địa chỉ';
$hoten = !empty($record['hoten']) ? $record['hoten'] : 'Chưa nhập họ tên';
$quan = !empty($record['quan']) ? $record['quan'] : 'Chưa nhập quận';
$ngaysinh = !empty($record['ngaysinh']) ? $record['ngaysinh'] : 'Chưa nhập ngày sinh';
$han_sd = !empty($record['han_sd']) ? $record['han_sd'] : 'Chưa nhập ngày sinh';

echo 'Họ tên :'.$hoten .'<br />';
echo 'Địa chỉ:'.$diachi.'<br />';
echo 'Ngày sinh:'.$ngaysinh.'<br />';
echo 'Hạn sử dụng:'.$han_sd.'<br />';
echo 'Quận:'.$quan.'<br />';
echo 'Số sách đang mượn';

?>


