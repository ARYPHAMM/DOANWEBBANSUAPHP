<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('thuong_hieu');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xx2" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>Mã thương hiệu</td>
		<td>Tên thương hiệu</td>
		<td>Tình trạng</td>
		<td>Cập nhật / xóa </td>
	</tr>
	<?php
	$phantrang = new PhanTrang('thuong_hieu');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	<tr>    
		<td><?=$value['ma_th']?></td>
		<td><?=$value['ten_thuong_hieu']?></td>
		<td><?=$value['tinh_trang']?></td>
	    <td>
		<!-- <form name="chucnang" method="post" action=""> -->
		<input id="tr_sua<?=$i?>" onclick="capnhatthuonghieu('<?=$value['ma_th']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['ma_th']?>')" value="Xóa">
		<!--  </form> -->
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoath">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhatthuonghieu(e)
		{
			alert(e);
				$.ajax({
					method: "POST",
					url: "nhapthuonghieu.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapthuonghieu').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachthuonghieu.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx2').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})


		}
		function xoa(e)
		{
			if (!confirm("Bạn chắc chắn xóa , việc xóa sẽ mất hết các dữ liệu có liên quan!")) {
				    return;
				} 
               alert(e);
               // xoa du lieu lien quan 
               $.ajax({
					method: "POST",
					url: "xoa.php",
					data: {"xoa" : e , "table":"sua","madk":"thuong_hieu"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoath').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// xoa du lieu lien quan thuong hieu loai sua
               $.ajax({
					method: "POST",
					url: "xoa.php",
					data: {"xoa" : e , "table":"thuong_hieu_loai_sua","madk":"ma_th"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoath').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// xoa loai
				$.ajax({
					method: "POST",
					url: "xoa.php",
					data: {"xoa" : e , "table":"thuong_hieu","madk":"ma_th"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoath').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
					$.ajax({
					method: "GET",
					url: "danhsachthuonghieu.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx2').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

				$.ajax({
					method: "POST",
					url: "nhapthuonghieu.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatthuonghieu').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})

                
   
		}

		</script>
