<?php
	function add_selected($input, $default){

		if($input == $default){
			echo ' selected';
		}
	}
	function list_ngon_ngu($selected = 1){ ?>
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
	require('class_tua_sach.php');
	require('class_dau_sach.php');
	require('class_books.php');

	function show_tua_sach($ma_tuasach){
		return Tua_Sach::show_tua_sach($ma_tuasach);
	}
	function getTuaSachByISBN($isbn){
		$dausach = DauSach::getInstance();
		return $dausach->getTuaSachByISBN($isbn);
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

	function limit_string($string,$len) {
		$t_len = $len;
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