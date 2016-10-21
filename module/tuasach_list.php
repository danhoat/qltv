<?php
$del_id = isset($_GET['del']) ? $_GET['del'] : '';
$tua_sach = TuaSach::getInstance();
if( !empty($del_id)){
    $tua_sach->delete_tua_sach($del_id);
}
$total = TuaSach::list_tua_sach($select_all = 1);
if( !empty($total) ){

	$url = '?act=tuasach_list&';
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
	$result = TuaSach::list_tua_sach($select_all = 0, $posts_per_page, $current_page );
	?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý tựa sách</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh Sách Tựa Sách: có <?php echo $total_record;?> Tựa Sách</h3>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<table class="table table-striped table-bordered table-hover">
						<thead>
						<tr>
							<th><input class ='checkbox selectall' type='checkbox' name=''></th>
							<th> Mã</th>
							<th> Tựa sách </th>
							<th> Tác giả </th>
							<th> Tóm tắt </th>
							<th> Tác vụ </th>
						</tr>
						</thead>
						<tbody>
					<?php
					while( $row = $result->fetch_assoc() ) {
				        $ma_tuasach = $row['ma_tuasach'];
				        ?>
						<tr>
				        	<td><input class ='checkbox' type='checkbox' name='remove[]'>
				        	<td><?php echo $ma_tuasach; ?></td>
				        	<td>
				        		<a href= '?act=tuasach_frm_add&id=<?php echo $ma_tuasach;?>'>
				        			<?php echo limit_string($row["tuasach"],25); ?>
				        		</a>
				        	</td>
				        	<td><?php echo $row["tacgia"]; ?></td>
				        	<td><?php echo limit_string($row["tomtat"],60); ?></td>
				        	<td>
				        		<a  class="btn btn-primary btn-circle"  href="?act=tuasach_frm_add&id=<?php echo $ma_tuasach; ?>">
				        			<i class="fa fa-pencil"></i></a>
				        		<a class="btn btn-danger btn-circle" href="<?php echo "{$url}page={$current_page}&del={$ma_tuasach}"; ?>" 
				        			onclick="return remove_tua_sach()"><i class="fa fa-times"></i></a>
				        	</tr>
				        <?php
				    }
				    ?>
				    	</tbody>
				    </table>
					<?php
				    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url );

				}
				?>

                </div>
            </div>
        </div>
    </div>
</div>