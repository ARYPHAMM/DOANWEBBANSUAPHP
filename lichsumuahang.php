<?php
require_once('xulyDB.php');
require_once('xuly.php');
session_start();
?>
<div id="banghd">
				<h3 align="center">Lịch sử mua hàng</h3>

	<?php
	$phantrang = new PhanTrang('hoa_don');
	$truyvandulieu = new XuLyDB();
	$phantrang->sap_xep('ngay_mua desc');
	$laymotdong;
	$mang = [];
	$mang['trang'] = 1;
	if(isset($_GET))
	{
        $mang['trang'] = $_GET['trang'];
	}	
	$mang['tai_khoan'] = "'".$_SESSION['nguoi_dung']['tai_khoan']."'";
	$phantrang->trang_hien_tai($mang);
	 $phantrang->set_so_trang(2);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
		<table border="1px">
	    <tr style="background: lightblue;">
		<td>MAHD</td>
		<td>Họ tên người mua</td>
		<td>SDT </td>
		<td>Ngày mua</td>
		<td>Tổng thanh toán</td>
		<td>Địa chỉ</td>
		<td>Phí vận chuyển</td>
		<td>Tình trạng HD</td>
	</tr>	
	    <tr>    
		<td><?=$value['ma_hd']?></td>
		<td><?=$value['ho_ten_nguoi_mua']?></td>
		<td><?=$value['sdt']?></td>
		<td><?=$value['ngay_mua']?></td>
		<td><?=number_format($value['tong_thanh_toan'],3)?> VNĐ</td>
		<td><?=$value['dia_chi']?></td>
		<td><?=number_format($value['phi_van_chuyen'],3)?> VNĐ</td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('tinh_trang_hd','ma_tinh_trang',$value['tinh_trang']);
		echo $laymotdong['ten_tinh_trang']?></td>
        <td>
	   </tr>
	   	</table>

	     <?php
	      $cthd = $truyvandulieu->lay_nhieu_dong_theo_id('cthoadon','ma_hd',$value['ma_hd']);
	      if(count($cthd) > 0)
	      {
	      	echo "<h3>Chi tiết hóa đơn</h3>";
	      ?>
	      	   	<table border="1px">
	   	<tr>
			<td>MAHD</td>
			<td>Mã sữa</td>
			<td>Tên sữa</td>
			<td>Số lượng</td>
			<td>Giá</td>
			<td>Thành Tiền</td>
			<td>Khuyến mãi</td>
		</tr>
	      <?php

	        foreach ($cthd as $keycthd => $valuecthd) {
	     ?>
	      <tr>
	 	    <td><?=$valuecthd['ma_hd']?></td>
        	<td><?=$valuecthd['ma_sua']?></td>
        	<td><?=$valuecthd['ten_sua']?></td>
        	<td><?=$valuecthd['so_luong']?></td>
        	<td><?=number_format($valuecthd['gia'],3)?> VNĐ</td>
        	<td><?=number_format($valuecthd['thanh_tien'],3)?> VNĐ</td>
        	<td><?=$valuecthd['khuyen_mai']?>%</td>
	 </tr>
	<?php
		 }
		}
    ?>
</table>
<br>
<hr  style="    border-top: 1px solid #333;" width="90%">
    <?php
	}
	?>
<div id="prenext">
				<form name="a" method="get" action="">

					<?php
                           if($dulieu != null)
                           {
                           $a = $truyvandulieu->lay_count('hoa_don where tai_khoan = '."'".$_SESSION['nguoi_dung']['tai_khoan']."'",'ma_hd');
                         
                              if(  $a['ma_hd']% 2 != 0)
                              {
                                     $a['ma_hd'] =$a['ma_hd']/ 2;
                                   ++$a['ma_hd'];
                              }
                              else
                              {
                              	 $a['ma_hd'] =$a['ma_hd']/ 2;
                              }
							for ($i = 1; $i <=  $a['ma_hd']; $i++){
							if ($i == $phantrang->get_Trang_Hien_Tai()){
					?>
					<span><input id="tr_sua<?=$i?>" onclick="pthd(this.value)" type="button" value=<?=$i?>></span>
					
					<?php
					}
					else{
					?>
					<input id="tr_sua<?=$i?>" onclick="pthd(this.value)" type="button" value=<?=$i?>>
					
					<?php
					}
					}
			}
					?>
					
				</form>
			    </div>
</div>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
      alert(e);

				$.ajax({
					method: "GET",
					url: "lichsumuahang.php",
					data: {"trang" : 1}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#banghd').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})
		});
	function pthd(e)
		{
			alert(e);

				$.ajax({
					method: "GET",
					url: "lichsumuahang.php",
					data: {"trang" : e}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#banghd').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})

		}
</script>