<?php
Class Muon{
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
        self::$instance = new Muon();
        return self::$instance;
    }
    function soSachDangMuonCuaDocGia($ma_docgia){
    	$sql 	= "SELECT count(*) $this->table WHERE ma_docgia ='{$ma_docgia}'";
   		$result = $this->conn->query($sql);

   		if ($result && $result->num_rows > 0) {
			$row = mysqli_fetch_row($result);
			return $row[0];
		}
		return 0;
    }
	public static function listBookByISBN($select_all = 0,$isbn = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM cuonsach WHERE isbn = '{$isbn}' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
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

	function check_tua_sach($ma_tuasach){
		$sql ="SELECT * FROM {$this->table} WHERE ma_tuasach = {$ma_tuasach} ";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			return $result;
		}
		return 0;
	}

}