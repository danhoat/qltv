<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if($id){

	$sql = "DELETE FROM news where id ={$id}";
	echo $sql;
	if(mysql_query($sql)){
		echo 'xóa thành công';

	} else {
		echo 'Xóa khong thành công';
	}
}
?>