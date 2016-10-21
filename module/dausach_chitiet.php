<?php
	$error 		= '';
	$ma_tuasach = 0;
	$ngonngu 	= 0;
	$bia 		= '';
	$isbn 		= isset($_GET['id']) ? $_GET['id'] : 0;
	$objDausach = DauSach::getInstance();
	$dausach 	= $objDausach->getDauSach($isbn);
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
                    <h3 class="panel-title">Chi Tiết Đầu Sách</h3>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
	                <div class="row">
	                	<p class="col-sm-2"><strong>Tựa Sách:</strong></p>
	                	<div class="col-sm-10"><?php echo getTuaSachByISBN($isbn);?></div>
	                </div>
	                <div class="row">
	                	<p class="col-sm-2"><strong>Ngôn ngữ:</strong></p>
	                	<div class="col-sm-10"><?php echo 'Tiếng '.get_ngon_ngu($dausach['ngonngu']);?></div>
	                </div>
	                <div class="row">
	                	<p class="col-sm-2"><strong>Bìa:</strong></p>
	                	<div class="col-sm-10"><?php echo $dausach['bia'];?></div>
	                </div>
	                <div class="row">
	                	<p class="col-sm-2"><strong>Trạng thái:</strong></p>
	                	<div class="col-sm-10">
	                								    <?php
							    if($dausach['trangthai']){
							    	echo ' Có sẵn cho mượn';
							    } else {
							    echo 'Đã mượn hết hoặc không có trong kho';
							    }
						    	?>
	                	</div>
	                </div>
	                <div class="row">
	                	<p class="col-sm-2"><strong>Số lượng sách:</strong></p>
	                	<div class="col-sm-10">
	                		<?php echo demSoLuongDauSach($isbn);?> <a href="index.php?act=list_sach_by_isbn&isbn=<?php echo $isbn;?>"> Xem chi tiết</a>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>