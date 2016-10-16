<form class="form-horizontal" action="" method="POST">
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Mã độc giả</label>
		<div class="col-sm-8">
	  		<input type="text" class="form-control selectpicker" id="ma_docgia" required name="ma_docgia" data-live-search="true">
		</div>
		<div class="col-sm-2">
		<span id="kiemTraDocGia">Kiểm tra</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Mã cuốn sách</label>
		<div class="col-sm-8">
	  		<input class="form-control selectpicker" required id="ma_cuonsach" name="ma_cuonsach" data-live-search="true">
		</div>
		<div class="col-sm-2">
		<span id="kiemTraSach">Kiểm tra</span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">&nbsp;</label>
		<div class="col-sm-10"> Thông báo;
			<div id="result">
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
		 	var data = {"ma_docgia":ma_docgia, "act=kiemtradocgia"};

		   	$.ajax({
		     	url: "inc/ajax.php",
		      	type: "POST",
		      	data: data,
		  		datatype: 'json',
		      	success: function(res){
		      		console.log(res);
		      		var template = "Khach hang: "+ res.hoten + "<br/> ";
		      		template = template + 'Số sách đang mượn:' + res.so_sachdangmuon +  '<br />';
		      		template = template + "<a target = '_blank' href='index.php?act=chi_tiet_docgia&id="+res.ma_docgia+"'>Chi tiết</a>";
		      		$("#result").html(template);
		      	},
		      	error:function(){
		          $("#result").html('không tồn tại khách hàng này');
		          $("#result").addClass('msg_error');
		          $("#result").fadeIn(1500);
		      	}
		    });
		});
		$("#kiemTraSach").click(function(event){
		 	var ma_cuonsach= $("#ma_cuonsach").val();
		 	var data = {"ma_cuonsach":ma_cuonsach, "act=kiemtrasach"};

		   	$.ajax({
		     	url: "inc/ajax.php",
		      	type: "POST",
		      	data: data,
		  		datatype: 'json',
		      	success: function(res){
		      		console.log(res);
		      		var template = "Khach hang: "+ res.hoten + "<br/> ";
		      		template = template + 'Số sách đang mượn:' + res.so_sachdangmuon +  '<br />';
		      		template = template + "<a target = '_blank' href='index.php?act=chi_tiet_docgia&id="+res.ma_docgia+"'>Chi tiết</a>";
		      		$("#result").html(template);
		      	},
		      	error:function(){
		          $("#result").html('không tồn tại khách hàng này');
		          $("#result").addClass('msg_error');
		          $("#result").fadeIn(1500);
		      	}
		    });
		})
	});

</script>
