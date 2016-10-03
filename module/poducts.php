<h2> Danh sach tin tuc</h2>

<?php

	$page 			= isset($_GET['page']) ? $_GET['page'] :1;
	$posts_per_page = 5;
	$offset 		= ($page-1)* $posts_per_page;
	$sql 			= "SELECT * FROM products ORDER BY id DESC LIMIT {$offset}, {$posts_per_page}";
	$count 			= "SELECT * FROM products";
	$total 			= mysql_query($count);
	// total empty
	if( $total ){
		$total_record  	= mysql_num_rows($total);
		$total_pages 	= ceil($total_record/$posts_per_page);
		$result 		= mysql_query($sql);
		echo '<div class="row">';
		$i =1;
		while( $row = mysql_fetch_assoc($result) ){
			$img = $row['img'];
			$id = $row['id'];
			echo "<div class='item'><img src='uploads/{$img}' width='150'  />";
			echo "<h4 class='product-title'>{$row['title']}</h4>";
			echo "<a class='btn-cart' href='index.php?act=add_cart&id={$id}'>Add card</a>";
			echo "</div>";

			$i++;

		}
		echo '</div>';

		phan_trang($total_pages, $posts_per_page, $page);
	} else {
		echo ' Danh sách bài viết rỗng';
	}
?>
