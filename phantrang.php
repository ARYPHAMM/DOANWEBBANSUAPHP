	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<title>Danh muc</title>
		<link href="css/bootstrap.css" rel="stylesheet" />
		<script src="css/bootstrap.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/fontawesome-all.min.css" rel="stylesheet" />
		<link href="css/font-awesome.css" rel="stylesheet" />
		<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="main.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="css/main.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
		require('xuly.php');
			// var_dump($_GET);
			$_GET['trang'] = 1;
			$phantrang = new PhanTrang('sua');
			$phantrang->trang_hien_tai($_GET);
			$phantrang->tong_so_trang();
			$dulieu = $phantrang->fill_du_lieu();

		          foreach ($dulieu as $key => $row){
		?>
		<div>
			<div class="thongtinsp">
				<h4><?=$row['ten_sua']?></h4>

					<?php
		$truyvan = new XuLyDB();
        $hinhanh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$row['ma_sua']);
		 ?>
			<img id="hinhttsp" src=<?=$hinhanh['hinh_anh1']?>>
		<?php

		 ?>
				<h4>Giá:<?=number_format($row['gia'],3)?></h4>
				<a href="chitietsanpham?ma_sua=<?=$row['ma_sua']?>">Chi tiết sản phẩm</a>
			</div>
		</div>
		<?php
		}
		?>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				
		        <?php   
				if ($phantrang->get_Trang_Hien_Tai() > 1 && $phantrang->get_Tong_Trang() > 1){
				?>
                <li class="page-item"><a class="page-link" href="danhmuc.php?sua=<?=$_GET['sua']-1?>">Previous</a></li>
				<?php
				}
				for ($i = 1; $i <= $phantrang->get_Tong_Trang(); $i++){
							if($i == $phantrang->get_Trang_Hien_Tai() ){

				?>
				<li class="page-item"><a class="page-link" href="danhmuc.php?sua=<?=$i?>" ><span><?=$i?></span></a></li>
				
				<?php
				}
				else{
				?>
				<li class="page-item"><a class="page-link" href="danhmuc.php?sua=<?=$i?>"><?=$i?></a></li>
				<?php
			      }
				}
				if ($phantrang->get_Trang_Hien_Tai() < $phantrang->get_Tong_Trang() && $phantrang->get_Tong_Trang() > 1){
				?>
				<li class="page-item"><a class="page-link" href="danhmuc.php?sua=<?=$i+1?>">Next</a></li>
		       <?php
		        }
		       ?>
				</ul>
		</nav>
	</div>
</body>
</html>