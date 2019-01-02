<?php
include('header.php');
require_once('xuly.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Trang Chu</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="Tintucchinh">
					<h2>
					Tin tức / Sự kiện
					</h2>
				</div>
				<div>
					
				</div>
				<div class="col-md-4">
					<img src="hinh/thuonghieu01.jpg" id="hinhtintucheader" />
				</div>
				<div class="col-md-8">
					<div class="trai">
						<div class="hinhttuc"> 
							<img src="hinh/thuonghieu03.jpg" id="hinhtintucheader""/>
						</div>
						<div class="hinhttuc"> 
							<img src="hinh/thuonghieu02.png" id="hinhtintucheader"/>
						</div>
					</div>
					<div class="phai">
						<div class="hinhttuc"> 
							<img src="hinh/thuonghieu05.jpg" id="hinhtintucheader""/>
						</div>
						<div class="hinhttuc"> 
							<img src="hinh/thuonghieu04.jpg" id="hinhtintucheader"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
			<div class="col-lg-9 Trum">				
				<div class="khungtintuc">
				<div class="container">
					<?php
					    $xuly = new XuLy();
				  		$truyvan = new XuLyDB();
						$phantrang = new PhanTrang('tin_tuc');
						$phantrang->trang_hien_tai($_GET);
						$phantrang->set_so_trang(5);
                        $phantrang->sap_xep('ngay_viet desc');

						$phantrang->tong_so_trang();
						if($phantrang->get_Tong_Trang() == 0)
						{
							return;
						}
						else
						{
						$value1 = $phantrang->fill_du_lieu();
			            }
						foreach ($value1 as $key => $value) {
	
						?>
							<div class="danhsachtintuc">
								<a href="chitiettintuc.php?ma_tin=<?=$value['ma_tin']?>">
								<div class="hinh-lelf"> 
									<img src='<?=$xuly->mang_hinh($value['hinh_anh'])[0]?>' id="hinhtintuc123"/>
								</div>
							    <div class="nd-right">
									<div class="tieudetintuc"><h3><?=$value['tieu_de']?></h3></div>
									<div class="noidungtomtat"> <p><?=$value['tom_tat']?></p></div>
							   	</div>
								</a>

					      	</div>					      
						<?php
						}
					?>
				</div>
			</div>
			</div>
			<div class="col-lg-3 tinhot">
					<div class="xemnn">
				Tin tức được quan tâm nhiều
			      </div>
			      <br>
				<ul class="danhsachtinhot">
					<?php 
					$loaitin="";
					if(isset($_GET['loai_tin_tuc']))
					{
                        $loaitin = 'loai_tin_tuc = '.$_GET['loai_tin_tuc'].' and ';
					}
					$row = $truyvan->lay_du_lieu_theo_dieu_kien('tin_tuc ', $loaitin.'luot_xem !=0 GROUP by ma_tin HAVING luot_xem >= luot_xem LIMIT 0,5');
					foreach ($row as $key => $value) {
									?>
									<a href=chitiettintuc.php?ma_tin=<?=$value['ma_tin']?> >
									<div > 
										
									<img style="height: 40px;width: 40px;" src='<?=$xuly->mang_hinh($value['hinh_anh'])[0]?>' /><span ><?=$value['tieu_de']?></span>						

								    </div>
									
									</a>
									<br>
						<?php
						}
						?>
				</ul>
			</div>
		    </div>
		</div>
         <div >
         	<nav class="prexet" aria-label="Page navigation example">
			<?php
			if($phantrang->get_Tong_Trang() > 1)
			{
			?>
			<ul class="pagination">
				<?php
				$urlpt = "danhmuctintuc.php?";
				$mang = [];
				$trang = [];
				$giatri = [];
				$mang = array_slice($_GET,0,count($_GET)); // lay mang con
				foreach($mang as $key => $value) {
				$trang[] = $key;
				$giatri[] = $value;
					$urlpt = $urlpt . $key.'='.$value . "&&";
					}
					$urlpt = substr( $urlpt,  0, count($sql) -2);
				
				// echo $urlpt ."<br>";
				$urltrangke;
						if ($phantrang->get_Trang_Hien_Tai() > 1 && $phantrang->get_Tong_Trang() > 1){
						$urltrangke = str_replace($trang[0].'='.$giatri[0], $trang[0].'='.($giatri[0]-1),$urlpt);
	
				
				?>
				
				<li class="page-item"><a class="page-link" href="<?=$urltrangke?>" >Previous</a></li>
				<?php
				}
				for ($i = 1; $i <= $phantrang->get_Tong_Trang(); $i++){
							if($i == $phantrang->get_Trang_Hien_Tai() ){
								$next = $i;
				$urltrangke = str_replace($trang[0].'='.$giatri[0], $trang[0].'='.$i,$urlpt);
				?>
				<li class="page-item"><a class="page-link" href="<?=$urltrangke?>" ><span><?=$i?></span></a></li>
				
				<?php
				}
				else{
					$urltrangke = str_replace($trang[0].'='.$giatri[0], $trang[0].'='.$i,$urlpt);
				?>
				<li class="page-item"><a class="page-link" href="<?=$urltrangke?>"><?=$i?></a></li>
				<?php
				}
				}
				if ($phantrang->get_Trang_Hien_Tai() < $phantrang->get_Tong_Trang() && $phantrang->get_Tong_Trang() > 1){
					$urltrangke = str_replace($trang[0].'='.$giatri[0],$trang[0].'='.($giatri[0]+1),$urlpt);
				?>
				<li class="page-item"><a class="page-link" href="<?=$urltrangke?>">Next</a></li>
				<?php
				}
				?>
			</ul>
			<?php
			}
			?>
		</nav>
         </div>


		<div  class="hinhthuonghieu">
			<div class="col-md-2"><img src="hinh/thuonghieu01.jpg" id="thuonghieu" /></div>
			<div class="col-md-2"><img src="hinh/thuonghieu02.png" id="thuonghieu" /></div>
			<div class="col-md-2"><img src="hinh/thuonghieu03.jpg" id="thuonghieu" /></div>
			<div class="col-md-2"><img src="hinh/thuonghieu04.jpg" id="thuonghieu" /></div>
			<div class="col-md-2"><img src="hinh/thuonghieu05.jpg" id="thuonghieu" /></div>
			<div class="col-md-2"><img src="hinh/thuonghieu06.jpg" id="thuonghieu" /></div>
		</div>
		<div class="footertintuc">	
			<div class="headfooter">
				<div class="col-md-3">
					<ul>
						<li> <a href="trangchu.php" id="linkchufooter"> Trang chủ </a></li>
						<li> <a href="sanpham.php" id="linkchufooter"> Sản phẩm </a></li>
						<li> <a href="lienhe.php" id="linkchufooter"> Liên hệ với chúng tôi</a></li>
						<li> <a href="tintuc.php" id="linkchufooter"> Tin tức / Sự kiện </a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul>
						<li>Chính sách bảo mật</li>
						<li>Chính sách khuyến mãi</li>
						<li>Chính sách chăm sóc khách hàng</li>
						<li>Chính sách tài khoản</li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul>
						<li>Thông tin Blue Milk</li>
						<li>Thông tin tài chính</li>
						<li>Báo cáo thường niên</li>
						<li>Hỗ trợ</li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul>
						<li> <a href="taikhoan.php" id="linkchufooter">Tài khoản </a></li>
						<li> <a href="tintuc.php" id="linkchufooter">Đăng ký tài khoản </a></li>
						<li>Hot line : 19001668</li>
						<li>Email : bluemilk@gmail.com</li>
					</ul>
				</div>
			</div>
			<div class="botfooter">
				Bản quyền thuộc về BlueMilk @2018 
				<a href="https://www.facebook.com/profile.php?id=100004215572399" style="float: right;margin-right: 20px; color: #c9dcea;"> Facebook </a>
			</div>
		</div>
	</body>
</html>