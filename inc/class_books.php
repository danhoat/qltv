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
	function themCuonSach( $isbn, $ma_cuonsach = 0, $tinhtrang = 1 ) {

		$sql ="INSERT INTO `{$this->table}` (`isbn`, `ma_cuonsach`, `tinhtrang`) VALUES ({$isbn}, NULL, '{$tinhtrang}' )";
		echo $sql;
		return $this->conn->query($sql);
	}
	function update_tua_sach($ma_tuasach, $tuasach, $tacgia, $tomtat){
		$sql = "UPDATE `{$this->table}` SET tuasach = '{$tuasach}',tacgia = '{$tacgia}', tomtat = '{$tomtat}'
				WHERE ma_tuasach = {$ma_tuasach}";

		return $this->conn->query($sql);
	}
	function delete_tua_sach($ma_tuasach){
		$sql = "DELETE FROM {$this->table} WHERE ma_tuasach= {$ma_tuasach}";
		return $this->conn->query($sql);
	}
	public static function list_books($select_all = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM cuonsach";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				return $result;
			}
			return 0;
		} else {
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM cuonsach LIMIT {$posts_per_age} OFFSET {$offset}";

			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				return $result;
			}
			return 0;
		}
	}
	function get_ma_tuasach_by_isbn($isbn){
		$sql 	= "SELECT ma_tuasach FROM dausach WHERE isbn = {$isbn}";
		$result = $this->conn->query($sql);
		if ( $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) {
				return $row['ma_tuasach'];
			}
		}
		return 0;
	}

	function get_tuasach_by_isbn($isbn){
		$ma_tuasach = $this->get_ma_tuasach_by_isbn($isbn);
		$sql 	= "SELECT tuasach FROM tuasach WHERE ma_tuasach = {$ma_tuasach}";
		$result = $this->conn->query($sql);
		if ( $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) {
				return $row['tuasach'];
			}
		}
		return 0;
	}
	function get_tua_sach($ma_tuasach){
		$result = $this->check_tua_sach($ma_tuasach);
		if( $result ){
			while( $row = $result->fetch_assoc() ) {
				return $row;
			}
		}
		return 0;
	}
	public static function 	show_tua_sach($ma_tuasach){
		global $conn;
		$sql ="SELECT tuasach FROM tuasach WHERE ma_tuasach = {$ma_tuasach}";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				return limit_string($row['tuasach'], 50);
			}
		return 'Empty';
	}

	function check_tua_sach($ma_tuasach){
		$sql ="SELECT * FROM {$this->table} WHERE ma_tuasach = {$ma_tuasach} ";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			return $result;
		}
		return 0;
	}

}