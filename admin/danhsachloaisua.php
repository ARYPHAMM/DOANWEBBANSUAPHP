<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('loai_sua');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xx1" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>Mã loại sữa</td>
		<td>Tên loại sữa</td>
		<td>Tình trạng</td>
		<td>Cập nhật / xóa </td>
	</tr>
	<?php
	$phantrang = new PhanTrang('loai_sua');
	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	<tr>
		
		<td><?=$value['ma_loai_sua']?></td>
		<td><?=$value['ten_loai']?></td>
		<td><?=$value['tinh_trang']?></td>
		<td>
		<input id="tr_sua<?=$i?>" onclick="capnhatloaisua('<?=$value['ma_loai_sua']?>')" type="button" value=Cập nhật>
		 </td>
	</tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoa">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhatloaisua(e)
		{
			   alert(e);
				$.ajax({
					method: "POST",
					url: "nhaploaisua.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapsua1').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachloaisua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx1').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

				$.ajax({
					method: "POST",
					url: "nhaploaisua.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapsua1').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})


		}
		</script>