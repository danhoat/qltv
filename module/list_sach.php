<?php
$del_id = isset($_GET['del']) ? $_GET['del'] : '';

$total = Cuon_Sach::list_books($select_all = 1);
if( !empty($total) ){

	$url = 'act=list_tua_sach&';
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
	$result = Cuon_Sach::list_books($select_all = 0, $posts_per_page, $current_page );
	echo '<table class="table ">';
	echo '<thead><tr><th> Mã</th> <th> Tựa sách </th><th> Tình trạng </td> <th> Tác vụ </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		$isbn = $row['isbn'];
		echo '<tr>';
        echo "<td> " . $row["ma_cuonsach"]. " </td><td> <a class='' href= 'index.php?act=list_sach&id=".$row["ma_cuonsach"]."'> " . limit_string( get_tuasach_by_isbn($isbn),30). "</a> </td><td>". $row["tinhtrang"]. "</td><td><a  class='action'  href='index.php?act=frm_insert_book&id=".$row["ma_cuonsach"]."'>Cập nhật</a> &nbsp; <a href='index.php?{$url}page={$current_page}&del={$row["ma_cuonsach"]}' onclick ='return remove_tua_sach()'> Xóa</a>  ";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url = 'index.php?act=list_sach');
}