<?php
$isbn = isset($_GET['del']) ? $_GET['del'] : '';
$dausach   = DauSach::getInstance();
if( !empty($isbn)){
    $dausach->xoaDauSach($isbn);
}

$total = DauSach::listDauSach($select_all = 1);
if( !empty($total) ){

	$url           = 'act=list_dau_sach&';
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

    echo '<table class= "table">';
    echo '<th class="col-md-8"> Số lượng đầu sách hiện có :'.$total_record .'</th>';
    echo '<th class= "col-md-2"><a href="index.php?act=frm_add_dau_sach" class="btn-default btn btn-link1"> Thêm mới đầu sách </a></th>';

    echo '<table>';
    echo '<table class="table table-bordered">';
	echo '<thead><tr><th><label for="selectall"> <input class ="checkbox selectall" id= "selectall" type="checkbox" /></label> </th><th> ISBN</th> <th> Tựa sách </th><th> Ngôn ngữ </th><th> Số cuốn</th><th> Tình trạng </td> <th> Tác vụ </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		$isbn 		= $row['isbn'];
		$ma_tuasach = $row['ma_tuasach'];
        $ngonngu = $row['ngonngu'];
		$trangthai 	= ($row['trangthai'] == 1)  ?  'Có sẵn' :'Hết';
		echo '<tr>';
        echo '<td>';
        echo "<input class='checkbox ' id= 'checkbox' type='checkbox' />";
        echo '</td>';
        echo "<td> " . $isbn. " </td><td> <a class='' href= 'index.php?act=chi_tiet_dau_sach&id=".$isbn."'> " . limit_string( getTuaSachByISBN($isbn),30). "</a> </td>";
        echo '<td>'.get_ngon_ngu($ngonngu).'</td>';
        echo '<td>'.demSoLuongDauSach($isbn).'</td>';

        echo "<td>". $trangthai. "</td>";

        echo "<td><a  class='action'  href='index.php?act=frm_add_dau_sach&id=".$isbn."'>Cập nhật</a> &nbsp; <a href='index.php?{$url}page={$current_page}&del={$isbn}' onclick ='return remove_tua_sach()'> Xóa</a>  ";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url = 'index.php?act=list_dau_sach');
} else {
    echo 'Chưa có đầu sách nào trong hệ thống';
    ?>
    <a href="index.php?act=frm_add_dau_sach"> Thêm mới một đầu sách</a>
    <?php
}