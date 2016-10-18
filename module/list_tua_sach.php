<?php
$del_id = isset($_GET['del']) ? $_GET['del'] : '';
$tua_sach = TuaSach::getInstance();
if( !empty($del_id)){
    $tua_sach->delete_tua_sach($del_id);
}
$total = TuaSach::list_tua_sach($select_all = 1);
if( !empty($total) ){

	$url = 'index.php?act=list_tua_sach&';
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
	$result = TuaSach::list_tua_sach($select_all = 0, $posts_per_page, $current_page );
     echo " <div class='row'>Hệ thống hiện có {$total_record} tựa sách </div>";
	echo '<table class="table table-bordered ">';
	echo "<thead><tr><th><input class ='checkbox selectall' type='checkbox' name=''></th><th> Mã</th> <th> Tựa sách </th> <th> Tác giả </th><th> Tóm tắt </th><th> Tác vụ </th> </tr></thead>";
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
        $ma_tuasach = $row['ma_tuasach'];

		echo '<tr>';
        echo "<td><input class ='checkbox' type='checkbox' name='remove[]'>";
        echo "<td> " . $ma_tuasach. "123 </td>";
        echo "<td> <a class='' href= 'index.php?act=frm_add_tua_sach&id=".$ma_tuasach."'> " . limit_string($row["tuasach"],25). "</a> </td><td> " . $row["tacgia"]."</td><td>". limit_string($row["tomtat"],60). "</td>";
        echo "<td><a  class='action'  href='index.php?act=frm_add_tua_sach&id=".$ma_tuasach."'>Cập nhật</a> &nbsp; <a href='{$url}page={$current_page}&del={$ma_tuasach}' onclick ='return remove_tua_sach()'> Xóa</a>  ";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url );

}