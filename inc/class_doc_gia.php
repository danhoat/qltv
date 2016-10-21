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
				$han_sd 			= $row['han_sd'] ;
				$row['con_hsd'] 	= ($han_sd < date("Y-m-d")) ? 0 : 1;
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
	function themDocGia($hoten,$ngaysinh,$massv, $diachi,$han_sd,$dienthoai,$ngay_dk ){
		// INSERT INTO `docgia` (`ma_docgia`, `hoten`, `ngaysinh`, `massv`, `diachi`, `han_sd`, `dienthoai`, `ngay_dk`) VALUES (NULL, '666', '2016-10-21', '6666', '6666', '2016-10-21', '6666', '2016-10-14');

		$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `hoten`, `ngaysinh`, `massv`, `diachi`, `han_sd`, `dienthoai`, `ngay_dk`) VALUES (NULL, '{$hoten}', '{$ngaysinh}', '{$massv}', '{$diachi}', '{$han_sd}', '{$dienthoai}', '{$ngay_dk}')";
		//echo $sql;
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

 }