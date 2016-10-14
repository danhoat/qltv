<?php
Class Dau_Sach{
	protected $conn;
	protected $isbn;
	protected $ma_tuasach;
	protected $ngonngu;
	protected $bia;
	protected $trangthai;
	function __construct(){
		global $conn;
		$this->conn = $conn;
		$this->table = 'dausach';
	}
	function them_dau_sach($ma_tuasach, $ngonngu, $bia, $trangthai = 1 ) {

		if(! $this->check_tua_sach($ma_tuasach) ){
			return 0;
		}
		$sql ="INSERT INTO `{$this->table}` (`isbn`, `ma_tuasach`, `ngonngu`, `bia`, `trangthai`) VALUES (NULL, '{$ma_tuasach}', '{$ngonngu}', '{$bia}', '{$trangthai}')";
		return $this->conn->query($sql);
	}
	function check_tua_sach($ma_tuasach){
		$sql ="SELECT * FROM tuasach WHERE ma_tuasach = {$ma_tuasach} ";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			return 1;
		}
		return 0;
	}

	public static function list_dau_sach() {
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