<?php
$del_id     = isset($_GET['del']) ? $_GET['del'] : '';
$docgia   = DocGia::getInstance();
if( !empty($del_id)){
    $docgia->xoaDocGia($del_id);
}
$total = DocGia::danhSachDocGia($select_all = 1);
if( !empty($total) ){

	$url = 'index.php?act=list_docgia&';
	$total_record = $total->num_rows;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    if(! is_numeric($current_page) || $current_page < 1){
    	$current_page = 1;
    }
    $posts_per_page = 10;
    $max_page = ceil($total_record/$posts_per_page);
    if($current_page > $max_page){
    	$current_page = $max_page;
    }
	$result = DocGia::danhSachDocGia($select_all = 0, $posts_per_page, $current_page );
    echo "Hệ thống hiện có {$total_record} độc giả";
	echo '<table class="table table-bordered ">';
	echo '<thead><tr><th> Mã</th> <th> Tên độc giả </th><th> Tình trạng </td> <th> Tác vụ </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		$ma_docgia 	= $row['ma_docgia'];
        $ho         = $row['ho'];
        $hoten      = $row['hoten'];
        $tenlot     = $row['tenlot'];
        $ten        = $row['ten'];
		$tinhtrang 	= '';
		echo '<tr>';
        echo "<td> " . $ma_docgia. " </td><td> <a class='' href= 'index.php?act=chi_tiet_docgia&id=".$ma_docgia."'> " . $hoten. "</a> </td><td>". $tinhtrang. "</td>";

        echo "<td><a  class='action'  href='index.php?act=chi_tiet_docgia&id=".$ma_docgia."'>Cập nhật</a> &nbsp; <a href='{$url}page={$current_page}&del={$ma_docgia}' onclick ='return remove_tua_sach()'> Xóa</a>  ";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url );
}