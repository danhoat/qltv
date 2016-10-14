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

	function themDauSach($ma_tuasach, $ngonngu, $bia, $trangthai = 1 ) {
		$isbn =  $this->kiemTraDauSach( $ma_tuasach, $ngonngu);
		if ($isbn){
			// skip add new dau sach
			return $isbn;
		}
		if ( $isbn == 0 ){
			// chua ton tai dau dau sach nay
			// Add new dau sach
			$sql ="INSERT INTO `{$this->table}` (`isbn`, `ma_tuasach`, `ngonngu`, `bia`, `trangthai`) VALUES (NULL, '{$ma_tuasach}', '{$ngonngu}', '{$bia}', '{$trangthai}')";
			if($this->conn->query($sql)){
				return $this->conn->insert_id;
			}
		}

	}
	function getMaTuaSachByISBN($isbn){
		$sql 	= "SELECT ma_tuasach FROM $this->table WHERE isbn = {$isbn}";
		$result = $this->conn->query($sql);
		if ( $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) {
				return $row['ma_tuasach'];
			}
		}
		return 0;
	}
	function getTuaSachByISBN($isbn){
		$ma_tuasach = $this->getMaTuaSachByISBN($isbn);
		$tuasach 	=  TuaSach::getInstance();
		return $tuasach->getTuaSach($ma_tuasach);
	}
	function kiemTraDauSach($ma_tuasach, $ngonngu){
		$sql ="SELECT * FROM $this->table WHERE ma_tuasach = {$ma_tuasach} AND ngonngu = '{$ngonngu}' LIMIT 1 ";
		$result = $this->conn->query($sql);
		if ( $result->num_rows > 0 ) {
			while( $row = $result->fetch_assoc() ) {
				return $row['isbn'];
			}
		}
		return 0;
	}
	function check_tua_sach($ma_tuasach){
		$sql ="SELECT * FROM tuasach WHERE ma_tuasach = {$ma_tuasach} ";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			return 1;
		}
		return 0;
	}

	function count_so_luong($isbn){
		$sql = "SELECT count(isbn) FROM cuonsach WHERE isbn = {$isbn}";
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_row($result);
		return $row[0];
	}

	public static function listDauSach() {
		global $conn;
		$sql ="SELECT * FROM dausach";
		$result = $conn->query($sql);
		if( !$result )
			return 0;
		if ($result->num_rows > 0) {
			return $result;
		}
		return 0;
	}
	function show_tua_sach($ma_tuasach){

	}
}