<?php
require_once('../xuly.php');
require('../xulyDB.php');
?>
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
	var_dump($_POST);
	$phantrang = new PhanTrang('hoa_don');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$mang =[];
	$mang['trang'] = $_GET['trang'];

	foreach ($_POST as $key => $value) {
		if($key == "baocao" && $value == "ngay")
		{
        $mang['trang'] = $_POST['trang'];
          $mang['YEAR(ngay_mua)'] =  $_POST['nam'];
          $mang['MONTH(ngay_mua)'] = $_POST['thang'];
          $mang['DAY(ngay_mua)'] =   $_POST['ngay'];

		}
	}
	$phantrang->trang_hien_tai($mang);
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
<div id="prenext">
				<form name="a" method="get" action="">
					<?php
							for ($i = 1; $i <= $phantrang->get_Tong_Trang(); $i++){
							if ($i == $phantrang->get_Trang_Hien_Tai()){
					?>
					<span><input id="tr_sua<?=$i?>" onclick="ptdt(this.value)" type="button" value=<?=$i?>></span>
					
					<?php
					}
					else{
					?>
					<input id="tr_sua<?=$i?>" onclick="ptdt(this.value)" type="button" value=<?=$i?>>
					
					<?php
					}
					}
					
					?>
					
				</form>
			    </div>