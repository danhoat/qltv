<?php
	require_once("connect.php");
	require_once("require.php");

	header('Content-Type: application/json');
	$act = isset($_POST['act']) ? $_POST['act'] : '';

	if( $act == 'kiemtradocgia' ){
		$ma_docgia 	= $_POST['ma_docgia'];
		$nguoilon 	= NguoiLon::getInstance();
		$record 	= $nguoilon->getThongTinDocGia($ma_docgia);

		if($record){
			$record['success'] = true;
			$record['duocphep_muon'] = 0;
			$record['muon_status']  = 'Thẻ không hợp lệ';
			$sl = soSachDangMuon($ma_docgia);
			if( $record['con_hsd'] && $sl <= 4){
				$record['duocphep_muon'] = 1;
				$record['muon_status']  = 'Thẻ hợp lệ';
			} else if( !$record['con_hsd'] ){
				$record['muon_status']  = 'Thẻ đã hết hạn sử dụng';
			} else  if( $sl > 4){
				$record['muon_status']  = 'Đã mượn quá số lượng sách cho phép';
			}
		} else {
			$record = array('success' => false, 'msg'=> 'Không tồn tại độc giả có mã '.$ma_docgia);
		}
	} else if( $act == 'kiemtrasach') {
		$ma_cuonsach = $_POST['ma_cuonsach'];
		$record 	= CuonSach::getInstance()->getThongTinCuonSach($ma_cuonsach);
		if($record){
			$tt_text = ($record['tinhtrang'] == '1')  ? 'Được phép mượn.' : 'Đang được mượn, vui lòng chọn cuốn khác <a target="_blank" href="index.php?act=chi_tiet_muon&mcs='.$ma_cuonsach.'">Chi tiết mượn</a>';

			$record['tt_text'] = $tt_text;
			$record['success'] = true;

		} else {
			$record = array('success' => false, 'msg' => 'Không tồn tại cuốn sách có mã '.$ma_cuonsach);
		}
	}
	echo json_encode($record);
die();
?>