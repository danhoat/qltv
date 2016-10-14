<?php
$result = Dau_Sach::list_dau_sach();
if( !empty($result) ){
	echo '<table class="table ">';
	echo '<thead><tr><th> Đầu sách</th> <th> Ngôn ngữ</th><th> Số lượng</th><th> Trạng thái </th> </tr></thead>';
	echo ' <tbody>';
	$dausach = new Dau_Sach();
	while( $row = $result->fetch_assoc() ) {
		$isbn = $row["isbn"];
		$soluong = $dausach->count_so_luong($isbn);
		echo '<tr>';
        echo "<td> " .show_tua_sach($row["ma_tuasach"]). " </td><td> " . show_ngon_ngu($row["ngonngu"]). " </td> <td>".$soluong."</td><td>". $row["bia"]. "</td>";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}