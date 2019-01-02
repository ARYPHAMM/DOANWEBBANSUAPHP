<?php
include('header.php');
require_once('xuly.php');
// echo ;
$dulieu;
if(isset($_POST['tim']))
     {
          $truyvan = new XuLyDB();
          $dulieu = $truyvan->lay_du_lieu_theo_dieu_kien('sua',' ten_sua like '."'".'%'.$_POST['tim'].'%'."'");

     }
?>
<html>
	<head>
		<title>Danh muc</title>
	</head>
	<body>
	<div class="container">
          <div class="dssp">
               <?php
                $xuy = new XuLy();
               foreach ($dulieu as $key => $row){
               ?>
               <div>
                    <div class="thongtinsp">
                        <h4><?=$chuoixuongdong = $xuy->xuong_dong($row['ten_sua'])?></h4>
                         <span><?php
                             if($row['tinh_trang'] == 1)
                              echo "Bán chạy";
                             if($row['tinh_trang'] == 2)
                              echo "Mới";
                              if($row['tinh_trang'] == 3)
                              echo "Hot";

                          ?>
                              <br>
                              <?php
                              if($row['khuyen_mai']!=0)
                              echo 'KM'.$row['khuyen_mai'].'%';
                              ?>
                         </span>
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
          </div>
     </div>
    
</body>
</html>
 <script type="text/javascript">
$(document).ready(function (e) {
     $( "img" ).hover(
  function() {
            $(this).fadeOut( 100 );
            $(this).fadeIn( 500 );
});
                     });
                     </script>