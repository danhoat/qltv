<?php
	require_once("connect.php");
	require_once("require.php");

	header('Content-Type: application/json');
	$act = isset($_POST['act']) ? $_POST['act'] : '';
	var_dump($act);
	if( $act == 'kiemtradocgia' ){
		$ma_docgia 	= $_POST['ma_docgia'];
		$docgia 	= TreEm::getInstance();
		$is_tre_em 	=  $docgia->isDocGiaTreEm($ma_docgia) ;
		if($is_tre_em){
			$ma_docgia = $docgia->maDocGiaNguoiLon($ma_docgia);
		}
		$nguoilon = NguoiLon::getInstance();
		$record = array();
		$record = $nguoilon->getThongTinDocGia($ma_docgia);

		echo json_encode($record);
	} else if( $act == 'kiemtrasach') {
		$ma_cuonsach = $_POST['ma_cuonsach'];
		$cuonsach 	= CuonSach::getInstance();
		$record 	= array();
		$record 	= $cuonsach->getThongTinCuonSach($ma_docgia);
	}
die();
?>