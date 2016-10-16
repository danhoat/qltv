<?php
Class DauSach{
	protected $conn;
	protected $isbn;
	protected $ma_tuasach;
	protected $ngonngu;
	protected $bia;
	protected $trangthai;
	static $instance;
	function __construct() {
		global $conn;
		$this->conn 	= $conn;
		$this->table 	= 'dausach';
	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new DauSach();
        return self::$instance;
    }
    function getDauSach($isbn){
		$result = $this->kiemTraDauSachTonTai($isbn);
		if( $result ){
			while( $row = $result->fetch_assoc() ) {
				return $row;
			}
		}
		return 0;
	}

	function kiemTraDauSachTonTai($isbn){
		$sql ="SELECT * FROM {$this->table} WHERE isbn = {$isbn} ";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0) {
			return $result;
		}
		return 0;
	}
	function kiemTraTrangThaiDauDach($isbn){
		$sql ="SELECT * FROM {$this->table} WHERE isbn = {$isbn} AND trangthai = '1' ";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0) {
			return 1;
		}
		return 0;
	}
	function kiemTraTrangThaiDauDachByISBN($isbn){
		$sql ="SELECT * FROM {$this->table} WHERE isbn = {$isbn} AND trangthai ='1' ";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0) {
			return 1;
		}
		return 0;
	}
	function getMaCuonSach($isbn){
		$sql ="SELECT ma_cuonsach FROM cuonsach WHERE isbn = {$isbn} AND tinhtrang = '1' ";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0) {
			while( $row = $result->fetch_assoc() ) {
				return $row['ma_cuonsach'];
			}
		}
		return 0;
	}
	function themDauSach($ma_tuasach, $ngonngu, $bia, $trangthai = 1 ) {
		$isbn =  $this->kiemTraDauSach( $ma_tuasach, $ngonngu);
		if ( !$isbn ){
			// chua ton tai dau dau sach nay
			// Add new dau sach
			$sql ="INSERT INTO `{$this->table}` (`isbn`, `ma_tuasach`, `ngonngu`, `bia`, `trangthai`) VALUES (NULL, '{$ma_tuasach}', '{$ngonngu}', '{$bia}', '{$trangthai}')";
			if($this->conn->query($sql)){
				return $this->conn->insert_id;
			}
		} else {
			$this->capNhatDauSach($isbn, $ma_tuasach, $ngonngu, $bia, $trangthai = 1);
		}
		return $isbn;
	}

	function capNhatDauSach($isbn, $ma_tuasach, $ngonngu, $bia, $trangthai = 1 ) {
		$sql = "UPDATE `{$this->table}` SET ma_tuasach = '{$ma_tuasach}',ngonngu = '{$ngonngu}', bia = '{$bia}' WHERE isbn = {$isbn}";

		return $this->conn->query($sql);
	}

	function getMaTuaSachByISBN($isbn){
		$sql 	= "SELECT ma_tuasach FROM $this->table WHERE isbn = {$isbn}";
		$result = $this->conn->query($sql);
		if ($result &&  $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) {
				return $row['ma_tuasach'];
			}
		}
		return 0;
	}
	function getISBNbyMaCuonSach($ma_cuonsach){
		$sql 	= "SELECT isbn FROM $this->table WHERE ma_cuonsach = {$ma_cuonsach}";
		$result = $this->conn->query($sql);
		if ($result &&  $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) {
				return $row['isbn'];
			}
		}
		return 0;
	}
	function getTuaSachByISBN($isbn){
		$ma_tuasach = $this->getMaTuaSachByISBN($isbn);
		$tuasach 	=  TuaSach::getInstance();
		return $tuasach->getTitleTuaSach($ma_tuasach);
	}
	function getTuaSachByMaCuonSach($ma_cuonsach){
		$isbn = getISBNbyMaCuonSach($ma_cuonsach);
		$ma_tuasach = $this->getMaTuaSachByISBN($isbn);
		$tuasach 	=  TuaSach::getInstance();
		return $tuasach->getTitleTuaSach($ma_tuasach);
	}
	function kiemTraDauSach($ma_tuasach, $ngonngu){
		$sql ="SELECT * FROM $this->table WHERE ma_tuasach = {$ma_tuasach} AND ngonngu = '{$ngonngu}' LIMIT 1 ";
		$result = $this->conn->query($sql);
		if ($result &&  $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) {
				return $row['isbn'];
			}
		}
		return 0;
	}

	function demSoLuong($isbn){
		$sql = "SELECT count(isbn) FROM cuonsach WHERE isbn = {$isbn}";
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_row($result);
		return $row[0];
	}

	public static function listDauSach($select_all = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM dausach";
			$result = $conn->query($sql);

			if ($result && $result->num_rows > 0) {
				return $result;
			}
			return 0;
		} else {
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM dausach LIMIT {$posts_per_age} OFFSET {$offset}";

			$result = $conn->query($sql);
			if ($result && $result->num_rows > 0) {
				return $result;
			}
			return 0;
		}
	}
	public static function listBookByISBN($select_all = 0,$isbn = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		$sql =	"SELECT * FROM cuonsach cs LEFT JOIN dausach ds
				ON cs.isbn = ds.isbn";
		if( ! $select_all){
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM cuonsach WHERE isbn='{$isbn}' LIMIT {$posts_per_age} OFFSET {$offset}";

		}
		$sql .=	" WHERE cs.isbn = '{$isbn}' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return $result;
		}
		return 0;

	}
	function xoaDauSach($isbn){
		$sql = "DELETE FROM {$this->table} WHERE isbn= {$isbn}";
		return $this->conn->query($sql);
	}

	function getDauSachByMaCuonSach($ma_cuonsach){
		$sql = "SELECT * FROM dausach WHERE ma_cuonsach = '{$ma_cuonsach}' ";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0)
		while( $row = $result->fetch_assoc() ) {
			return $row['tuasach'];
		}
		return 0;
	}
}