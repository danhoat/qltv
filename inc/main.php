<?php

	function list_ngon_ngu(){
		?>
		<select class="form-control" name="ngonngu" required>
				<option value="0"> Chọn ngôn ngữ</option>
				<option value="1" selected> Việt</option>
				<option value="2"> Anh </option>
				<option value="3"> Pháp</option>
				<option value="4"> Đức</option>
				<option value="5"> Trung Quốc</option>
				<option value="6"> Nhật</option>
				<option value="7"> Hàn Quốc</option>


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
	function get_tuasach_by_isbn($isbn){
		$CuonSach = CuonSach::getInstance();
		return $CuonSach->get_tuasach_by_isbn($isbn);
	}
	function phan_trang($total, $posts_per_page = 10, $page = 1, $url = ''){
		if($total < 2 )
			return '';

		$html ='<ul class="paging pagination">';

		for( $i = 1; $i <= $total; $i++){
			if ($i == $total) {
				$html.= "<li><a href='index.php?{$url}page={$total}'>Cuối</a></li>";
			}else if($i == $page){
				$html.= "<li class='current active'><a href='#'>{$i}</a></li>";
			} else if ($i < $total) {
				$html.= "<li><a href='index.php?{$url}page={$i}'>{$i}</a></li>";
			}

		}
		$html.='</ul>';
		echo $html;
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