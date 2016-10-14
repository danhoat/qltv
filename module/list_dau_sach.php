<?php
$isbn = isset($_GET['del']) ? $_GET['del'] : '';
$dausach   = DauSach::getInstance();
if( !empty($isbn)){
    $dausach->xoaDauSach($isbn);
}

$total = DauSach::listDauSach($select_all = 1);
if( !empty($total) ){

	$url = 'act=list_dau_sach&';
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
	$result = DauSach::listDauSach($select_all = 0, $posts_per_page, $current_page );
	echo "Hệ thống hiện có {$total_record} đầu sách";
	echo '<table class="table ">';
	echo '<thead><tr><th> ISBN</th> <th> Tựa sách </th><th> Tình trạng </td> <th> Tác vụ </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		$isbn 		= $row['isbn'];
		$ma_tuasach = $row['ma_tuasach'];
		$trangthai 	= ($row['trangthai'] == 1)  ?  'Kho' :'Đang mượn';
		echo '<tr>';
        echo "<td> " . $isbn. " </td><td> <a class='' href= 'index.php?act=frm_add_dau_sach.php&id=".$isbn."'> " . limit_string( getTuaSachByISBN($isbn),30). "</a> </td><td>". $trangthai. "</td>";

        echo "<td><a  class='action'  href='index.php?act=frm_add_dau_sach&id=".$isbn."'>Cập nhật</a> &nbsp; <a href='index.php?{$url}page={$current_page}&del={$isbn}' onclick ='return remove_tua_sach()'> Xóa</a>  ";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url = 'index.php?act=list_dau_sach');
}