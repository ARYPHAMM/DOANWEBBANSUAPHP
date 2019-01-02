<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đặt hàng thành công</title>
</head>
<body>
	<?php
	
	?>
	<div class="container">
		<div class="donhang">
			<table border="1">
		        <h3>Đặt đơn hàng thành công</h3>
				<tr>
				<th>Tên sữa</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Khuyến mãi</th>
				<th>Thành tiền</th>
			</tr>
			<?php
			$tongtien = 0;
			if(isset($_SESSION['giohang']))
			foreach ($_SESSION['giohang'] as $key => $value) {
			$tongtien += ($value['so_luong']*$value['gia']) - (($value['so_luong']*$value['gia'])*($value['khuyen_mai']/100));
			?>
			<tr>
			
				<td><?=$value['ten_sua']?></td>
				<td><?=$value['so_luong']?>
                 </td>
				<td>
                      <?=number_format($value['gia'],3)?> VNĐ
				</td>
				<td><?=$value['khuyen_mai']?>%</td>
				<td><?=number_format(($value['so_luong']*$value['gia']) - (($value['so_luong']*$value['gia'])*($value['khuyen_mai']/100)),3)?>VNĐ</td>
			</tr>
			<?php
			}
			?>
			</table>
			<div class="thongtinhd">
				            <label>Người nhận : <?=$_SESSION['hoadon']['ho_ten_nguoi_mua']?></label>
				            <br>
				            <label>Địa chỉ : <?=$_SESSION['hoadon']['dia_chi']?></label>
				            <br>
				            <label>Phí vận chuyển : <?=number_format($_SESSION['hoadon']['phi_van_chuyen'],3)?> VNĐ</label>
				            <br>
							<label>Tổng thanh toán : <?=number_format($_SESSION['hoadon']['tong_thanh_toan'],3)?> VNĐ</label>
							<br>
							<a href="trangchu.php" >Tiếp tục mua hàng</a>
		</div>
			</div>
		<?php
           unset($_SESSION['giohang']);
            unset($_SESSION['hoadon']);
		?>
		</div>
	</div>
		
</body>
</html>