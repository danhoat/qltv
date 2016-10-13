<?php
$result = Tua_Sach::list_tua_sach();
if( !empty($result) ){
	echo '<table class="table ">';
	echo '<thead><tr><th> Mã</th> <th> Tựa sách </th> <th> Tác giả </th><th> Tóm tắt </th> </tr></thead>';
	echo ' <tbody>';
	while( $row = $result->fetch_assoc() ) {
		echo '<tr>';
        echo "<td> " . $row["ma_tuasach"]. " </td><td> " . $row["tuasach"]. " </td><td> " . $row["tacgia"]."</td><td>". $row["tomtat"]. "</td>";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}