<?php
include('header.php');
$xuly = new XuLy();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Trang Chủ</title>
	</head>
	<body style="margin: 0 auto;">
		<div class="container">
			<div class="mucsphot">
               	<?php
											$truyvan = new XuLyDB();
											$xuy = new XuLy();
											$row = $truyvan->lay_du_lieu_theo_dieu_kien('sua',' tinh_trang = 3 and trang_chu = 1');
											
											foreach($row as $key => $value)
											{ 
							
							                  $rowhinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$value['ma_sua']);
			
				?>

				<a href="chitietsanpham.php?ma_sua=<?=$value['ma_sua']?>">
				<div class="thongtinsp">
					<h4><?=$chuoixuongdong = $xuy->xuong_dong($value['ten_sua'])?></h4>
					<span>Hot <i class="fa fa-fire"></i>
						<br>
						<?php
						if($value['khuyen_mai']!=0)
						echo 'KM'.$value['khuyen_mai'].'%';
						?>
					</span>
					<img id="hinhttsphot" src=<?=$rowhinh['hinh_anh1']?> >
					
				</div>
				</a>
				<?php
			}
				?>
			</div>
		</div>
	<div class="container">
			<nav class="navbar navbar-expand-sm backgroundnavdm navbar-dark">
				<a class="navbar-brand" href="#">Top 5 sản phẩm bán chạy</a>
			</nav>
			<div class="qcsp">
				<?php
											$truyvan = new XuLyDB();
											$xuy = new XuLy();
											$chuoixuongdong = $xuy->xuong_dong('abc abc abc abc abc abc abc');
											$row = $truyvan->lay_du_lieu_theo_dieu_kien('sua , cthoadon','sua.ma_sua = cthoadon.ma_sua
                                          group by cthoadon.ma_sua
                                          HAVING COUNT(cthoadon.ma_sua) >= COUNT(cthoadon.ma_sua) LIMIT 0,5');
											
											foreach($row as $key => $value)
											{ 
							
							                  $rowhinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$value['ma_sua']);
			
				?>
				<div class="thongtinsp">
					<h4><?=$chuoixuongdong = $xuy->xuong_dong($value['ten_sua'])?></h4>
					<span><?php
                             if($value['tinh_trang'] == 1)
                             	echo "Bán chạy";
                             if($value['tinh_trang'] == 2)
                             	echo "Mới";
                              if($value['tinh_trang'] == 3)
                             	echo "Hot";
					       ?>
						<br>
						<?php
						if($value['khuyen_mai']!=0)
						echo 'KM'.$value['khuyen_mai'].'%';
						?>
					</span>
					<img id="hinhttsp" src=<?=$rowhinh['hinh_anh1']?>>
					<h4>Giá: <?=number_format($value['gia'],3)?> VNĐ</h4>
					<a href="chitietsanpham.php?ma_sua=<?=$value['ma_sua']?>">Chi tiết sản phẩm</a>
				</div>
				
				<?php
				}
				?>
			</div>
	</div>
	<?php
  $truyvan = new XuLyDB();
  $row = $truyvan->lay_du_lieu_theo_dieu_kien('loai_sua',' tinh_trang = 1');
  foreach ($row as $key => $value) {
 ?>
<div class="container">
			<nav class="navbar navbar-expand-sm backgroundnavdm navbar-dark">
				<a class="navbar-brand" href=danhmuc.php?trang=1&&loai_sua=<?=$value["ma_loai_sua"]?> ><?=$value['ten_loai']?></a>
				
				<div class="navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<div class="dmhienthi">
								<ul>
									
									<li><a href="">Thương hiệu</a>					
									<ul>
										<?php
										$truyvanth = new XuLyDB();
										$bang = $truyvanth->lay_nhieu_dong_theo_id('thuong_hieu_loai_sua','ma_loai_sua',$value['ma_loai_sua']);
										
										foreach($bang as $key => $row)
										{
		
										?>
										<li><a href="danhmuc.php?trang=1&&thuong_hieu=<?=$row["ma_th"]?>&&loai_sua=<?=$value["ma_loai_sua"]?>"><?=$row['ten_thuong_hieu']?></a></li>
										<?php
										}
										?>
									</ul>
									
								</li>
							</ul>
							</div>
						</li>
						<li class="nav-item">      <a  class="nav-link" href=danhmuc.php?trang=1&&loai_sua=<?=$value['ma_loai_sua']?> >Tất cả sản phẩm sữa bột</a>    </li>
					</ul>
				</div>
			</nav>
            <div class="qcsp">
				<?php
											$truyvansua = new XuLyDB();
											$row = $truyvansua->lay_du_lieu_theo_dieu_kien('sua',' trang_chu = 1 and loai_sua ='.$value['ma_loai_sua']);
											
											foreach($row as $key => $valuesua)
											{ 
							
							                  $rowhinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$valuesua['ma_sua']);
			
				?>
				<div class="thongtinsp">
						<h4><?=$chuoixuongdong = $xuy->xuong_dong($valuesua['ten_sua'])?></h4>
					<span><?php
                             if($valuesua['tinh_trang'] == 1)
                             	echo "Bán chạy";
                             if($valuesua['tinh_trang'] == 2)
                             	echo "Mới";
                              if($valuesua['tinh_trang'] == 3)
                             	echo "Hot";
					       ?>
						<br>
						<?php
						if($valuesua['khuyen_mai']!=0)
						echo 'KM'.$valuesua['khuyen_mai'].'%';
						?>
					</span>
					<img id="hinhttsp" src=<?=$rowhinh['hinh_anh1']?>>
					<h4>Giá: <?=number_format($valuesua['gia'],3)?> VNĐ</h4>
					<a href="chitietsanpham.php?ma_sua=<?=$valuesua['ma_sua']?>">Chi tiết sản phẩm</a>
				</div>				
				<?php
				}
				?>				
			</div>
</div>
 <?php
  }
 ?>
	
      
		<div class="container">
			<nav class="navbar navbar-expand-sm backgroundnavdm navbar-dark">
				<!-- Brand -->
				<a class="navbar-brand" href="#">Góc Dinh Dưỡng</a>
				<!-- Toggler/collapsibe Button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Navbar links -->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">      <a class="nav-link" href="danhmuctintuc.php?trang=1">Tin tức</a>    </li>
						<?php
	                    $truyvan = new XuLyDB();
						$row = $truyvan->lay_du_lieu_theo_dieu_kien('loai_tin_tuc',' tinh_trang = 1');
						foreach ($row as $key => $value) {
						?>
						<li class="nav-item">      <a class="nav-link" href=danhmuctintuc.php?trang=1&&loai_tin_tuc=<?=$value['ma_loai_tt']?>   ><?=$value['ten_loai_tt']?></a>    </li>
						<?php
						}
						?>
					</ul>
				</div>
			</nav>
			<div class="tintuc">
					<?php
					$row = $truyvan->lay_du_lieu('tin_tuc order by ngay_viet desc');
					for ($i=0; $i < 5 ; $i++) { 

					?>
				<a href="chitiettintuc.php?ma_tin=<?=$row[$i]['ma_tin']?>">
					<div >
						<h4><?=$row[$i]['tieu_de']?></h4>
						<img id="hinhtt" style="width: 60px;width: 60px;" src="<?=$xuly->mang_hinh($row[$i]['hinh_anh'])[0]?>" alt="">
						<p style="color:black; font-size: 7px;"><?=$row[$i]['tom_tat']?></p>
					</div>
				</a>
						<?php
                     }
					?>
			</div>
		</div>	
   <div class="container-fluid">
   	<?php
   	include('footer.php');
   	?>
   </div>
 


	</body>
	<script type="text/javascript">
$(document).ready(function (e) {
	$( "img" ).hover(
  function() {
            $(this).fadeOut( 100 );
            $(this).fadeIn( 500 );
});
                     });
       </script>
</html>