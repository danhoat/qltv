<?php
Class QuaTrinhMuon{
	protected $conn;
	protected $isbn; //primary
	protected $ma_cuonsach;//primary
	protected $ngaygio_muon;//primary
	protected $ma_docgia;
	protected $ngaygio_tra;
	protected $ngaygio_tra;// ghi chu
	static $instance;
	function __construct(){
		global $conn;
		$this->conn = $conn;
		$this->table = 'quatrinhmuon';

	}
	static function getInstance(){
        if(self::$instance !== null){
            return self::$instance;
        }
        self::$instance = new Muon();
        return self::$instance;
    }

	function moveMuontoQuaTrinhMuon($record){
		$isbn = $record['isbn'];
		$isbn = $record['ma_cuonsach'];
		$isbn = $record['ngaygio_muon'];
		$isbn = $record['ngaygio_tra'];
    	$sql = "INSERT INTO `quatrinhmuon` (`isbn`, `ma_cuonsach`,  `ngaygio_muon`, `ma_docgia`, `ngay_hethan`) VALUES ('{$isbn}', '{$ma_cuonsach}', '{$ngaygio_muon}',  '{$ma_docgia}', '$ngaygio_tra');";

    }
 }