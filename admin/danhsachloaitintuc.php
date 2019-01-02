<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('loai_tin_tuc');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xxloaitintuc" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>Mã loại tin tức</td>
		<td>Tên loại tin tức</td>
		<td>Tình trạng</td>
		<td>Cập nhật / xóa </td>
	</tr>
	<?php
	$phantrang = new PhanTrang('loai_tin_tuc');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	<tr>    
		<td><?=$value['ma_loai_tt']?></td>
		<td><?=$value['ten_loai_tt']?></td>
		<td><?=$value['tinh_trang']?></td>
	    <td>
		<!-- <form name="chucnang" method="post" action=""> -->
		<input id="tr_sua<?=$i?>" onclick="capnhatloaitintuc('<?=$value['ma_loai_tt']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['ma_loai_tt']?>')" value="Xóa">
		<!--  </form> -->
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoaloaitt">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhatloaitintuc(e)
		{
			alert(e);
				$.ajax({
					method: "POST",
					url: "nhaploaitintuc.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhaploaitintuc').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachloaitintuc.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxloaitintuc').html(res);
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
					data: {"xoa" : e , "table":"tin_tuc","madk":"loai_tin_tuc"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoaloaitt').html(res);
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
					data: {"xoa" : e , "table":"loai_tin_tuc","madk":"ma_loai_tt"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoaloaitt').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
					$.ajax({
					method: "GET",
					url: "danhsachloaitintuc.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxloaitintuc').html(res);
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
