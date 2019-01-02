<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('thuong_hieu_loai_sua');
// if($_GET['trang'] == 0)
// {
//   $_GET['trang'] = 1;

// }
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xx3" name="chucnang" method="post" action="">
	
<table border="1px">
	<tr style="background: lightblue;">
		<td>id</td>
		<td>Tên thương hiệu</td>
		<td>Thương hiệu</td>
		<td>Loại Sữa</td>
		<td>Cập nhật / xóa </td>
	</tr>
	<?php
	$phantrang = new PhanTrang('thuong_hieu_loai_sua');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	<tr>    
		<td><?=$value['id']?></td>
		<td><?=$value['ten_thuong_hieu']?></td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('thuong_hieu','ma_th',$value['ma_th']);
		echo $laymotdong['ten_thuong_hieu']?></td>
	    <td><?php $laymotdong = $truyvandulieu->lay_mot_dong('loai_sua','ma_loai_sua',$value['ma_loai_sua']);
		echo $laymotdong['ten_loai']?></td>
	    <td>
		<!-- <form name="chucnang" method="post" action=""> -->
		<input id="tr_sua<?=$i?>" onclick="capnhatthuonghieuloaisua('<?=$value['id']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['id']?>')" value="Xóa">
		<!--  </form> -->
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoathloaisua">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhatthuonghieuloaisua(e)
		{
			alert(e);
				$.ajax({
					method: "POST",
					url: "nhapthuonghieuloaisua.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapthuonghieuloaisua').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachthuonghieuloaisua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx3').html(res);
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
					data: {"xoa" : e , "table":"thuong_hieu_loai_sua","madk":"id"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoathloaisua').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
					$.ajax({
					method: "GET",
					url: "danhsachthuonghieuloaisua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx3').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})
                
                $.ajax({
					method: "POST",
					url: "nhapthuonghieuloaisua.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapthuonghieuloaisua').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
                
   
		}

		</script>
