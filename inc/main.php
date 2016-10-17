<?php
	function isCustomError( $thing ) {
		return ( $thing instanceof HandleError );
	}

	function add_selected($input, $default){

		if($input == $default){
			echo ' selected';
		}
	}
	function list_ngon_ngu($selected = 1){
		if(empty($selected)){
			$selected = 1;
		}?>
		<select class="form-control" name="ngonngu" required>
			<option value="0" <?php add_selected($selected, 0);?> > Chọn ngôn ngữ</option>
			<option value="1" <?php add_selected($selected, 1);?>> Việt</option>
			<option value="2" <?php add_selected($selected, 2);?>> Anh </option>
			<option value="3" <?php add_selected($selected, 3);?>> Pháp</option>
			<option value="4" <?php add_selected($selected, 4);?>> Đức</option>
			<option value="5" <?php add_selected($selected, 5);?>> Trung Quốc</option>
			<option value="6" <?php add_selected($selected, 6);?>> Nhật</option>
			<option value="7" <?php add_selected($selected, 7);?>> Hàn Quốc</option>
		</select>
	    <?php
	}
	function danhSachQuan($selected = 1){
		if(empty($selected)){
			$selected = 1;
		}
	?>
		<select class="form-control required" required name="quan" required>
				<option value="0" <?php add_selected($selected, 0);?> >Chọn quận </option>
				<option value="1" <?php add_selected($selected, 1);?>> Quận 1</option>
				<option value="2" <?php add_selected($selected, 2);?>> Quận 2 </option>
				<option value="3" <?php add_selected($selected, 3);?>> Quận 3</option>
				<option value="4" <?php add_selected($selected, 4);?>> Quận 4</option>
				<option value="5" <?php add_selected($selected, 5);?>> Quận 5</option>
				<option value="6" <?php add_selected($selected, 6);?>> Quận 6</option>
				<option value="7" <?php add_selected($selected, 7);?>> Quận 7</option>
				<option value="8" <?php add_selected($selected, 8);?>> Quận 8</option>
				<option value="9" <?php add_selected($selected, 9);?>> Quận 9</option>
				<option value="10" <?php add_selected($selected, 10);?>> Quận 10</option>
				<option value="11" <?php add_selected($selected, 11);?>> Quận 11</option>
				<option value="12" <?php add_selected($selected, 12);?>> Quận 12</option>
				<option value="11" <?php add_selected($selected, 13);?>> Quận Bình Thạnh</option>
				<option value="11" <?php add_selected($selected, 14);?>> Quận Tân Bình</option><option value="11" <?php add_selected($selected, 15);?>> Quận Tân Phú</option>
				<option value="11" <?php add_selected($selected, 16);?>> Quận Cần giờ</option>
				<option value="11" <?php add_selected($selected, 17);?>> Quận Tân Phú</option>

			</select>
	    <?php
	}
	function show_quan($quan){
		switch ($quan) {
			case '1':
				return 'Quận 1';
				break;
			case '2':
				return 'Quận 2';
				break;
			case '3':
				return 'Quận 3';
				break;
			case '4':
				return 'Quận 4';
				break;
				break;
			case '6':
				return 'Quận 6';
				break;
			case '7':
				return 'Quận 7';
				break;
			case '8':
				return 'Quận 8';
				break;
			case '9':
				return 'Quận 9';
				break;
			case '10':
				return 'Quận 10';
				break;
			case '11':
				return 'Quận 1';
				break;
			case '12':
				return 'Quận 12';
				break;
			case '13':
				return 'Quận Bình Thạnh';

				break;
			case '14':
				return 'Quận Thủ Đức';

				break;
			case '15':
				return 'Quận Tân Bình';
				break;

			case '16':
				return 'Quận Tân Phú';
				break;
			case '17':
				return 'Quận Cần giờ';
				break;
			case '18':
				return 'Quận Nhà bè';
				break;

			case '5':
			default:
				return 'Quận 5';
				break;
		}
	}
	function danhSachNguoiLon($ma_docgia = 0){ ?>
		<select class="form-control" name="ma_docgia_nguoilon" required>
				<?php
				$result = DocGia::danhSachDocGia($select_all = 1);
				if( !empty($result) ){ ?>
					<option value="0" <?php add_selected(0, $ma_docgia);?> > Chọn độc giả ngươi lớn</option>';
					<?php
					while( $row = $result->fetch_assoc() ) {
						$_ma_docgia = $row['ma_docgia'];
						$selected = '';
						if($ma_docgia == $_ma_docgia){
							$selected = 'selected';
						}
						echo "<option {$selected} value='".$_ma_docgia."'> ".$row['hoten']."</option>";
					}
				} else {
					echo '<option value="0"> Chưa có độc giả người lớn</option>';
				}
				?>

			</select>
			<?php
	}
	function get_ngon_ngu($ma_ngon_ngu){
		switch ($ma_ngon_ngu) {
			case '2':
				return 'Anh';
				break;
			case '3':
				return 'Pháp';
				break;
			case '4':
				return 'Đức';
				break;
			case '5':
				return 'Trung Quốc';
				break;
			case '6':
				return 'Nhật';
				break;
			case '7':
				return 'Hàn';
				break;

			default:
				return 'Việt';
				break;
		}

	}


	function show_tua_sach($ma_tuasach){
		return Tua_Sach::show_tua_sach($ma_tuasach);
	}
	function getTuaSachByISBN($isbn){
		$dausach = DauSach::getInstance();
		return $dausach->getTuaSachByISBN($isbn);
	}
	function getTuaSachByMaTuaSach($ma_tuasach){
		return TuaSach::getInstance()->getTuaSachByMaTuaSach($ma_tuasach);
	}

	function upload_file($file){
		$size 			= $file['size'];
		$tmp_name 		= $file['tmp_name'];
		$name 			= $file['name'];
		$size 			= $file['size'];
		$file_target 	= 'uploads/'.$name;
		$extension 		= pathinfo($file_target,PATHINFO_EXTENSION);

		if( !in_array($extension, array('png','jpg','jpeg')) ){
			return false;
		}
		$t = move_uploaded_file( $tmp_name, $file_target);

		if($t){
			return $file_target;
		}
		return false;
	}

	function limit_string($string, $len) {
		if(empty($string) )
			return $string;
		$t_len 		= $len;
		$string_len = strlen($string);

	    if($len >  $string_len){
	    	$len = $string_len;
	    }
	    $pos = strpos($string, ' ', $len);
	    if($pos){
	    	$string = substr($string,0,$pos);
	    } else {
	    	$string = substr($string,0,$len);
	    }
	     if($t_len < $string_len)
	     	$string .= ' ...';
	    return $string ;
	}

	function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url){
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination paging">';

        $right_links    = $current_page + 3;
        $previous       = $current_page - 3; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link

        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="'.$page_url.'&page=1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="'.$page_url.'&page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
                    }
                }
            $first_link = false; //set first link to false
        }

        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active"><span>'.$current_page.'</span></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active"><span>'.$current_page.'</span></li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><span>'.$current_page.'</span></li>';
        }

        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="'.$page_url.'&page='.$next_link.'" >&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="'.$page_url.'&page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }

        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}
function get_site_title(){
	$act 	= isset( $_GET['act'] ) ? $_GET['act'] : '';
	$page 	= isset($_GET['page']) ?  $_GET['page'] : 1;
	$title 	= '';
	switch ($act) {
		case 'list_dau_sach':
			$title .=  "Danh sách đầu sách";
			break;
		case 'frm_add_dau_sach':
			$title .=  "Thêm mới đầu sách";
			break;
		case 'list_sach':
			$title .=  "List sách";
			break;
		case 'list_tua_sach':
			$title .=  "List tựa sách";
			break;
		case 'frm_add_tua_sach':
			$title .=  "Thêm mới tựa sách";
			break;
		case 'list_docgia':
			$title .= 'Danh sách độc giả';
			break;
		case 'form-insert-user':
			if(!isset($_GET['id'])){
				$title .='Thêm mới độc giả';
			} else {
				$title .= 'Cập nhật thông tin độc giả';
			}
		break;
		case 'form_muonsach':
			$title .= 'Thêm độc giả';
			break;

		case 'list_sach_dangmuon':
			$title .= 'Các sách đang mượn';
			break;
		case 'list_muon_quahan':
			$title .= 'Sách quá hạn';
			break;
		case 'chi_tiet_muon':
			$title .= 'Chi tiết mượn một cuốn sách';
			break;
		case 'form_muonsach':
			$title .= 'Thêm độc giả';
			break;
		case 'chi_tiet_docgia':
			$title .= 'Xem thông tin độc giả';
			break;
		default:

			$title = 'Đồ án quản lý thư viện';
			break;
	}
	if( is_numeric($page) && $page > 1 ){
		$title .= " | {$page} ";
	}
	return $title;
}
function demSoLuongDauSach($isbn){
	$dausach = DauSach::getInstance();
	return $dausach->demSoLuong($isbn);
}
function them_DocGia(){


}
function checkMenu($string, $get){
	if(empty($string)){
		$string = 'list_dau_sach';
	}
	if(empty($get) && $string == ''){
		echo 'activate';
	}
	if($string == $get){
		echo 'activate';
	}

}