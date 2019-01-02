<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('sua');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xx" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>Mã sữa</td>
		<td>Tên sữa</td>
		<td>Loại sữa</td>
		<td>Thương Hiệu</td>
		<td>Xuất xứ</td>
		<td>Mô tả</td>
		<td>Số lượng</td>
		<td>Giá</td>
		<td>Lứa tuổi</td>
		<td>Tinh trạng</td>
		<td>Năm sản xuất</td>
		<td>Khuyến mãi</td>
		<td>Trang chủ</td>
		<td>Hinh anh 1</td>
		<td>Hinh anh 2</td>
		<td>Hinh anh 3</td>
		<td>Cập nhật / xóa </td>
	</tr>
	<?php
	
	$phantrang = new PhanTrang('sua');

	$truyvandulieu = new XuLyDB();
	$laymotdong ;

	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
       
	?>
	
	<tr>
		
        
		<td><?=$value['ma_sua']?></td>
		<td><?=$value['ten_sua']?></td>
		<td><?php  $laymotdong = $truyvandulieu->lay_mot_dong('loai_sua','ma_loai_sua',$value['loai_sua']);
		echo $laymotdong['ten_loai']?></td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('thuong_hieu','ma_th',$value['thuong_hieu']);
		echo $laymotdong['ten_thuong_hieu']?></td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('quoc_gia','ma_qc',$value['xuat_su']);
		echo $laymotdong['ten_qc']?></td>
		<td><?=$value['mo_ta']?></td>
		<td><?=$value['so_luong']?></td>
		<td><?=number_format($value['gia'],3)?> VNĐ</td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('lua_tuoi','loai_tuoi',$value['lua_tuoi']);
		echo $laymotdong['tuoi']?></td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('tinh_trang','ma_tt',$value['tinh_trang']);
		echo $laymotdong['ten_tinh_trang']?></td>
		<td><?=$value['nam_sx']?></td>
		<td><?=$value['khuyen_mai']."%"?></td>
		 <td>
         	<?=$value['trang_chu'] == 0?"Không hiển thị":"Hiển thị"?>
         </td>
		<?php
		$truyvan = new XuLyDB();
        $hinhanh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$value['ma_sua']);
		 ?>
		<td ><img style="height:50px;width:50px;" src=../<?=$hinhanh['hinh_anh1']?>></td>
		<td ><img style="height:50px;width:50px;" src=../<?=$hinhanh['hinh_anh2']?>></td>
		<td ><img style="height: 50px;width:50px;" src=../<?=$hinhanh['hinh_anh3']?>></td>
		<?php
		 ?>


		 <td>
		<!-- <form name="chucnang" method="post" action=""> -->
		<input id="tr_sua<?=$i?>" onclick="capnhat('<?=$value['ma_sua']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['ma_sua']?>')" value="Xóa">
		<!--  </form> -->
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
		function capnhat(e)
		{
				$.ajax({
					method: "POST",
					url: "nhapsua.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapsua').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachsua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx').html(res);
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
				data: {"xoa" : e , "table":"sua","madk":"ma_sua"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoa').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
					$.ajax({
					method: "GET",
					url: "danhsachsua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

				$.ajax({
					method: "POST",
					url: "nhapsua.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhapsua').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})

                
   
		}

		</script>