
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<?php 
	require('cauhinh.php');
				$sql = "INSERT INTO thuong_hieu_loai_sua(ten_thuong_hieu, ma_th, ma_loai_sua) VALUES('".$_GET["ten_thuong_hieu"]."','".$_GET["ma_th"]."','".$_GET["ma_loai_sua"]."')";
				$conn->query($sql);
		
				echo $_GET["ten_thuong_hieu"]; 
			$conn->close();
?>
<form name="f" action="" method="get">
		<table border="1">
			<tr>
				<td>Ten thuong hieu</td>
				<td>Loai thuong hieu</td>
				<td>Loai Sua</td>
			</tr>
			<tr>

				<td>
					<select name="ten_thuong_hieu">
						<?php
									include('cauhinh.php');
									$sql = "SELECT * FROM thuong_hieu";
									$result = $conn->query($sql);
									while($row = $result->fetch_assoc())
									{
						?>
						<option value=<?=$row["ten_thuong_hieu"]?> ><?=$row["ten_thuong_hieu"]?> </option>
						<?php
						}
										$result->close();
										$conn->close();
						?>
					</select>
				</td>
				<td>
					<select name="ma_th">
					<?php
								include('cauhinh.php');
								$sql = "SELECT * FROM thuong_hieu";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc())
								{
					?>
					<option value=<?=$row["ma_th"]?> ><?=$row["ten_thuong_hieu"]?> </option>
					<?php
					}
									$result->close();
									$conn->close();
					?>
				</select>
			</td>
			<td>
				<select name="ma_loai_sua">
					<?php
								include('cauhinh.php');
								$sql = "SELECT * FROM loai_sua";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc())
								{
					?>
					<option value=<?=$row["ma_loai_sua"]?> ><?=$row["ten_loai"]?> </option>
					<?php
					}
									$result->close();
									$conn->close();
					?>
				</select>
		</td>
	</tr>
	<tr>
		<td>
			
				<input type="submit" name="" value="them">
			
		</td>
	</tr>
</table>
</form>
</body>
</html>