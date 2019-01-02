<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('nguoi_dung');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xx5" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>Tài khoản</td>
		<td>Mật khẩu</td>
		<td>Họ tên</td>
		<td>Năm sinh</td>
		<td>Email</td>
		<td>SDT</td>
		<td>Loại người dùng</td>
		<td>Địa chỉ</td>
		<td>Cập nhật / xóa </td>
	</tr>
	<?php
	$phantrang = new PhanTrang('nguoi_dung');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	<tr>    
		<td><?=$value['tai_khoan']?></td>
		<td><?=trim($value['mat_khau']," ")?></td>
		<td><?=$value['ho_ten']?></td>
		<td><?=$value['nam_sinh']?></td>
		<td><?=$value['email']?></td>
		<td><?=$value['sdt']?></td>
		<td><?=$value['loai_nguoi_dung']?></td>
		<td><?=$value['dia_chi']?></td>
	    <td>
		<!-- <form name="chucnang" method="post" action=""> -->
		<input id="tr_sua<?=$i?>" onclick="capnhatnguoidung('<?=$value['tai_khoan']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['tai_khoan']?>')" value="Xóa">
		<!--  </form> -->
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoanguoidung">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhatnguoidung(e)
		{
			alert(e);
				$.ajax({
					method: "POST",
					url: "nhapnguoidung.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapnguoidung').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachnguoidung.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx5').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})


		}
		function xoa(e)
		{
			if (!confirm("Bạn chắc chắn xóa!")) {
				    return;
				} 
               alert(e);
				$.ajax({
					method: "POST",
					url: "xoa.php",
					data: {"xoa" : e , "table":"nguoi_dung","madk":"tai_khoan"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoanguoidung').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
					$.ajax({
					method: "GET",
					url: "danhsachnguoidung.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx5').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

				$.ajax({
					method: "POST",
					url: "nhapnguoidung.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnguoidung').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})

                
   
		}

		</script>
