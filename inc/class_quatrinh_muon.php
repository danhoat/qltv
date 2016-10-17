<?php
Class QuaTrinhMuon{
	protected $conn;
	protected $isbn; //primary
	protected $ma_cuonsach;//primary
	protected $ngaygio_muon;//primary
	protected $ma_docgia;
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
        self::$instance = new QuaTrinhMuon();
        return self::$instance;
    }

	function moveMuontoQuaTrinhMuon($record, $ngaygio_tra = 0, $ghichu =''){
		if(empty($ngaygio_tra || !$ngaygio_tra)){
			//2016-10-22 00:00:0
			$ngaygio_tra = date('Y-m-d H:i:s', time() );
		}
		if( empty($ghichu) ){
			$ghichu = 'Rỗng';
		}
		$isbn 			= $record['isbn'];
		$ma_cuonsach 	= $record['ma_cuonsach'];
		$ngaygio_muon 	= $record['ngaygio_muon'];
		$ma_docgia 		= $record['ma_docgia'];
		$ngay_hethan  	= $record['ngay_hethan'];
    	$sql 	= "INSERT INTO `quatrinhmuon` (`isbn`, `ma_cuonsach`,  `ngaygio_muon`, `ma_docgia`, `ngaygio_tra`, `ngay_hethan`) VALUES ('{$isbn}', '{$ma_cuonsach}', '{$ngaygio_muon}',  '{$ma_docgia}', '$ngaygio_tra', '{$ngay_hethan}')";

    	if($this->conn->query($sql)){
			return $this->conn->insert_id;
		}
		return 0;

    }
    function removeQuaTrinhMuon($muon){
    	$isbn 			= $muon['isbn'];
    	$ma_cuonsach 	= $muon['ma_cuonsach'];
    	$ngaygio_muon 	= $muon['ngaygio_muon'];

    	$sql = " DELETE FROM $this->table
				WHERE isbn = '{$isbn}' AND ma_cuonsach = '{$ma_cuonsach}' AND ngaygio_muon= '{$ngaygio_muon}' ";
		$result = $conn->query($sql);
		if ($result ) {
			return 1;
		}
		return 0;
    }
 }