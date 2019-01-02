<?php
require_once('../xulyDB.php');
require_once('../xuly.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiet hoa don</title>
</head>
<body>
	<H2>Chi tiết hóa đơn <?=$_GET['ma_hd']?></H2>
	<table border="1">
		<tr>
			<td>MAHD</td>
			<td>Mã sữa</td>
			<td>Tên sữa</td>
			<td>Số lượng</td>
			<td>Giá</td>
			<td>Thành Tiền</td>
			<td>Khuyến mãi</td>
		</tr>
	<?php
	 if(isset($_GET['ma_hd']))
	 {
	 	$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('cthoadon','ma_hd',$_GET['ma_hd']);
		?>
        <tr>
        	<td><?=$row['ma_hd']?></td>
        	<td><?=$row['ma_sua']?></td>
        	<td><?=$row['ten_sua']?></td>
        	<td><?=$row['so_luong']?></td>
        	<td><?=number_format($row['gia'],3)?> VNĐ</td>
        	<td><?=number_format($row['thanh_tien'],3)?> VNĐ</td>
        	<td><?=$row['khuyen_mai']?>%</td>
        </tr>

     <?php
	 }
	?>
		</table>

</body>
</html>