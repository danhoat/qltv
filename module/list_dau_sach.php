<?php
$result = Dau_Sach::list_dau_sach();
if( !empty($result) ){
	echo '<table class="table ">';
	echo '<thead><tr><th> Đầu sách</th> <th> Ngôn ngữ</th><th> Trạng thái </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		echo '<tr>';
        echo "<td> " .show_tua_sach($row["ma_tuasach"]). " </td><td> " . show_ngon_ngu($row["ngonngu"]). " </td><td>". $row["bia"]. "</td>";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}