<?php
session_start();
 if($_SESSION['nguoi_dung'] != null)
{
	if($_SESSION['nguoi_dung']['loai_nguoi_dung'] != 1)
	{
	header('Location:../trangchu.php');
	}
}
else
{
header('Location:../trangchu.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quản lý web sữa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<script src="../css/bootstrap.js"></script>
		<script src="../js/jquery-3.2.1.min.js"></script>
		<link href="../css/bootstrap.min.css" rel="stylesheet" />
		<link href="../css/fontawesome-all.min.css" rel="stylesheet" />
		<link href="../css/font-awesome.css" rel="stylesheet" />
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/main.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="../css/main.css" rel="stylesheet" />
		<link href="../css/main.css" rel="stylesheet" />
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.elevateZoom-3.0.8.min.js"></script>
		<meta charset="utf-8" />
</head>
<body class="qlbody">
	<div class="container-fluid">
		<div class="row">
			<div style="float:left">
        <h3>Xin chào <?php echo $_SESSION['nguoi_dung']['tai_khoan'];
                    ?></h3>
        <span><i class="fa fa-bars"></i></span>
				<ul id="ql">
          <li id="qlbaocao"><i class="fa fa-caret-right"></i> Báo cáo thống kê</li>
					<li id="qlloaisua"><i class="fa fa-caret-right"></i> Quản lý loại sữa</li>
					<li id="qlsua"><i class="fa fa-caret-right"></i> Quản lý sữa</li>
					<li id="qlthuonghieu"><i class="fa fa-caret-right"></i> Quản lý thương hiệu</li>
					<li id="qlthuonghieuloaisua"><i class="fa fa-caret-right"></i> Quản lý thương hiệu của danh mục</li>
					<li id="qlloainguoidung"><i class="fa fa-caret-right"></i> Quản lý loại người dùng</li>
					<li id="qlnguoidung"><i class="fa fa-caret-right"></i> Quản lý người dùng</li>
					<li id="qlhoadon"><i class="fa fa-caret-right"></i> Quản lý các hóa đơn</li>
	        <li id="qltintuc"><i class="fa fa-caret-right"></i> Quản lý tin tức</li>
          <li id="qlloaitintuc"><i class="fa fa-caret-right"></i> Quản lý loại tin tức</li>
           <li><i class="fa fa-caret-right"></i><a href="logo.php" target='_blank'>Đổi logo trang chủ</a></li>
					<li><a href="../dangxuat.php">Đăng xuất</a></li>
				</ul>
			</div>
			<div style="float:left">
				<form name="quanly">
			
				<div style="display: none;margin:0 auto;" id="quanlysuahienhanh">
                 <?php  include_once('quanlysua.php'); ?>
				</div>
				<div style="display: none;margin:0 auto;" id="quanlyloaisuahienhanh">
                   <?php  include_once('quanlyloaisua.php'); ?>
				</div>
				<div style="display: none;margin:0 auto;" id="quanlythuonghieu">
                  <?php  include_once('quanlythuonghieu.php'); ?>
				</div>
				<div style="display: none;margin:0 auto;" id="quanlythuonghieuloaisua">
                  <?php  include_once('quanlythuonghieuloaisua.php'); ?>
				</div>
				<div style="display: none;margin:0 auto;" id="quanlyloainguoidung">
   		          <?php  include_once('quanlyloainguoidung.php'); ?>
				</div>
				<div style="display: none;margin:0 auto;" id="quanlynguoidung">
   		          <?php  include_once('quanlynguoidung.php'); ?>
				</div>
				<div style="display: none;margin:0 auto;" id="quanlyhoadon">
   		          <?php  include_once('quanlyhoadon.php'); ?>
				</div>
        <div style="display: none;margin:0 auto;" id="quanlytintuc">
                <?php  include_once('quanlytintuc.php'); ?>
        </div>
        <div style="display: none;margin:0 auto;" id="quanlyloaitintuc">
                <?php  include_once('quanlyloaitintuc.php'); ?>
        </div>
             <div style="display: none;margin:0 auto;" id="quanlybaocao">
                 <?php  include_once('thongkedoanhthu.php'); ?>
        </div>
			</form>
			</div>
		</div>
	</div>
</body>
</html>
	<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
        $(document).ready(function(){
           $('#ql').hide();
            $(".fa.fa-bars").hover(function(){
               $('#ql').show('1000', function() {
                 
               });;

            });
             $("*").click(function(){
               $('#ql').hide('slow/1000/fast', function() {
                 
               });;

            });

        });



            $( "#qlsua" ).click(function() {
              $('#ql').hide();
            quanlysuahienhanh.style.display = "block";
              quanlyloaisuahienhanh.style.display = "none";
                         quanlythuonghieuloaisua.style.display = "none";
                          quanlythuonghieu.style.display = "none";
                          quanlyloainguoidung.style.display = "none";
                              quanlyhoadon.style.display = "none";
                                quanlytintuc.style.display = "none";
                                  quanlynguoidung.style.display = "none";
                                    quanlyloaitintuc.style.display = "none";
                                      quanlybaocao.style.display = "none";

          });
             $("#qlloaisua").click(function() {
              $('#ql').hide();
           quanlyloaisuahienhanh.style.display = "block";
            quanlysuahienhanh.style.display = "none";
                       quanlythuonghieuloaisua.style.display = "none";
                        quanlythuonghieu.style.display = "none";
                        quanlyloainguoidung.style.display = "none";
                         quanlynguoidung.style.display = "none";
                             quanlyhoadon.style.display = "none";
                               quanlytintuc.style.display = "none";
                                 quanlyloaitintuc.style.display = "none";
                                   quanlybaocao.style.display = "none";

          });
           $("#qlthuonghieu").click(function() {
            $('#ql').hide();

           quanlythuonghieu.style.display = "block";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
                 quanlythuonghieuloaisua.style.display = "none";
                 quanlyloainguoidung.style.display = "none";
                  quanlynguoidung.style.display = "none";
                      quanlyhoadon.style.display = "none";
                        quanlytintuc.style.display = "none";
                          quanlyloaitintuc.style.display = "none";
                            quanlybaocao.style.display = "none";
          });
              $("#qlthuonghieuloaisua").click(function() {
                $('#ql').hide();

            quanlythuonghieuloaisua.style.display = "block";
              quanlythuonghieu.style.display = "none";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
               quanlyloainguoidung.style.display = "none";
                quanlynguoidung.style.display = "none";
                    quanlyhoadon.style.display = "none";
                      quanlytintuc.style.display = "none";
                        quanlyloaitintuc.style.display = "none";
                          quanlybaocao.style.display = "none";
          });
              $("#qlloainguoidung").click(function() {
                $('#ql').hide();

             quanlyloainguoidung.style.display = "block";
            quanlythuonghieuloaisua.style.display = "none";
              quanlythuonghieu.style.display = "none";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
                quanlynguoidung.style.display = "none";
                    quanlyhoadon.style.display = "none";
                      quanlytintuc.style.display = "none";
                        quanlyloaitintuc.style.display = "none";
                          quanlybaocao.style.display = "none";
          });
               $("#qlnguoidung").click(function() {
                $('#ql').hide();

             quanlynguoidung.style.display = "block";

             quanlyloainguoidung.style.display = "none";
            quanlythuonghieuloaisua.style.display = "none";
              quanlythuonghieu.style.display = "none";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
                   quanlyhoadon.style.display = "none";
                     quanlytintuc.style.display = "none";
                       quanlyloaitintuc.style.display = "none";
                         quanlybaocao.style.display = "none";
          });
               $("#qlhoadon").click(function() {
                $('#ql').hide();

             quanlyhoadon.style.display = "block";
             quanlynguoidung.style.display = "none";
             quanlyloainguoidung.style.display = "none";
            quanlythuonghieuloaisua.style.display = "none";
              quanlythuonghieu.style.display = "none";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
                quanlytintuc.style.display = "none";
                  quanlyloaitintuc.style.display = "none";
                    quanlybaocao.style.display = "none";
          });
               $("#qltintuc").click(function() {
                $('#ql').hide();

             quanlytintuc.style.display = "block";
               quanlyhoadon.style.display = "none";
             quanlynguoidung.style.display = "none";
             quanlyloainguoidung.style.display = "none";
            quanlythuonghieuloaisua.style.display = "none";
              quanlythuonghieu.style.display = "none";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
               quanlyloaitintuc.style.display = "none";
                 quanlybaocao.style.display = "none";
          });
               $("#qlloaitintuc").click(function() {
                $('#ql').hide();
                 quanlyloaitintuc.style.display = "block";
             quanlytintuc.style.display = "none";
               quanlyhoadon.style.display = "none";
             quanlynguoidung.style.display = "none";
             quanlyloainguoidung.style.display = "none";
            quanlythuonghieuloaisua.style.display = "none";
              quanlythuonghieu.style.display = "none";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
               quanlybaocao.style.display = "none";
          });
               $("#qlbaocao").click(function() {
                $('#ql').hide();
                 quanlybaocao.style.display = "block";
                 quanlyloaitintuc.style.display = "none";
             quanlytintuc.style.display = "none";
               quanlyhoadon.style.display = "none";
             quanlynguoidung.style.display = "none";
             quanlyloainguoidung.style.display = "none";
            quanlythuonghieuloaisua.style.display = "none";
              quanlythuonghieu.style.display = "none";
              quanlysuahienhanh.style.display = "none";
               quanlyloaisuahienhanh.style.display = "none";
          });

		</script>	