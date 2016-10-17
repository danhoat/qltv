<?php
    $search     = isset($_GET['search']) ? $_GET['search'] : 0;
    $keyword    = isset( $_GET['keyword'] ) ? $_GET['keyword'] : '';
    $type       = isset( $_GET['type'] ) ? $_GET['type'] : '';
    $del_id     = isset($_GET['del']) ? $_GET['del'] : '';
    $total_record = 0;
    $cuonsach   = Muon::getInstance();

    $total = Muon::list_books($select_all = 1, 10, 1 , $search, $type, $keyword );
     if( !empty($total) ){
        $total_record = $total->num_rows;
    }
    ?>
    <form action="index.php?act=list_sachdangmuon" method="GET" class="form-horizontal">
        <div class="form-group row">
        <h4 for="example-tel-input" class="col-xs-12 col-form-label"> Tìm kiếm</h4>
          <label for="example-tel-input" class="col-xs-2 col-form-label"> Nhập mã </label>
          <div class="col-xs-4">
            <input type="text" class="form-control required" placeholder = "Mã tìm kiếm" name="keyword" value="<?php echo $keyword;?>" >
          </div>
          <div class="col-xs-3">
             <select name="type" class="form-control selectpicker" >
                <option value="1" <?php add_selected(1, $type);?>> Mã độc giả </option>
                <option value="2" <?php add_selected(2, $type);?>> Mã cuốn sách </option>
                <option value="3" <?php add_selected(3, $type);?>> Mã đầu sách(isbn) </option>
            </select>
          </div>
          <div class="col-xs-3">
           <button class="btn btn-default" type="submit">Tìm Kiếm</button>
          </div>
        </div>
        <input type="hidden" name="search" value="1" >
        <input type="hidden" name="act" value="list_sach_dangmuon" >
    </form>
<?php
    echo '<div class="row result">';
    if(!$search){
        echo "Có {$total_record} cuốn sách đang được mượn";
    } else {
        echo "Tìm thấy {$total_record} cuốn sách";
    }
    echo '</div>';

    if( !empty($total) ){

    	$url = 'index.php?act=list_sach_dangmuon&';
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
        	echo '<table class="table table-bordered">';
        	echo '<thead><tr><th> ISBN </th><th>Độc giả </th> <th> Tựa sách </th><th> Ngày mượn </td> <th> Tác vụ </th> </tr></thead>';
        	echo ' <tbody>';
        	while( $row = $result->fetch_assoc() ) {
        		$isbn 		  = $row['isbn'];
                $ma_docgia    = $row['ma_docgia'];
                $ma_cuonsach  = $row['ma_cuonsach'];
                $ngaygio_muon = $row['ngaygio_muon'];
        		echo '<tr>';
                echo "<td>{$isbn} </td>";
                echo '<th><a href="index.php?act=chi_tiet_docgia&id='.$ma_docgia.'">'.getTenDocGia($ma_docgia).'<a/></th>';
                 echo "<td> <a class='' href= 'index.php?act=chi_tiet_muon&mcs=".$ma_cuonsach."&isbn=".$isbn."'> " . limit_string( $row['bia'], 30). "</a> </td>";

                echo "<td>";
                echo $ngaygio_muon;
                echo "</td>";
                echo '<td><a href="">Trả sách</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';

            echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url = 'index.php?act=list_sach');
        } else {
            echo 'Danh sách mượn đang rỗng';
        }
    } else {
        echo ' Danh sách rỗng';
    }