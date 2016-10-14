<?php
$del_id = isset($_GET['del']) ? $_GET['del'] : '';
if( !empty($del_id)){
$obt_tua_sach = new Tua_Sach();
$obt_tua_sach->delete_tua_sach($del_id);
}
$total = Tua_Sach::list_tua_sach($select_all = 1);
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
	$result = Tua_Sach::list_tua_sach($select_all = 0, $posts_per_page, $current_page );
	echo '<table class="table ">';
	echo '<thead><tr><th> Mã</th> <th> Tựa sách </th> <th> Tác giả </th><th> Tóm tắt </th><th> Tác vụ </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		echo '<tr>';
        echo "<td> " . $row["ma_tuasach"]. " </td><td> <a class='' href= 'index.php?act=frm_add_tua_sach&id=".$row["ma_tuasach"]."'> " . $row["tuasach"]. "</a> </td><td> " . $row["tacgia"]."</td><td>". $row["tomtat"]. "</td><td><a  class='action'  href='index.php?act=frm_add_tua_sach&id=".$row["ma_tuasach"]."'>Cập nhật</a> &nbsp; <a href='index.php?{$url}page={$current_page}&del={$row["ma_tuasach"]}' onclick ='return remove_tua_sach()'> Xóa</a>  ";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    phan_trang($max_page, $posts_per_page = 10, $current_page, $url = 'act=list_tua_sach&');
}