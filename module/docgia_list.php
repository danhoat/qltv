<?php
$del_id     = isset($_GET['del']) ? $_GET['del'] : '';
$docgia   = DocGia::getInstance();
if( !empty($del_id)){
    $docgia->xoaDocGia($del_id);
}
$total = DocGia::danhSachDocGia($select_all = 1);
if( !empty($total) ){

	$url = '?act=docgia_list&';
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
	$result = DocGia::danhSachDocGia($select_all = 0, $posts_per_page, $current_page );
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý Độc Giả</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh Sách Độc Giả: có <?php echo $total_record; ?> độc giả</h3>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                	<table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th> Mã</th>
                            <th> Tên độc giả </th>
                            <th> Tình trạng </td>
                            <th> Tác vụ </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        	while( $row = $result->fetch_assoc() ) {
                        		$ma_docgia 	= $row['ma_docgia'];
                                $hoten      = $row['hoten'];
                                //$tenlot     = $row['tenlot'];
                                //$ten        = $row['ten'];
                        		$tinhtrang 	= '';
                                ?>
                        		<tr>
                                    <td> <?php echo $ma_docgia;?>  </td>
                                    <td> <a class='' href= '<?php echo "index.php?act=chi_tiet_docgia&id=".$ma_docgia;?>'> <?php echo $hoten ;?></a> </td>
                                    <td><?php echo $tinhtrang; ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-circle" href="?act=docgia_frm_add&id=<?php echo $ma_docgia; ?>">
                                            <i class="fa fa-plus"></i></a>
                                        <a class="btn btn-danger btn-circle" href="<?php echo "{$url}page={$current_page}&del={$ma_docgia}"; ?>">
                                            <i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                        ?>

                        </tbody>
                    </table>
                    <?php
                    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url );
                } ?>
                </div>
            </div>
        </div>
    </div>
</div>