<?php
include('header.php');
require_once('xuly.php');
$xuly = new XuLy();
$urlpt = "danhmuc.php?";
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

?>
<html>
	<head>
		<title>Danh muc</title>
	</head>
	<body>
    <div class="container">
    	<div style="margin-top:5em" class="tuychondanhmuc">
    	   <span>Các loại sữa : </span><select onchange="location = this.options[this.selectedIndex].value;">
				    <option>Chọn</option>
				   <?php
              

					$truyvan = new XuLyDB();
					$row = $truyvan->lay_du_lieu_theo_dieu_kien('loai_sua','tinh_trang = 1');
					foreach($row as $key => $value)
					{
                               
					?>
					<option value=<?=$urlpt?>&&loai_sua=<?=$value['ma_loai_sua']?> >  <?=$value['ten_loai']?> </option>
					<?php
					}
					?>
				</select>​
    	</div>

        <div style="margin-top:5em" class="tuychondanhmuc">
    	   <span>Khuyến mãi : </span><select onchange="location = this.options[this.selectedIndex].value;">
				    <option>Chọn</option>
				   <?php
               
                      
					$truyvan = new XuLyDB();
					$row = $truyvan->lay_du_lieu('khuyen_mai');
										
					foreach($row as $key => $value)
					{
						
						if($value['phan_tram'] != 0){
					?>
					<option value=<?=$urlpt?>&&khuyen_mai=<?=$value['phan_tram']?> >  <?=$value['phan_tram']?> %</option>
					<?php
				    }
					}
					?>
				</select>​
    	</div>

           <div style="margin-top:5em" class="tuychondanhmuc">
    	   <span>Tình trạng : </span><select onchange="location = this.options[this.selectedIndex].value;">
				    <option>Chọn</option>
					<option value=<?=$urlpt?>&&tinh_trang=1>Bán chạy</option>
					<option value=<?=$urlpt?>&&tinh_trang=2 >Mới</option>
					<option value=<?=$urlpt?>&&tinh_trang=3 >Hot</option>
				</select>​
    	    </div>

    	    <div style="margin-top:5em" class="tuychondanhmuc">
    	   <span>Theo giá : </span><select onchange="location = this.options[this.selectedIndex].value;">
				    <option>Chọn</option>
					<option value=<?=$urlpt?>&&gia=0>Giá tăng</option>
					<option value=<?=$urlpt?>&&gia=-1>Giá giảm</option>
				</select>​
    	    </div>

    	    <div style="margin-top:5em" class="tuychondanhmuc">
				<form name="f">
				<input type="text" name="tenth" size="20" onkeyup="showResult(this.value)">
				<input type="button" onclick="timth()" value="Tìm">
				<div id="timthuonghieu"></div>
				</form>
    	    </div>

    </div>
	<div class="container-fluid">
		<div class="dssp">
			<?php
	            
				$phantrang = new PhanTrang('sua');
			    foreach ($_GET as $key => $value) {
			    	if($key == 'gia')
			    	{
			    			if($value == -1)
				            {
					         $phantrang->sap_xep('gia  ASC');
				            }
				            if($value == -2)
				             {
					         $phantrang->sap_xep('gia DESC');
				             }
			    	}
			    }
				$phantrang->trang_hien_tai($_GET);
				$phantrang->tong_so_trang();
				if($phantrang->get_Tong_Trang() == 0)
				{
					return;
				}
				else

				{
				$dulieu = $phantrang->fill_du_lieu();
			}
			foreach ($dulieu as $key => $row){
			?>
			<div>
				<div class="thongtinsp">
					<h4><?=$chuoixuongdong = $xuly->xuong_dong($row['ten_sua'])?></h4>
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
					<h4>Giá:<?=number_format($row['gia'],3)?> VNĐ</h4>
					<a href="chitietsanpham?ma_sua=<?=$row['ma_sua']?>">Chi tiết sản phẩm</a>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
		<nav class="prexet" aria-label="Page navigation example">
			<?php
			if($phantrang->get_Tong_Trang() > 1)
			{
			?>
			<ul class="pagination">
				<?php



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
	<div class="container-fluid">
   	<?php
   	include('footer.php');
   	?>
   </div>
</body>
</html>
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">       
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        	<script src="js/jquery.min.js"></script>
	   <script type="text/javascript">
$(document).ready(function (e) {
	$( "img" ).hover(
  function() {
            $(this).fadeOut( 100 );
            $(this).fadeIn( 500 );
});

});
	   	


function showResult(str) {
  if (str.length==0) { 
    document.getElementById("timthuonghieu").innerHTML="";
    document.getElementById("timthuonghieu").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    	if(this.responseText.slice(0, 4) == "dung")
    	{
    		var trang = "<?php echo $urlpt; ?>";
             window.location="danhmuc.php?trang=1&&thuong_hieu="+this.responseText.slice(4);
             return;
    	}
      document.getElementById("timthuonghieu").innerHTML=this.responseText;
      // document.getElementById("timthuonghieu").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","timthuonghieu.php?q="+str,true);
  xmlhttp.send();
}
function timth()
{
	alert("1");
  xmlhttp.open("GET","timthuonghieu.php?tenth="+f.tenth.value,true);
  xmlhttp.send();
}
       </script>
