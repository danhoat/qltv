<?php
Class DocGia{
	protected $ma_docgia;
	protected $ho;
	protected $tenLot;
	protected $ten;
	protected $ngaySinh;
	protected $table;
	protected $con;
	static $instance;
	function __construct(){
		global $conn;
		$this->table = 'docgia';
		$this->conn = $conn;
	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new DocGia();
        return self::$instance;
    }
	function themDocGia($hoten,$ngaysinh ){
		$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `hoten`, `ngaysinh`) VALUES (NULL, '{$hoten}', '{$ngaysinh}')";
		if($this->conn->query($sql)){
			return $this->conn->insert_id;
		}
	}
	function xoaDocGia($ma_docgia){
		$sql = "DELETE FROM {$this->table} WHERE ma_docgia= {$ma_docgia}";
		return $this->conn->query($sql);
	}
	public static function danhSachDocGia($select_all = 0, $posts_per_age = 10, $current_page = 1) {
		global $conn;
		if($select_all){
			$sql ="SELECT * FROM docgia";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				return $result;
			}
			return 0;
		} else {
			$offset = $posts_per_age * ($current_page - 1);
			$sql ="SELECT * FROM docgia LIMIT {$posts_per_age} OFFSET {$offset}";

			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				return $result;
			}
			return 0;
		}
	}
}
class TreEm extends DocGia{
	protected $ma_docgia;
	protected $ma_docgia_nguoilon;
}

class NguoiLon extends DocGia {
	protected $ma_docgia;
	protected $sonha;
	protected $duong;
	protected $quan;
	protected $dienthoai;
	protected $han_sd;
	static $instance;
	protected $table;
	public function __construct(){
		$this->table = 'nguoilon';
		parent::__construct();
	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new NguoiLon();
        return self::$instance;
    }
    function themNguoiLon($ma_docgia = 0, $args){
    	//INSERT INTO `docgia` (`ma_docgia`, `ho`, `tenlot`, `ten`, `ngaysinh`) VALUES (NULL, 'Nguyễn', 'Gia', 'Dần', '2016-10-13 00:00:00');
    	$ho 		= isset($args['ho']) ? $args['ho'] : '';
    	$tenlot 	= isset($args['tenlot']) ? $args['tenlot'] : '';
    	$ten 		= isset($args['ten']) ? $args['ten'] : '';
    	$ngaysinh 	= isset($args['ngaysinh']) ? $args['ngaysinh'] : '';
		$sonha 		= isset($args['sonha']) ? $args['sonha'] : '';
    	$duong 		= isset($args['duong']) ? $args['duong'] : '';
    	$quan 		= isset($args['quan']) ? $args['quan'] : '';
    	$dienthoai 	= isset($args['dienthoai']) ? $args['dienthoai'] : '';
    	$han_sd 	= isset($args['han_sd']) ? $args['han_sd'] : '';
    	$hoten 		= isset($args['hoten']) ? $args['hoten'] : '';

    	//INSERT INTO `nguoilon` (`ma_docgia`, `sonha`, `duong`, `quan`, `dienthoai`, `han_sd`) VALUES (NULL, '17 ', 'Trần Mai Anh', '1', '0988585858', '2016-12-16 00:00:00');
    	$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `sonha`, `duong`, `quan`, `dienthoai`, `han_sd`) VALUES ({$ma_docgia}, '{sonha} ', '{$duong}', '{$quan}', '{dienthoai}', '{$han_sd}')";
    	if($this->conn->query($sql)){
			return $this->conn->insert_id;
		}
		return 0;
    }

}