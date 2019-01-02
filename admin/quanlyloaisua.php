<?php
require_once('../xulyDB.php');
require_once('../xuly.php');

// if(isset($_GET['xoa']))
// {

//    $ma = ["ma_sua" => $_POST['xoa']];
//    $thucthi = new XuLyDB();
//    $thucthi->xoa('sua',$ma);

// }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nhap lieu sua</title>
	</head>
	<body >
		<h1 id="tieude">
				Quản lý loại sữa
		</h1>
		<div class="container-fluid">
			<div class="row">
				<div style="margin:0 auto;" id="bang1">

				</div>
             </div>
		</div>
						<div id="prenext">
				<form name="a" method="get" action="">
					<?php
				       $phantrang = new PhanTrang('loai_sua');
			           $phantrang->trang_hien_tai($_GET);
		           	   $phantrang->tong_so_trang();
		        	   $dulieu = $phantrang->fill_du_lieu();
			
					?>
					<?php
							for ($i = 1; $i <= $phantrang->get_Tong_Trang(); $i++){
							if ($i == $phantrang->get_Trang_Hien_Tai()){
					?>
					<span><input id="tr_sua<?=$i?>" onclick="ptloaisua(this.value)" type="button" value=<?=$i?>></span>
					
					<?php
					}
					else{
					?>
					<input id="tr_sua<?=$i?>" onclick="ptloaisua(this.value)" type="button" value=<?=$i?>>
					
					<?php
					}
					}
					
					?>
					
				</form>
			    </div>
		<div class="container">
			<div  class="row">
				<?php 
				  include_once('nhaploaisua.php')
				?>
			</div>
		</div>
		</body>
			<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
			
		$(document).ready(function(){
         $.ajax({
					method: "GET",
					url: "danhsachloaisua.php",
					data: {"trang" : 1}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#bang1').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})
		});
		function ptloaisua(e)
		{
			alert(e);

				$.ajax({
					method: "GET",
					url: "danhloaisachsua.php",
					data: {"trang" : e}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#bang1').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

		}
		
		</script>
	</html>