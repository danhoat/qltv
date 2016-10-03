<?php
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