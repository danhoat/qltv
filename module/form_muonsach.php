<?php
$error = '';
$label = '';
$ma_cuonsach = '';
$ma_docgia = '';
if(isset($_POST['submit'])){
	$muon = Muon::getInstance();
	$ma_cuonsach = isset($_POST['ma_cuonsach']) ? $_POST['ma_cuonsach'] : 0;
	$ma_docgia = isset($_POST['ma_docgia']) ? $_POST['ma_docgia'] : 0;
	$result = $muon->muonSach($ma_cuonsach, $ma_docgia);
	if( isCustomError($result) ){
		$error = $result->getMessage();
	} else {
		$label =  'Mượn sách thành công <br />';
	}
}
?>

<form class="form-horizontal" action="" method="POST">
	<h3> Nhập thông tin mượn sách </h3>
	<?php if(!empty($error)) { ?>
	<div class="form-group">
		<label class="control-label col-sm-2" for="email"> &nbsp; </label>
		<div class="col-sm-8">
			<?php echo $error;?>
		</div>
	</div>
	<?php }  else if( !empty($label)) { ?>
	<div class="form-group">
		<label class="control-label col-sm-2" for="email"> &nbsp; </label>
		<div class="col-sm-8">
			<?php echo $label;?>
			Xem chi tiết mượn của cuốn sách <a target="blank" href="index.php?act=chi_tiet_muon&mcs=<?php echo $ma_cuonsach;?>">Chi tiết </a>
		</div>
	</div>
	<?php } ?>
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Mã độc giả</label>
		<div class="col-sm-8">
	  		<input type="text" class="form-control selectpicker" id="ma_docgia" required name="ma_docgia" data-live-search="true" value="<?php echo $ma_docgia;?>">
		</div>
		<div class="col-sm-2">
		<button class="btn" type="button" id="kiemTraDocGia">Kiểm tra</button>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Mã cuốn sách</label>
		<div class="col-sm-8">
	  		<input class="form-control selectpicker" required id="ma_cuonsach" name="ma_cuonsach" data-live-search="true" value="<?php echo $ma_cuonsach;?>">
		</div>
		<div class="col-sm-2">
		<button class='btn' id="kiemTraSach" type="button">Kiểm tra</button>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">&nbsp;</label>
		<div class="col-sm-10">
			<div id="result">
			</div>
			<div id="result_sach">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
		&nbsp;
		</div>
	    <div class="col-sm-2">
	    	<button type="submit" name="submit" class="btn btn-default">Lưu </button>
	    </div>
	</div>
</form>
<script type="text/javascript">

	$(function() {
		$("#kiemTraDocGia").click(function(event){
		 	var ma_docgia= $("#ma_docgia").val();
		 	if(ma_docgia == ''){
		 		return '';
		 	}
		 	var data = {"ma_docgia" : ma_docgia, "act":"kiemtradocgia"};

		   	$.ajax({
		     	url: "inc/ajax.php",
		      	type: "POST",
		      	data: data,
		  		datatype: 'json',
		      	success: function(res){
		      		if( res.success ){
			      		var template = "Khách hàng: "+ res.hoten + "<br/> ";
			      		template = template + 'Số sách đang mượn:' + res.so_sachdangmuon +  '<br />';
			      		template = template + 'Tình trạng : ' + res.muon_status + '<br />';
			      		template = template + "<a target = '_blank' href='index.php?act=chi_tiet_docgia&id="+res.ma_docgia+"'>Chi tiết</a>";
			      	} else {
			      		template = res.msg;
			      	}
			      	$("#result").html(template);

		      	},
		      	error:function(){
		          $("#result").html('Không tồn tại khách hàng này');

		      	}
		    });
		});
		$("#kiemTraSach").click(function(event){
		 	var ma_cuonsach= $("#ma_cuonsach").val();
		 	if(ma_cuonsach == ''){
		 		return '';
		 	}
		 	var data = {"ma_cuonsach":ma_cuonsach, "act" :"kiemtrasach"};

		   	$.ajax({
		     	url: "inc/ajax.php",
		      	type: "POST",
		      	data: data,
		  		datatype: 'json',
		      	success: function(res){
		      		var template;
		      		if(res.success){
			      		template = "Đầu sách: <a target='_blank' href='index.php?act=list_sach_by_isbn&isbn="+res.isbn+"'>"+ res.bia + " </a><br/> ";
			      		template = template + 'Tình trạng: ' + res.tt_text +  '<br />';
			      	} else {
			      		template = res.msg;
			      	}

		      		$("#result_sach").html(template);
		      	},
		      	error:function(){
		          $("#result_sach").html('không tồn tại khách hàng này');

		      	}
		    });
		})
	});

</script>
