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

	public static function list_tua_sach($select_all = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM tuasach";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				return $result;
			}
			return 0;
		} else {
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM tuasach LIMIT {$posts_per_age} OFFSET {$offset}";

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

		if ($result->num_rows > 0)
			while( $row = $result->fetch_assoc() ) {
				return $row['tuasach'];
			}
		return 'Empty';
	}

}