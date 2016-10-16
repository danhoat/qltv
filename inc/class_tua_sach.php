<?php
Class TuaSach{
	protected $conn;
	protected $ma_tuasach;
	protected $tuasach;
	protected $taggia;
	protected $tomtat;
	protected $table;
	static $instance;
	function __construct(){
		global $conn;
		$this->conn = $conn;
		$this->table = 'tuasach';
	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new TuaSach();
        return self::$instance;
    }

	function themTuaSach( $tuasach, $tacgia, $tomtat ) {

		$sql ="INSERT INTO `{$this->table}` (`ma_tuasach`, `tuasach`, `tacgia`, `tomtat`) VALUES (NULL, '{$tuasach}', '{$tacgia}', '{$tomtat}')";
		return $this->conn->query($sql);
	}
	function capNhatTuaSach($ma_tuasach, $tuasach, $tacgia, $tomtat){
		$sql = "UPDATE `{$this->table}` SET tuasach = '{$tuasach}',tacgia = '{$tacgia}', tomtat = '{$tomtat}'WHERE ma_tuasach = {$ma_tuasach}";
		echo $sql;
		return $this->conn->query($sql);
	}
	function delete_tua_sach($ma_tuasach){
		$sql = "DELETE FROM {$this->table} WHERE ma_tuasach= {$ma_tuasach}";
		return $this->conn->query($sql);
	}
	public static function list_tua_sach($select_all = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM tuasach";
			$result = $conn->query($sql);

			if ($result && $result->num_rows > 0) {
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
	function getTuaSach($ma_tuasach){
		$result = $this->kiemTraTuaSachTonTai($ma_tuasach);
		if( $result ){
			while( $row = $result->fetch_assoc() ) {
				return $row;
			}
		}
		return 0;
	}

	function getTitleTuaSach($ma_tuasach){
		$result = $this->kiemTraTuaSachTonTai($ma_tuasach);
		if( $result ){
			while( $row = $result->fetch_assoc() ) {
				return $row['tuasach'];
			}
		}
		return 0;
	}

	function getTuaSachByMaTuaSach($ma_tuasach){
		$result = $this->kiemTraTuaSachTonTai($ma_tuasach);
		if( $result ){
			while( $row = $result->fetch_assoc() ) {
				return $row['tuasach'];
			}
		}
		return 0;
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

	function kiemTraTuaSachTonTai($ma_tuasach){
		$sql ="SELECT * FROM {$this->table} WHERE ma_tuasach = {$ma_tuasach} ";
		$result = $this->conn->query($sql);
		if ($result && $result->num_rows > 0) {
			return $result;
		}
		return 0;
	}

}