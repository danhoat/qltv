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

				case 'no_exist':
					$msg = 'Không tồn tại thẻ độc giả này trong hệ thống';
					break;
				case 'quasoluong' :
					$msg = 'Chỉ cho phép bảo hộ tối đa 2 trẻ em.';
					break;

				case 'add_fail' :
					$msg = 'Thêm độc giả không thành công';
					break;

				case 'empty':
				default :
					$msg = 'Đầu sách đã hết';
					break;

			}
		} else if($class == 'dausach'){
			switch ($code){
				case 'han_sd':
					$msg =  'Hết hạn';
					break;
				case 'busy':
				default :
					$msg = 'Đầu sách đang được mượn hết';
					break;
			}

		} else if($class =='sach'){
			switch ($code){
				case 'no_exists':
					$msg =  'Không tồn tại cuốn sách này';
					break;
				case 'busy' :
					$msg =  'Cuốn sách này đã được mượn';
					break;
				case 'empty':
				default :
				$msg = 'Không mượn được';
				break;
			}

		} else if( $class = 'muon'){
			switch ($code){
				case 'quasoluong':
						$msg =  'Độc giả này đã mượn quá số lượng sách được phép';
					break;

				default :
					$msg = 'chưa set';
					break;
			}
		}
		return $msg;
	}
}
?>