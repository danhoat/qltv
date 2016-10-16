<?php
	require_once("connect.php");
	require_once("require.php");
	$ma_docgia = $_POST['ma_docgia'];
	$docgia 	= TreEm::getInstance();
	$is_tre_em 	=  $docgia->isDocGiaTreEm($ma_docgia) ;
	if($is_tre_em){
		$ma_docgia = $docgia->maDocGiaNguoiLon($ma_docgia);
	}
	$nguoilon = NguoiLon::getInstance();
	$record = array();
	$record = $nguoilon->getThongTinDocGia($ma_docgia);
	header('Content-Type: application/json');
	echo json_encode($record);
die();
?>