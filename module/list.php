<h2> Danh sach tin tuc</h2>

<?php

	$page 			= isset($_GET['page']) ? $_GET['page'] :1;
	$posts_per_page = 5;
	$offset 		= ($page-1)* $posts_per_page;
	$sql 			= "SELECT * FROM news ORDER BY id DESC LIMIT {$offset}, {$posts_per_page}";
	$count 			= "SELECT * FROM news";
	$total 			= mysql_query($count);
	// total empty
	if( $total ){
		$total_record  	= mysql_num_rows($total);
		$total_pages 	= ceil($total_record/$posts_per_page);
		$result 		= mysql_query($sql);
		echo '<table><tr><th width="50">Thứ tự</th><th width="100">Hình ảnh</th><th width="200" align="left"> Tựa đề</th><th>Del</th><th> Edit </th></tr>';
		$i =1;
		while( $row = mysql_fetch_assoc($result) ){
			$img = $row['img'];
			echo '<tr>';
			echo "<td>{$i} </td>";
			echo "<td><img src='{$img}' width='50' height='50' /></td>";
			echo "<td>{$row['post_title']}</td>";
			echo "<td><a onClick ='return confirm_del()' href='index.php?act=del&id={$row['id']}'> X</a></td>";
			echo "<td><a  href='index.php?act=add&p_id={$row['id']}'> Edit</a></td>";
			echo '</tr>';
			$i++;

		}
		echo '</table>';

		phan_trang($total_pages, $posts_per_page, $page);
	} else {
		echo ' Danh sách bài viết rỗng';
	}
?>
