<?php
session_start();
include('xulyDB.php');
$truyvan = new XuLyDB();
$taikhoan;
if(isset($_COOKIE['tai_khoan']))
{
	          
              $taikhoan = $truyvan->lay_thong_tin_tk_cookie($_COOKIE['tai_khoan']);
			  $_SESSION['nguoidung'] = $taikhoan;
}
if(isset($_SESSION['nguoi_dung']))
{
	header('Location:trangchu.php');
}
if(isset($_POST['ten_dang_nhap']) && isset($_POST['mat_khau']))
{
                $taikhoan = $truyvan->lay_thong_tin_tk($_POST['ten_dang_nhap'],md5($_POST['mat_khau']));
                var_dump($taikhoan);
                if(isset($taikhoan))
                {
                   if($_POST['ghi_nho'] == true)
                   {
	                setcookie('tai_khoan',$taikhoan['tai_khoan'],time() + 60*60*24);
                   }
		           $_SESSION['nguoi_dung'] = $taikhoan;
		           if($_SESSION['nguoi_dung']['loai_nguoi_dung'] != 1)
		           {
		           header('Location:trangchu.php');
		           }else{
		           	 header('Location:admin/quanly.php?trang=1');
		           }
			    }
			   else
			   {
                 echo '<script language="javascript">';
                 echo 'alert("Kiểm tra thông tin tài khoản")';
                 echo '</script>';
			   }
		
}
else
{
             
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet" />
		<script src="css/bootstrap.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/fontawesome-all.min.css" rel="stylesheet" />
		<link href="css/font-awesome.css" rel="stylesheet" />
		<link href="css/bootstrap.css" rel="stylesheet" />
	<!-- 	<link href="../css/bootstrap.min.css" rel="stylesheet" /> -->
		<!-- <link href="../css/fontawesome-all.min.css" rel="stylesheet" />
		<link href="../css/font-awesome.css" rel="stylesheet" /> -->
		<!-- <link href="../css/bootstrap.css" rel="stylesheet" /> -->

		<!-- <link href="../css/main.css" rel="stylesheet" /> -->
		<link href="css/main.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	
		<link href="css/main.css" rel="stylesheet" />
		<link href="css/main.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
		<meta charset="utf-8" />
    </head>
    <body>
    	<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light backgroundnav">
				<a class="navbar-brand" href="trangchu.php">
				<?php
						$doc = new DOMDocument();
						    $doc->load('admin/logo.xml');
						 
						    $KhachHang = $doc->getElementsByTagName( "tenlogo" );
						    $makh;
						    foreach( $KhachHang as $item )
						    {
						        $tagMaKH = $item->getElementsByTagName( "tenlogo" );
						        $makh = $tagMaKH->item(0)->nodeValue;
						        break;

						    }
                 ?>	
				<img  style="height: 40px;width: 40px;background: rgba(240, 230, 140, 0.73);" src="<?=$makh?>">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="trangchu.php">Trang Chủ<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Sản Phẩm
							</a>




							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
										$truyvan = new XuLyDB();

										$bang = $truyvan->lay_du_lieu('loai_sua');
                                       
										foreach($bang as $key => $row)
										{
										?>
								         <a class="dropdown-item" href="danhmuc.php?trang=1&&loai_sua=<?=$row["ma_loai_sua"]?>">
								        <?=$row['ten_loai']?></a>
								        <ul class="dmc3">

                                        <?php
                                            $bangth = $truyvan->lay_du_lieu_theo_dieu_kien('thuong_hieu_loai_sua','ma_loai_sua = '.$row['ma_loai_sua']);
                                                foreach ($bangth as $key1 => $value) {
                                        ?>
                                      	
									
									   <li >
										<a href="danhmuc.php?trang=1&&thuong_hieu=<?=$value["ma_th"]?>"><i class="fa fa-chevron-right"></i> <?=$value["ten_thuong_hieu"]?></a>
									   </li>
									

	

								       <?php
								         }
								         ?>
								          </ul>
								         <?php
								           }
								        ?>
								
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Liên Hệ</a>
						</li>
						<li class="nav-item">
							<a href="giohang.php"><i class="fa fa-shopping-cart"></i></a>
						</li>
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Tin tức
							</a>




							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								 <a class="dropdown-item" href="danhmuctintuc.php?trang=1">
								        Tin tức mới</a>
                                        <?php
										$truyvan = new XuLyDB();

										$bang = $truyvan->lay_du_lieu('loai_tin_tuc');
                                       
										foreach($bang as $key => $row)
										{
										?>
								         <a class="dropdown-item" href="danhmuctintuc.php?trang=1&&loai_tin_tuc=<?=$row["ma_loai_tt"]?>">
								        <?=$row['ten_loai_tt']?></a>
								
								         <?php
								           }
								        ?>
								
							</div>
						</li>

					</ul>
					<form class="form-inline my-2 my-lg-0"  action="timkiem.php" method="post">
						<input class="form-control mr-sm-2" type="search" name="tim" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
					<form name="thanhvien">
						<?php
						    if($_SESSION['nguoi_dung'] != null)
							{
								       
							
						?>
							<div class="dmhienthi">
								<ul>
									<li><a href=""><?php echo $_SESSION['nguoi_dung']['tai_khoan'];
										?></a>					
									<ul>
										<li><a href="thongtintaikhoan.php">Thông tin tài khoản</a></li>
										<li><a href="dangxuat.php">Thoát</a></li>
									</ul>
								</li>
							</ul>
							</div>
                           
						<?php
						}else {
						?>
                           <a class="nav-link user" href="dangnhap.php"><i class="fa fa-user"></i></a>
						<?php
					    }
						?>
					</form>
				</div>
			</div>
		<div class="container-fluid">
			<div class="row" style="margin: 0 auto">
				<div class="taikhoan">
					<h3>Đăng nhập</h3>
					<form name="dn" method="post" >
		
							<i style="color:black;" class="fa fa-user"></i>Tên đăng nhập 
							<br>
							<input type="text" name="ten_dang_nhap" placeholder="Tài khoản...">
							<br>   
							<i style="color:black;" class="fa fa-key"></i>Mật khẩu
							<br>
							<input type="password" name="mat_khau" placeholder="Mật khẩu...">
							<br>
							<input type="checkbox" name="ghi_nho"> Ghi nhớ đăng nhập
							 <br>
							<div class="btntaikhoan"> 
							<i class="fa fa-sign-in"></i><input type="submit" name="" value="Đăng nhập"> <a href="#" >Quên mật khẩu</a>
							
							</div>
							<br>
							Bạn chưa có tài khoản ?<a href="dangky.php" >Tạo tài khoản</a>					
					</form>
				</div>
			</div>
		</div>
				<div class="container-fluid">
   	<?php
   	include('footer.php');
   	?>
   </div>
	</body>
</html>