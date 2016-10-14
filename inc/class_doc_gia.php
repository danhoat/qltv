<?php
Class DocGia{
	protected $ma_docgia;
	protected $ho;
	protected $tenLot;
	protected $ten;
	protected $ngaySinh;
	protected $table;
	protected $con;
	function __construct(){
		global $conn;
		$this->table = 'docgia';
		$this->conn = $conn;
	}
	function themDocGia($ho,$tenlot,$ten,$ngaysinh ){
		$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `ho`, `tenlot`, `ten`, `ngaysinh`) VALUES (NULL, '{$ho}', '{tenlot}', '{$ten}', '{$ngaysinh}')";
		if($this->conn->query($sql)){
			return $this->conn->insert_id;
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
    function themNguoiLon($args){
    	//INSERT INTO `docgia` (`ma_docgia`, `ho`, `tenlot`, `ten`, `ngaysinh`) VALUES (NULL, 'Nguyễn', 'Gia', 'Dần', '2016-10-13 00:00:00');
    	$ho = isset($_POST['ho']) ? $_POST['ho'] : '';
    	$tenlot = isset($_POST['tenlot']) ? $_POST['tenlot'] : '';
    	$ten = isset($_POST['ten']) ? $_POST['ten'] : '';
    	$ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
		$sonha = isset($_POST['sonha']) ? $_POST['sonha'] : '';
    	$duong = isset($_POST['duong']) ? $_POST['duong'] : '';
    	$quan = isset($_POST['quan']) ? $_POST['quan'] : '';
    	$dienthoai = isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
    	$han_sd = isset($_POST['han_sd']) ? $_POST['han_sd'] : '';
    	$id_doc_gia = $this->themDocGia($ho,$tenlot,$ten,$ngaysinh );
    	//INSERT INTO `nguoilon` (`ma_docgia`, `sonha`, `duong`, `quan`, `dienthoai`, `han_sd`) VALUES (NULL, '17 ', 'Trần Mai Anh', '1', '0988585858', '2016-12-16 00:00:00');
    	$sql = "INSERT INTO `{$this->table}` (`ma_docgia`, `sonha`, `duong`, `quan`, `dienthoai`, `han_sd`) VALUES ({$id_doc_gia}, '{sonha} ', '{$duong}', '{$quan}', '{dienthoai}', '{$han_sd}')";
    	if($this->conn->query($sql)){
			return $this->conn->insert_id;
		}
		return 0;
    }

}