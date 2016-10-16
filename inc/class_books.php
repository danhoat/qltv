<?php
Class CuonSach{
	protected $conn;
	protected $isbn;
	protected $ma_cuonsach;
	protected $tinhtrang;
	static $instance;
	function __construct(){
		global $conn;
		$this->conn = $conn;
		$this->table = 'cuonsach';

	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new CuonSach();
        return self::$instance;
    }
    function getISBN($ma_cuonsach){
    	$sql ="SELECT isbn FROM cuonsach WHERE ma_cuonsach = {$ma_cuonsach} ";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0) {
			while( $row = $result->fetch_assoc() ) {
				return $row['isbn'];
			}
		}
		return 0;
    }
	function themCuonSach( $isbn, $ma_cuonsach = 0, $tinhtrang = 1 ) {

		$sql ="INSERT INTO `{$this->table}` (`isbn`, `ma_cuonsach`, `tinhtrang`) VALUES ({$isbn}, NULL, '{$tinhtrang}' )";
		return $this->conn->query($sql);
	}
	function capNhatCuonSach($ma_cuonsach, $tinhtrang){
		$sql = "UPDATE `{$this->table}` SET tinhtrang = {$tinhtrang} WHERE ma_cuonsach = '{$ma_cuonsach}' ";
		return $this->conn->query($sql);
	}
	function xoaCuonSach($ma_cuonsach){
		$sql = "DELETE FROM {$this->table} WHERE ma_cuonsach= {$ma_cuonsach}";
		return $this->conn->query($sql);
	}
	public static function list_books($select_all = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM cuonsach";
			$result = $conn->query($sql);

			if ($result && $result->num_rows > 0) {
				return $result;
			}
			return 0;
		} else {
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM cuonsach LIMIT {$posts_per_age} OFFSET {$offset}";

			$result = $conn->query($sql);
			if ($result && $result->num_rows > 0) {
				return $result;
			}
			return 0;
		}
	}
	public static function listBookByISBN($select_all = 0,$isbn = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM cuonsach WHERE isbn = '{$isbn}' ";
			$result = $conn->query($sql);
			if ($result && $result->num_rows > 0) {
				return $result;
			}
			return 0;
		} else {
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM cuonsach WHERE isbn='{$isbn}' LIMIT {$posts_per_age} OFFSET {$offset}";

			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				return $result;
			}
			return 0;
		}
	}

	public static function 	show_tua_sach($ma_tuasach){
		global $conn;
		$sql ="SELECT tuasach FROM tuasach WHERE ma_tuasach = {$ma_tuasach}";
		$result = $conn->query($sql);

		if ($result && $result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				return limit_string($row['tuasach'], 50);
			}
		return 'Empty';
	}
	/**
	 * kiểm tra xem có tồn tại cuốn sách này không
	 * @version [version]
	 * @since   1.0
	 */
	function kiemTraCuonSach($ma_cuonsach){
		$sql ="SELECT * FROM {$this->table} WHERE ma_cuonsach = {$ma_cuonsach} ";
		$result = $this->conn->query($sql);
		if ( $result && $result->num_rows > 0) {
			while( $row = $result->fetch_assoc() ) {
				if($row['tinhtrang'] == 0)
					return 2;
			}
			return 1;
		}
		return 0;
	}
	function kiemTraTinhTrangCuonSach($ma_cuonsach){

	}
	function getTenCuonSach($ma_cuonsach){
		return DauSach::getInstance()->getTuaSachByMaCuonSach($ma_cuonsach);
	}
	function getCuonSach($ma_cuonsach){
		return DauSach::getInstance()->getTuaSachByMaCuonSach($ma_cuonsach);
	}
	function getThongTinCuonSach($ma_cuonsach){
		$sql = "SELECT * FROM cuonsach cs LEFT JOIN dausach ds ON cs.isbn = ds.isbn WHERE cs.ma_cuonsach = '{$ma_cuonsach}' ";
		echo $sql;
		$result = $this->conn->query($sql);
		if ( $result && $result->num_rows > 0) {
			while( $row = $result->fetch_assoc() ) {
				return $row;
			}
			return 1;
		}
		return 0;
	}
}