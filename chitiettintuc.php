<?php
include('header.php');
require_once('xulyDB.php');
$xuly = new XuLy();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ChiTietTinTuc</title>
	</head>
	<body>
		<div class="container tintuc">
			<div class="row">

				<div class="col-sm-9 tintuc" > <!-- Noi dung tin tuc -->
				<div class="head">
					<?php
			    	$truyvan = new XuLyDB();
					$row = $truyvan->lay_du_lieu_tin_tuc('tin_tuc',$_GET['ma_tin']); 
					$luotxem = $row['luot_xem'];
					++$luotxem;
					$para = [ "ma_tin" => $row['ma_tin'],"luot_xem"=>$luotxem ];
					  $a =  $truyvan->cap_nhat($para, 'tin_tuc', 'ma_tin');
					?>
					<h2 id="tieudetintuc"> <?=$row['tieu_de']?> </h2>
					<span>Ngày đăng : <?php
                               $source = $row['ngay_viet'];
                               $date = new DateTime($source);
                               echo $date->format('d/m/Y H:i:s');
					?></span>
					<h3><?=$row['tom_tat']?></h3>
					<div class="noidung">
						<span><?=$xuly->noi_dung_tin_tuc($row['hinh_anh'],$row['noi_dung'],' ')?> </span>
					</div>
					<?php

					?>
				</div>
				<div class="bot-cmt">
					<p> Ý kiến bạn đọc </p>
					<div class="cmt">
						<textarea class="textykienbandoc"> </textarea>
					</div>
					<button class="binhluan"> Bình luận</button>
				</div>	
				</div>

			<div style="margin-top:5em;" class="col-sm-3 tinhot" > <!-- Xem nhieu nhat -->
			<div  class="xemnn">
				Tin tức hot
			</div>
			<div class="danhsachtinhot">
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
</div>
<div class="hinhthuonghieu">
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
</body>
</html>