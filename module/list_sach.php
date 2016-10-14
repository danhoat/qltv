<?php
$result = Cuon_Sach::list_books();
if( !empty($result) ){
	echo '<table class="table ">';
	echo '<thead><tr><th> Tên cuốn sách</th> <th> Tình trạng </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		echo '<tr>';
        echo "<td> " .show_tua_sach($row["ma_cuonsach"]). " </td><td>". $row["tinhtrang"]. "</td>";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}