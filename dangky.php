<?php
session_start();
include('xulyDB.php');
if(isset($_COOKIE['tai_khoan']))
{
                $truyvan = new XuLyDB();
                $taikhoan = $truyvan->lay_thong_tin_tk_cookie($_COOKIE['tai_khoan']);
				$_SESSION['nguoi_dung'] = $taikhoan;
}
if(isset($_SESSION['nguoi_dung']))
{
	header('Location:trangchu.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet" />
		<script src="css/bootstrap.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/xuly.js"></script>
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
	<body id="themndmoi">
		<?php
		if(isset($_POST['tai_khoan']))
		{

			
			   $dulieu = [ "tai_khoan"=> $_POST['tai_khoan'],"mat_khau"=> md5($_POST['mat_khau']), "ho_ten" =>$_POST['ho_ten'] , "nam_sinh" =>$_POST['nam_sinh'], "email" =>$_POST['email'],"sdt" =>$_POST['sdt'],"loai_nguoi_dung" =>$_POST['loai_nguoi_dung'],"loai_nguoi_dung" =>2,"dia_chi" =>rtrim($_POST['dia_chi'])   ];
	              $truyvan = new XuLyDB();
	             $row = $truyvan->them_moi($dulieu,'nguoi_dung');
	             if($row)
	             {
	             	 $taikhoan = $truyvan->lay_thong_tin_tk($_POST['tai_khoan'],md5($_POST['mat_khau']));

		           $_SESSION['nguoi_dung'] = $taikhoan;
		                  echo '<script language="javascript">';
                   echo 'alert("Tạo tài khoản thành công")';
                   echo '</script>';
		           header('Location:trangchu.php');
		    
		         }
			    
             
                    
                 else
                 {
                 	  echo '<script language="javascript">';
                 echo 'alert("Tạo tài khoản thất bại , tài khoản đã có người sỡ hữu vui lòng tạo lại với một cái tên khác")';
                 echo '</script>';
                 }


				

		}
		?>
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
			<div class="row">
				<div class="col-sm-7">
					<div class="taikhoan">
						<h3>Tạo Tài Khoản</h3>
						<form name="tk" method="post" action="">
							<p><i style="color:black;" class="fa fa-user"></i>Tên đăng nhập
								<br>
								<input type="text" name="tentk" placeholder="Tài khoản...">
							</p>
							<p><i  style="color:black;" class="fa fa-key"></i>Mật khẩu
								<br>
								<input  type="password" maxlength="" name="mktk" placeholder="Mật khẩu...">
							</p>
							<p>	<i style="color:black;" class="fa fa-info"></i>Họ và Tên
								<br>
								<input type="text" name="hotentk" placeholder="Họ và Tên...">
							</p>
							<p><i style="color:black;" class="fa fa-birthday-cake"></i>Ngày/Tháng/Năm sinh
								<br>
								<input type="date" name="ngaysinhtk" placeholder="Ngày sinh">
							</p>
							<p><i class="fa fa-envelope"></i>Email
								<br>
								<input type="text" name="emailtk" placeholder="Email">
							</p>
							<p><i class="fa fa-phone"></i>Số điện thoại
								<br>
								<input type="number" maxlength="11" name="sdttk" placeholder="Điện thoại">
							</p>
							<p><i class="fa fa-map-marker"></i>Địa chỉ
								<br>
								<textarea name="diachi">
								
								</textarea>
							</p>
							<div class="btndangnhap">
								<i class="fa fa-plus-circle"></i><input type="button"  value="Tạo" onclick="kiemtradk()">
							</form>
						</div>
					</div>
					
				</div>
				<div class="col-sm-5">
					<div id="thongbao">
						<p id="thongbaoloi" style="display: none;">abc></p>
						
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