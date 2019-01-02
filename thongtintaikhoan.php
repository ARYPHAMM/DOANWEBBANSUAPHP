<?php
include('header.php');
require_once('xuly.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin tài khoản</title>
</head>
<body >
	<div style="margin-top:5em;" class="container-fluid">
		<div class="row">
			<div class="col-lg-7">
				<?php
				include('lichsumuahang.php');
				?>
			</div>
			<div class="col-lg-5">
				<?php
				$truyvan = new XuLyDB();
				$row = $truyvan->lay_mot_dong('nguoi_dung','tai_khoan',$_SESSION['nguoi_dung']['tai_khoan']);
				?>
				<h3>Thông tin tài khoản</h3>
				<table>
					<tr>
						<td>Tài khoản: </td>
						<td> <?=$row['tai_khoan']?></td>

					</tr>
					<tr>
						<td>Họ tên: </td>
						<td> <?=$row['ho_ten']?></td>
					</tr>
					<tr>
						<td>Nam sinh: </td>
						<td><?php
                               $source = $row['nam_sinh'];
                               $date = new DateTime($source);
                               echo $date->format('d/m/Y');
						?></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td> <?=$row['email']?></td>
					</tr>
					<tr>
						<td>SDT: </td>
						<td> <?=$row['sdt']?></td>
					</tr>
					<tr>
						<td>Địa chỉ: </td>
						<td> <?=$row['dia_chi']?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
