<?php
Class Tua_Sach{
	protected $conn;
	protected $ma_tuasach;
	protected $tuasach;
	protected $taggia;
	protected $tomtat;
	protected $table;
	function __construct(){
		global $conn;
		$this->conn = $conn;
		$this->table = 'tuasach';
	}
	function them_tua_sach( $tuasach, $tacgia, $tomtat ) {

		$sql ="INSERT INTO `{$this->table}` (`ma_tuasach`, `tuasach`, `tacgia`, `tomtat`) VALUES (NULL, '{$tuasach}', '{$tacgia}', '{$tomtat}')";
		return $this->conn->query($sql);
	}

	public static function list_tua_sach() {
		global $conn;
		$sql ="SELECT * FROM tuasach";
		$result = $conn->query($sql);
		if( !$result )
			return 0;

		if ($result->num_rows > 0) {
			return $result;
		}
		return 0;
	}
	public static function 	show_tua_sach($ma_tuasach){
		global $conn;
		$sql ="SELECT tuasach FROM tuasach WHERE ma_tuasach = {$ma_tuasach}";

		$result = $conn->query($sql);

		if ($result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				return $row['tuasach'];
			}
		return 'Empty';
	}

}