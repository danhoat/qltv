
<?php
	$act = isset($_GET['act']) ? $_GET['act'] : '';
?>
	<ul class="nav navbar-nav">
		<li class="wrap"> <a href="#"  class="heading"> Sách</a>
			<ul class="sub">
				<li class ="<?php checkMenu('list_sach', $act) ?>  hide"> <a href="index.php?act=list_sach">Tất cả sách</a></li>
				<li class ="<?php checkMenu('list_dau_sach', $act) ?>" > <a href="index.php?act=list_dau_sach">Đầu sách</a></li>
				<li class ="<?php checkMenu('frm_add_dau_sach', $act) ?> "> <a href="index.php?act=frm_add_dau_sach">Thêm đầu sách</a></li>
				<li class ="<?php checkMenu('list_tua_sach', $act) ?>" > <a href="index.php?act=list_tua_sach">Tựa sách</a></li>
				<li class ="<?php checkMenu('frm_add_tua_sach', $act) ?>" > <a href="index.php?act=frm_add_tua_sach">Thêm tựa sách</a></li>
				<li class ="<?php checkMenu('frm_insert_book', $act) ?> hide" > <a href="index.php?act=frm_insert_book">Thêm Cuốn sách</a></li>
			</ul>
		</li>
		<li class="wrap">
			<a class="heading" href="#">Độc giả</a>
			<ul class="sub">
				<li class ="<?php checkMenu('list_docgia', $act) ?>" > <a href="index.php?act=list_docgia">Danh sách độc giả</a></li>
				<li class ="<?php checkMenu('form-insert-user', $act) ?>"> <a href="index.php?act=form-insert-user">Thêm mới độc giả</a></li>
			</ul>

		</li>

		<li class="wrap">
			<a class="heading" href="#">Mượn Sách</a>
			<ul class="sub">
				<li class ="<?php checkMenu('list_sach_dangmuon', $act) ?>" > <a href="index.php?act=list_sach_dangmuon">Sách Đang mượn</a></li>
				<li class ="<?php checkMenu('list_sachquahan', $act) ?>" > <a href="index.php?act=list_muon_quahan">Sách Quá Hạn</a></li>
				<li class ="<?php checkMenu('form_muonsach', $act) ?>" > <a href="index.php?act=form_muonsach">Mượn sách</a></li>

			</ul>
		</li>

		<li class="wrap"> <a class="heading" href="index.php?act=dbstruct"> Lược đồ dữ liệu</a></li>
	</ul>
