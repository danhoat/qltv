<?php

	function list_ngon_ngu(){
		?>
		<select class="form-control" name="ngonngu">
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
	function show_ngon_ngu($ma_ngon_ngu){
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
		if($ma_ngon_ngu == 1){
			echo 'Việt';
		}
	}
	require('class_tua_sach.php');
	require('class_dau_sach.php');
	function show_tua_sach($ma_tuasach){
		return Tua_Sach::show_tua_sach($ma_tuasach);
	}

	function phan_trang($total,$posts_per_page, $page){

		if($total < 2 )
			return '';

		$html ='<ul class="paging">';

		for( $i = 1; $i <= $total; $i++){
			if ($i == $total) {
				$html.= "<li><a href='index.php?page={$total}'>Cuối</a></li>";
			}else if($i == $page){
				$html.= "<li><a href='#'>{$i}</a></li>";
			} else if ($i < $total) {
				$html.= "<li><a href='index.php?page={$i}'>{$i}</a></li>";
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