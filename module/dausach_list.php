        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý đầu sách</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách đầu sách
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?php
								$isbn = isset($_GET['del']) ? $_GET['del'] : '';
								$dausach   = DauSach::getInstance();
								if( !empty($isbn)){
								    $dausach->xoaDauSach($isbn);
								}

								$total = DauSach::listDauSach($select_all = 1);
								if( !empty($total) ){

									$url           = 'act=dausach_list&';
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
									$result = DauSach::listDauSach($select_all = 0, $posts_per_page, $current_page );
									?>
	                                <table class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
											<th><label for="selectall"> <input class ="checkbox selectall" id= "selectall" type="checkbox" /></label></th>
											<th> ISBN</th>
											<th> Tựa sách </th>
											<th> Ngôn ngữ </th>
											<th> Số cuốn</th>
											<th> Tình trạng </td>
											<th> Tác vụ </th>
										</tr>
										</thead>
	                                    <tbody>
										<?php
											while( $row = $result->fetch_assoc() ) {
												$isbn 		= $row['isbn'];
												$ma_tuasach = $row['ma_tuasach'];
											    $ngonngu    = $row['ngonngu'];
												$trangthai 	= ($row['trangthai'] == 1)  ?  'Có sẵn' :'Hết';
												?>
												<tr>
													<td><input class="checkbox" id="checkbox" type="checkbox" /></td>
													<td><?php echo $isbn; ?></td>
													<td><a class="text-inline" href="?act=dausach_chitiet&id=<?php echo $isbn?>"><?php echo $row['bia']; ?></a></td>
													<td><?php echo get_ngon_ngu($ngonngu); ?></td>
													<td><?php echo demSoLuongDauSach($isbn); ?></td>
													<td><?php echo $trangthai; ?></td>
													<td>
														<a class="btn btn-primary btn-circle" href="?act=dausach_frm_add&id=<?php echo $isbn; ?>">
														<i class="fa fa-plus"></i></a>
														<a class="btn btn-danger btn-circle" href="<?php echo $url;?>page=<?php echo $current_page;?>&del=<?php echo $isbn;?>"><i class="fa fa-times"></i></a>
													</td>
												</tr>
												<?php
											}
										?>
	                                    </tbody>
	                                </table>
									<?php
								    echo paginate( $posts_per_page, $current_page, $total_record,  $max_page, $url = '?act=dausach_list');
								} else {
								    echo 'Chưa có đầu sách nào trong hệ thống';
								    ?>
								    <a href="?act=dausach_frm_add"> Thêm mới một đầu sách</a>
								    <?php
								}
								?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->