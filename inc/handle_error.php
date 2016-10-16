<?php
class HandleError{
	protected $class;
	protected $code;

	function __construct($class, $code){
		$this->class = $class;
		$this->code = $code;
	}
	function getMessage(){
		$msg = 'Không hợp lệ';
		$class = $this->class;
		$code = $this->code;
		if($class == 'docgia'){
			switch ($code){
				case 'hethan':
				$msg =  'Thẻ độc giả đã hết hạn.';
				break;
				case 'quasoluong':
				$msg =  'Độc giả này đã mượn quá số lượng sách được phép';
				break;
				case 'empty':
				default :
				$msg = 'Đầu sách đã hết';
				break;

			}
		} else if($class ='dausach'){
			switch ($code){
				case 'han_sd':
				$msg =  'Hết hạn';
				break;
				case 'empty':
				default :
				$msg = 'Đầu sách đã hết';
				break;
			}

		}
		return $msg;
	}
}
?>