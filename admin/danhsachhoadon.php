<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('hoa_don');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->sap_xep('ngay_mua desc');
$phantrang->trang_hien_tai($_GET);
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xxhd" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>MAHD</td>
		<td>Tài khoản</td>
		<td>Họ tên người mua</td>
		<td>SDT </td>
		<td>Ngày mua</td>
		<td>Tổng thanh toán</td>
		<td>Địa chỉ</td>
		<td>Phí vận chuyển</td>
		<td>Tình trạng HD</td>
		<td>Xem CTHD</td>
		<td>Xóa/Cập nhật</td>
	</tr>
	<?php
	$phantrang = new PhanTrang('hoa_don');
	$phantrang->sap_xep('ngay_mua desc');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$phantrang->trang_hien_tai($_GET);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	    <tr>    
		<td><?=$value['ma_hd']?></td>
		<td><?=$value['tai_khoan']?></td>
		<td><?=$value['ho_ten_nguoi_mua']?></td>
		<td><?=$value['sdt']?></td>
		<td><?=$value['ngay_mua']?></td>
		<td><?=number_format($value['tong_thanh_toan'],3)?> VNĐ</td>
		<td><?=$value['dia_chi']?></td>
		<td><?=number_format($value['phi_van_chuyen'],3)?> VNĐ</td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('tinh_trang_hd','ma_tinh_trang',$value['tinh_trang']);
		echo $laymotdong['ten_tinh_trang']?></td>
        <td><a href="chitiethoadon.php?ma_hd=<?=$value['ma_hd']?>" target="_blank">CTHD</a></td>
        <td>
		<input id="tr_sua<?=$i?>" onclick="capnhathoadon('<?=$value['ma_hd']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['ma_hd']?>')" value="Xóa">
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoaloainguoidung">
 
    </div>
<div id="xoahd">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhathoadon(e)
		{
			alert(e);
				$.ajax({
					method: "POST",
					url: "capnhathoadon.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhathoadon').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
				$.ajax({
					method: "GET",
					url: "danhsachhoadon.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxhd').html(res);
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
               // xoa cthd truoc
                $.ajax({
					method: "POST",
					url: "xoa.php",
					data: {"xoa" : e , "table":"cthoadon","madk":"ma_hd"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoahd').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
               //xoa hoa don
				$.ajax({
					method: "POST",
					url: "xoa.php",
					data: {"xoa" : e , "table":"hoa_don","madk":"ma_hd"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoahd').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
					$.ajax({
					method: "GET",
					url: "danhsachhoadon.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxhd').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

				$.ajax({
					method: "POST",
					url: "capnhathoadon.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhathoadon').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})

                
   
		}

		</script>
