
<?php
session_start();
   if($_SESSION['giohang'] == null)
     {
     	  header('Location:trangchu.php');
     }
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Giỏ hàng</title>
		<script src="js/xuly.js"></script>
	</head>
	<body>
		<div id="thaydoisl">
			<?php
			if($_POST['thay_doi_sl'] == 'cothaydoi')
            {
            	$giohang = [];
	            $giohang = $_SESSION['giohang'];
	            var_dump($giohang);
	          for($i = 0;$i < count($giohang);$i++)
	          {
		       if($giohang[$i]['ma_sua'] == $_POST['ma_sua'])
		           $giohang[$i]['so_luong'] = $_POST['so_luong'];
	          }
	        $_SESSION['giohang'] = $giohang;

		    ?>	
		    <script type="text/javascript">
		    	location.reload(); 
		    </script>
		    <?php }
		    ?>
		</div>
		<div id="xoagh">
			<?php
			if(isset($_POST['ma_sua']) && $_POST['thay_doi_sl'] == 'xoa')
{
	$giohang = [];
	for($i = 0;$i < count($_SESSION['giohang']);$i++)
	{
		if($_SESSION['giohang'][$i]['ma_sua'] != $_POST['ma_sua'])
		   $giohang[] = $_SESSION['giohang'][$i];
	}
	$_SESSION['giohang'] = $giohang;

		    ?>	
		    <script type="text/javascript">
		    	location.reload(); 
		    </script>
		    <?php }
		    ?>
		</div>
		<div id="gio">
			<table border="1">
			<tr>
				<th>Mã sữa</th>
				<th>Tên sữa</th>
				<th>Mô tả</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Khuyến mãi</th>
				<th>Hình ảnh</th>
				<th>Thành tiền</th>
				<th> </th>
			</tr>
			<?php
			$tongtien = 0;
			if(isset($_SESSION['giohang']))
			foreach ($_SESSION['giohang'] as $key => $value) {
			$tongtien += ($value['so_luong']*$value['gia']) - (($value['so_luong']*$value['gia'])*($value['khuyen_mai']/100));
			?>
			<tr>
				<td><?=$value['ma_sua']?></td>
				<td><?=$value['ten_sua']?></td>
				<td><?=$value['mo_ta']?></td>
				<td><form name="fsl" action="#" method="post">
					<input type="number"  min="0" onkeypress="kiemtraslam('<?=$value['ma_sua']?>',this.value)" onchange="thaydoisl('<?=$value['ma_sua']?>',this.value)"  name="so_luong" value="<?=$value['so_luong']?>"> 
                     </form>
                 </td>
				<td>
                      <?=number_format($value['gia'],3)?> VNĐ
				</td>
				<td><?=$value['khuyen_mai']?>%</td>
				<?php
					{
							$truyvan = new XuLyDB();
							$row = $truyvan->lay_sua('sua',$_GET['ma_sua']);
							$rowhinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$value['ma_sua']);
					?>
				<td><img height="200" width="200" src=<?=$rowhinh['hinh_anh1']?> ></td>
				<?php
			}
				?>
				<td><?=number_format(($value['so_luong']*$value['gia']) - (($value['so_luong']*$value['gia'])*($value['khuyen_mai']/100)),3)?>VNĐ</td>
				 <td><input type="button" value="xóa" onclick="xoagh('<?=$value['ma_sua']?>')" name=""><td>
			</tr>
			<?php
			}
			?>
			
			
		</table>
		<label>Tổng Tiền : <?=number_format($tongtien,3) ?> VNĐ</label>
		<br>
		<a href="thanhtoan.php" >Thanh toán</a>
	</body>
	<script src="js/jquery.min.js"></script>
		<script type="text/javascript">

				function thaydoisl(e,value)
				{
				
					if(value<=0)
              	{
              			$.ajax({
									method: "POST",
									url: "giohang.php",
									data: {"ma_sua" : e ,'so_luong' : 1,'thay_doi_sl': 'cothaydoi'}
								})
					
				               	.done(function(res){
									console.log("Thanh cong");
									$('#thaydoisl').html(res);
									
								})
								.fail(function(jsXHR, res){
									console.log("Loi");
									console.log(res);		
								})
              	}
              	else{
								$.ajax({
									method: "POST",
									url: "giohang.php",
									data: {"ma_sua" : e ,'so_luong' : value,'thay_doi_sl': 'cothaydoi'}
								})
					
				               	.done(function(res){
									console.log("Thanh cong");
									$('#thaydoisl').html(res);
									
								})
								.fail(function(jsXHR, res){
									console.log("Loi");
									console.log(res);		
								})
							}
				}
			function xoagh(e)
		{
             if (!confirm("Bạn chắc chắn xóa sản phẩm này!")) {
				    return;
				} 
				$.ajax({
					method: "POST",
					url: "giohang.php",
					data: {"ma_sua" : e ,"thay_doi_sl":'xoa'}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoagh').html(res);
					
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
	

                
   
		}
		</script>
</html>