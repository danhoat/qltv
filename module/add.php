<?php
$p_id = isset($_GET['p_id']) ?  $_GET['p_id'] : '';
$post_title = $post_content = '';
if($p_id){
	$sql 	= "SELECT * FROM news where id = {$p_id}";
	$result = mysql_query($sql);
	$row 	= array();
	if ($result){
		$row 	= mysql_fetch_assoc($result);
		$post_title 	= $row['post_title'];
		$post_content 	= $row['post_content'];
	}

}
?>
	<h3> Thêm mới bài viết</h3>
	<form action ="" class="add" method="POST" id="add_new" enctype="multipart/form-data" onSubmit="return check_form();">

		<div class="row">
			<label> Tên bài viết</label> : <input id="post_tile" class="txtinput" type="text" value="<?php echo $post_title;?>" name ="post_title"/>
		</div>
		<div class="row">
			<label> Nội dung</label> : <textarea id="post_content" class="txtarea" name="post_content"><?php echo $post_content;?></textarea>
		</div>
		<div class="row">
			<label> Hình ảnh</label> : <input class="txtinput" type="file" name ="img"/>
		</div>
		<div class="row">
			<input type="hidden" name="p_id" value="<?php echo $p_id;?>">
			<input type="reset" value="Reset" /> <input type="submit" name="submit" />
		</div>

	</form>
<?php

	if( isset ($_POST['submit']) ){
		$p_id 		 	= isset($_POST['p_id']) ? $_POST['p_id']:'';
		$post_title 	= $_POST['post_title'];
		$post_content 	= $_POST['post_content'];
		if(is_numeric($p_id)){
			$sql ="UPDATE  news SET post_title =  '{$post_title}', post_content = '{$post_content}' WHERE id = {$p_id}";
			echo $sql;
			$id = mysql_query($sql);
			if( $id ){
				echo 'update thanh cong';
			}
		} else {

			$post_date 		=  date("Y-m-d H:i:s",time());
			if(!empty($post_title)){
				$sql ="INSERT INTO news(post_title,post_content,post_date) VALUES('{$post_title}','{$post_content}','{$post_date}' )";

				$id = mysql_query($sql);
				if( $id ){

					if(isset($_FILES['img'])){
						$file = $_FILES['img'];
						$url = upload_file($file);

						if($url){
							$id = mysql_insert_id();
							$sql = "UPDATE news SET img = '{$url}' WHERE id= {$id}";
							$t = mysql_query($sql);
							if($t == TRUE){
								echo 'update img thành công';
							} else {
								echo 'Add img lỗi';
							}
						}
					}
					echo 'Insert thanh cong';
					header("Location:index.php");
					exit;

				} else {
					echo ' Lỗi';
				}
			}
		} // end insert.
	}
?>