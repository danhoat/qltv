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

		if ($this->conn->query($sql) === TRUE) {
			    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
	public static function list_tua_sach() {
		global $conn;
		$sql ="SELECT * FROM tuasach";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			return $result;
		}
		return 0;
	}
}