<?php
	require_once("connect.php");
	require_once("require.php");

	header('Content-Type: application/json');
	$act = isset($_POST['act']) ? $_POST['act'] : '';
	if( $act == 'kiemtradocgia' ){
		$ma_docgia 	= $_POST['ma_docgia'];
		$docgia 	= TreEm::getInstance();
		$is_tre_em 	=  $docgia->isDocGiaTreEm($ma_docgia) ;
		if($is_tre_em){
			$ma_docgia = $docgia->maDocGiaNguoiLon($ma_docgia);
		}
		$nguoilon 	= NguoiLon::getInstance();
		$record 	= array();
		$record 	= $nguoilon->getThongTinDocGia($ma_docgia);
		$record['duocphep_muon'] = 0;
		$record['muon_status']  = 'Thẻ không hợp lệ';
		$sl = soSachDangMuon($ma_docgia);
		if( $record['con_hsd'] && $sl <= 4){
			$record['duocphep_muon'] = 1;
			$record['muon_status']  = 'Thẻ hợp lệ';
		} else if( !$record['con_hsd'] ){
			$record['muon_status']  = 'Hết hạn sử dụng';
		} else  if( $sl > 4){
			$record['muon_status']  = 'Đã mượn quá số lượng sách cho phép';
		}
	} else if( $act == 'kiemtrasach') {
		$ma_cuonsach = $_POST['ma_cuonsach'];
		$record 	= CuonSach::getInstance()->getThongTinCuonSach($ma_cuonsach);
		$tt_text = ($record['tinhtrang'] == '1')  ? 'Được phép mượn.' : 'Đang được mượn, vui lòng chọn cuốn khác <a target="_blank" href="index.php?act=chi_tiet_muon&mcs='.$ma_cuonsach.'">Chi tiết mượn</a>';
		if( $record){
			$record['tt_text'] = $tt_text;
		}
	}
	echo json_encode($record);
die();
?>