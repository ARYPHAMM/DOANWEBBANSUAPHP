<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('loai_nguoi_dung');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xx4" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>Mã thương hiệu</td>
		<td>Tên loại người dùng</td>
		<td>Tình trạng</td>
		<td>Cập nhật / xóa </td>
	</tr>
	<?php
	$phantrang = new PhanTrang('loai_nguoi_dung');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	<tr>    
		<td><?=$value['ma_loai_nd']?></td>
		<td><?=$value['ten_loai_nd']?></td>
		<td><?=$value['tinh_trang']?></td>
	    <td>
		<!-- <form name="chucnang" method="post" action=""> -->
		<input id="tr_sua<?=$i?>" onclick="capnhatloainguoidung('<?=$value['ma_loai_nd']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['ma_loai_nd']?>')" value="Xóa">
		<!--  </form> -->
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoaloainguoidung">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhatloainguoidung(e)
		{
			alert(e);
				$.ajax({
					method: "POST",
					url: "nhaploainguoidung.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhaploainguoidung').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachloainguoidung.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx4').html(res);
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
					data: {"xoa" : e , "table":"nguoi_dung","madk":"loai_nguoi_dung"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoaloainguoidung').html(res);
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
					data: {"xoa" : e , "table":"loai_nguoi_dung","madk":"ma_loai_nd"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoaloainguoidung').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
					$.ajax({
					method: "GET",
					url: "danhsachloainguoidung.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx4').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

				$.ajax({
					method: "POST",
					url: "nhaploainguoidung.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatloainguoidung').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})

                
   
		}

		</script>
