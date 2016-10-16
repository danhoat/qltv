<?php
    $search     = isset($_GET['search']) ? $_GET['search'] : 0;
    $keyword    = isset( $_GET['keyword'] ) ? $_GET['keyword'] : '';
    $type       = isset( $_GET['type'] ) ? $_GET['type'] : '';
    $del_id     = isset($_GET['del']) ? $_GET['del'] : '';
    $cuonsach   = Muon::getInstance();

    $total = Muon::list_books($select_all = 1, 10, 1 , $search, $type, $keyword );


    if( !empty($total) ){

    	$url = 'index.php?act=list_sach&';
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
    	$result = Muon::list_books($select_all = 0, $posts_per_page, $current_page, $search, $type, $keyword );
        if($result ){
            echo "Có {$total_record} cuốn sách đang được mượn";
            ?>
            <form action="index.php?act=list_sachdangmuon" method="GET">
                Nhập mã :
                <input type="hidden" name="act" value="list_sach_dangmuon" >
                <input type="hidden" name="search" value="1" >
                <input type="text" name="keyword" >
                <select name="type" >
                    <option value="1"> Mã độc giả </option>
                    <option value="2"> Mã cuốn sách </option>
                    <option value="3"> Mã đầu sách(isbn) </option>
                </select>
                <button type="submit">Tìm Kiếm</button>
            </form>
            <?php
        	echo '<table class="table ">';
        	echo '<thead><tr><th> ISBN </th><th>Độc giả </th> <th> Tựa sách </th><th> Tình trạng </td> <th> Tác vụ </th> </tr></thead>';
        	echo ' <tbody>';
        	while( $row = $result->fetch_assoc() ) {
        		$isbn 		= $row['isbn'];
                $ma_docgia  = $row['ma_docgia'];
                $ma_cuonsach = $row['ma_cuonsach'];
        		echo '<tr>';
                echo "<td>{$isbn} </td>";
                echo '<th><a href="index.php?act=chi_tiet_docgia&id='.$ma_docgia.'">'.getTenDocGia($ma_docgia).'<a/></th>';
                 echo "<td> <a class='' href= 'index.php?act=chi_tiet_muon&mcs=".$ma_cuonsach."&isbn=".$isbn."'> " . limit_string( $row['bia'], 30). "</a> </td>";

                echo "<td><a  class='action'  href='index.php?act=frm_insert_book&id=".$ma_cuonsach."'>Cập nhật</a> &nbsp; <a href='{$url}page={$current_page}&del={$row["ma_cuonsach"]}' onclick ='return remove_tua_sach()'> Xóa</a>  ";
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';

            echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url = 'index.php?act=list_sach');
        } else {
            echo 'Danh sách mượn đang rỗng';
        }
    }