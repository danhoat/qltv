<?php
Class DocGia{
	protected $ma_docgia;
	protected $ho;
	protected $tenLot;
	protected $ten;
	protected $ngaySinh;
	protected $table;
	protected $con;
	static $instance;
	function __construct(){
		global $conn;
		$this->table = 'docgia';
		$this->conn = $conn;
	}
	//function getThongTinDocGia(){}
	function getThongTinDocGia($ma_docgia){
		$sql ="SELECT * FROM  docgia WHERE ma_docgia = {$ma_docgia}";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				$row['so_sachdangmuon'] = soSachDangMuon($ma_docgia);
				return $row;
			}
		return 0;
	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new DocGia();
        return self::$instance;
    }
	function themDocGia($hoten,$ngaysinh ){
		$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `hoten`, `ngaysinh`) VALUES (NULL, '{$hoten}', '{$ngaysinh}')";
		if($this->conn->query($sql)){
			return $this->conn->insert_id;
		}
	}
	function xoaDocGia($ma_docgia){
		$sql = "DELETE FROM {$this->table} WHERE ma_docgia= {$ma_docgia}";
		return $this->conn->query($sql);
	}
	function getTenDocGia($ma_docgia){
		$sql ="SELECT hoten FROM  $this->table WHERE ma_docgia = {$ma_docgia}";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				return $row['hoten'];
			}
		return 0;
	}
	public static function danhSachDocGia($select_all = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM docgia";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				return $result;
			}
			return 0;
		} else {
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM docgia LIMIT {$posts_per_age} OFFSET {$offset}";

			$result = $conn->query($sql);
			if ($result && $result->num_rows > 0) {
				return $result;
			}
			return 0;
		}
	}
	function soSachDangMuon($ma_docgia){
    	$sql 	= "SELECT count(*) FROM muon WHERE ma_docgia ='{$ma_docgia}'";
   		$result = $this->conn->query($sql);
   		if ($result && $result->num_rows > 0) {
			$row = mysqli_fetch_row($result);
			return $row[0];
		}
		return 0;
    }
    function conHanSuDung($ma_docgia){
  //   	$sql = "SELECT * FROM docgia WHERE ma_docgia = '{$ma_docgia' AND han_sd >= cast((now()) as date) ";
  //   	$result = $this->conn->query($sql);
  //  		if ($result && $result->num_rows > 0) {
		// 	return 0;
		// }
		// return 1;
    }
}
class TreEm extends DocGia{
	protected $ma_docgia;
	protected $ma_docgia_nguoilon;
	static $instance;
	function __construct(){
		parent::__construct();
		$this->table = 'treem';
	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new TreEm();
        return self::$instance;
    }
    function themDocGia($ma_docgia,$ma_docgia_nguoilon ){
    	//INSERT INTO `treem` (`ma_docgia`, `ma_nguoilon`) VALUES ('66', '666');
		$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `ma_docgia_nguoilon`) VALUES ('{$ma_docgia}', '{$ma_docgia_nguoilon}')";
		if($this->conn->query($sql)){
			return $this->conn->insert_id;
		}
		return 0;
	}

    function isDocGiaTreEm($ma_docgia){
    	$sql ="SELECT * FROM  $this->table WHERE ma_docgia = '{$ma_docgia}' LIMIT 1";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				return 1;
			}
		return 0;
    }
	function getThongTinDocGia($ma_docgia){
		$ma_docgia_nguoilon = $this->maDocGiaNguoiLon($ma_docgia);
		$row = array();
		$record  = parent::getThongTinDocGia($ma_docgia);
		if($record){
			$record['ma_docgia_nguoilon'] = $ma_docgia_nguoilon;
			return $record;
		}
		return $row;

	}
	function maDocGiaNguoiLon($ma_docgia){
		$sql ="SELECT ma_docgia_nguoilon FROM  $this->table WHERE ma_docgia = {$ma_docgia}";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				return $row['ma_docgia_nguoilon'];
			}
		return 0;
	}

}

class NguoiLon extends DocGia {
	protected $ma_docgia;
	protected $sonha;
	protected $duong;
	protected $quan;
	protected $dienthoai;
	protected $han_sd;
	static $instance;
	protected $docgia;
	protected $table;
	public function __construct(){
		parent::__construct();
		$this->docgia = NULL;
		$this->table = 'nguoilon';

	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new NguoiLon();
        return self::$instance;
    }
    function themNguoiLon($ma_docgia = 0, $args){
    	//INSERT INTO `docgia` (`ma_docgia`, `ho`, `tenlot`, `ten`, `ngaysinh`) VALUES (NULL, 'Nguyễn', 'Gia', 'Dần', '2016-10-13 00:00:00');
    	$ho 		= isset($args['ho']) ? $args['ho'] : '';
    	$tenlot 	= isset($args['tenlot']) ? $args['tenlot'] : '';
    	$ten 		= isset($args['ten']) ? $args['ten'] : '';
    	$ngaysinh 	= isset($args['ngaysinh']) ? $args['ngaysinh'] : '';
		$sonha 		= isset($args['sonha']) ? $args['sonha'] : '';
		$diachi 		= isset($args['diachi']) ? $args['diachi'] : '';
    	$duong 		= isset($args['duong']) ? $args['duong'] : '';
    	$quan 		= isset($args['quan']) ? $args['quan'] : '';
    	$dienthoai 	= isset($args['dienthoai']) ? $args['dienthoai'] : '';
    	$han_sd 	= isset($args['han_sd']) ? $args['han_sd'] : '';
    	$hoten 		= isset($args['hoten']) ? $args['hoten'] : '';

    	//INSERT INTO `nguoilon` (`ma_docgia`, `sonha`, `duong`, `quan`, `dienthoai`, `han_sd`) VALUES (NULL, '17 ', 'Trần Mai Anh', '1', '0988585858', '2016-12-16 00:00:00');
    	//INSERT INTO `nguoilon` (`ma_docgia`, `diachi`, `quan`, `dienthoai`, `han_sd`) VALUES ('333', '333', '33', '33', '2016-10-15 00:00:00');
    	$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `diachi`,  `quan`, `dienthoai`, `han_sd`) VALUES ('{$ma_docgia}', '{$diachi}', '{$quan}', '{$dienthoai}', '{$han_sd}')";
    	if($this->conn->query($sql)){
			return $this->conn->insert_id;
		}
		return 0;
    }
    function getThongTinDocGia($ma_docgia){

		$record = parent::getThongTinDocGia($ma_docgia);
		if($record){
			$sql = "SELECT * FROM {$this->table}  WHERE ma_docgia = {$ma_docgia}";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				$record['diachi'] 		=  $row['diachi'];
				$record['quan'] 		=  $row['quan'];
				$record['dienthoai'] 	=  $row['dienthoai'];
				$record['han_sd'] 		=  $row['han_sd'];
				$ngay_hh 				= date_create($row['han_sd']);
				$ngay_hh 				= date_format($ngay_hh,"Y-m-d");
				$now 					= date('Y-m-d', time() );
				$record['con_hsd'] 		= ($ngay_hh < $now) ? 0 : 1;
				return $record;
			}

		}
		return $record;

	}

}