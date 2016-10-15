<?php
$ma_docgia = isset($_GET['id']) ? $_GET['id'] : 0;
$docgia = TreEm::getInstance();
echo "Mã độc giả : {$ma_docgia}";
if( $docgia->isDocGiaTreEm($ma_docgia) ) {
	echo 'Loại độc giả: Trẻ em';
	$record = $docgia->getThongTinDocGia($ma_docgia);
	echo 'Thông tin độc giả người lớn :';

} else {

	$nguoilon = NguoiLon::getInstance();
	$record = $nguoilon->getThongTinDocGia($ma_docgia);
}
echo 'Họ tên :'.$record['hoten'];
echo 'Địa chỉ:'.$record['diachi'];
echo 'Ngày sinh:'.$record['ngaysinh'];
echo 'Quận:'.$record['quan'];

?>


