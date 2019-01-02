<?php
require_once('../xuly.php');
require_once('../xulyDB.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
	<div style="margin: 5em 0 0em 0;" id="danhsach">
		<div style=" margin: 0 auto;">
		<form name="ftk" action="" method="post">
			<input type="radio" name="doanhthu" value="ngay" checked>Ngày
			<input type="radio" name="doanhthu" value="thang">Tháng
			<input type="radio" name="doanhthu" value="nam">Năm
			<br>
			Chọn :<input type="date"  name="nthangnam" placeholder="Ngày sinh">
			<br>
			<input type="button" onclick="xembaocao(1)" value="Xem báo cáo">
		</form>
	    </div>
		<table border="1px">
	<tr style="background: lightblue;">
		<td>MAHD</td>
		<td>Tài khoản</td>
		<td>Họ tên người mua</td>
		<td>SDT </td>
		<td>Ngày mua</td>
		<td>Tổng thanh toán</td>
		<td>Địa chỉ</td>
		<td>Phí vận chuyển</td>
		<td>Tình trạng HD</td>
		<td>Xem CTHD</td>
		<td>Xóa/Cập nhật</td>
	</tr>
	<?php
	var_dump($_POST);
	$phantrang = new PhanTrang('hoa_don');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$mang =[];
	$mang['trang'] = $_GET['trang'];
    if(isset($_POST['trang']))
    {
    	$mang['trang'] = $_POST['trang'];


    }
	foreach ($_POST as $key => $value) {
		if($key == "baocao" && $value == "ngay")
		{
        
          $mang['YEAR(ngay_mua)'] =  $_POST['nam'];
          $mang['MONTH(ngay_mua)'] = $_POST['thang'];
          $mang['DAY(ngay_mua)'] =   $_POST['ngay'];

		}
	}
	$mang['tinh_trang'] = 1;
	$phantrang->trang_hien_tai($mang);
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	
	    <tr>    
		<td><?=$value['ma_hd']?></td>
		<td><?=$value['tai_khoan']?></td>
		<td><?=$value['ho_ten_nguoi_mua']?></td>
		<td><?=$value['sdt']?></td>
		<td><?=$value['ngay_mua']?></td>
		<td><?=number_format($value['tong_thanh_toan'],3)?> VNĐ</td>
		<td><?=$value['dia_chi']?></td>
		<td><?=number_format($value['phi_van_chuyen'],3)?> VNĐ</td>
		<td><?php $laymotdong = $truyvandulieu->lay_mot_dong('tinh_trang_hd','ma_tinh_trang',$value['tinh_trang']);
		echo $laymotdong['ten_tinh_trang']?></td>
        <td><a href="chitiethoadon.php?ma_hd=<?=$value['ma_hd']?>" target="_blank">CTHD</a></td>
        <td>
		<input id="tr_sua<?=$i?>" onclick="capnhathoadon('<?=$value['ma_hd']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['ma_hd']?>')" value="Xóa">
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
<?php
$mang2 = [];
  if($_POST['chon'] == 'ngay')
  {
  	$mang2['YEAR(ngay_mua)'] =  $_POST['nam'];
    $mang2['MONTH(ngay_mua)'] = $_POST['thang'];
    $mang2['DAY(ngay_mua)'] =   $_POST['ngay'];
  }
  if($_POST['chon'] == 'thang')
  {
    $mang2['MONTH(ngay_mua)'] = $_POST['thang'];
    $mang2['DAY(ngay_mua)'] =   $_POST['nam'];
  }
  $mang2['tinh_trang'] = 1;
  $a = $truyvandulieu->lay_sum_theo_dk('hoa_don','tong_thanh_toan',$mang2);
?>
<label>Doanh thu: <?=number_format($a['sum(tong_thanh_toan)'],3)?> VNĐ</label>
<div id="prenext">
				<form name="a" method="get" action="">
					<?php
							for ($i = 1; $i <= $phantrang->get_Tong_Trang(); $i++){
							if ($i == $phantrang->get_Trang_Hien_Tai()){
					?>
					<span><input id="tr_sua<?=$i?>" onclick="ptdt(this.value)" type="button" value=<?=$i?>></span>
					
					<?php
					}
					else{
					?>
					<input id="tr_sua<?=$i?>" onclick="ptdt(this.value)" type="button" value=<?=$i?>>
					
					<?php
					}
					}
					
					?>
					
				</form>
			    </div>
	</div>
</div>
</body>
</html>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
       var nam ;
	   var thang ;
	   var ngay ;
	   var date;
	   var chon;
	function xembaocao(e)
	{
		
	   var today= new Date();
	   var inputdate = ftk.nthangnam.value;
	   	 var carchuoi = inputdate.split('-');
	    nam = parseInt(carchuoi[0],10);
	   thang = parseInt(carchuoi[1],10);
	  ngay = parseInt(carchuoi[2],10);
	    if(isNaN(ngay) || isNaN(thang) || isNaN(nam))
	    {
	    	alert("Nhập đầy đủ ngày / tháng / năm");
	    	return ;
	    }
	    var form_data = new FormData();

	   if(ftk.doanhthu.value == "ngay")
	   {
        form_data.append("ngay",ngay);
        form_data.append("thang",thang);
        form_data.append("nam",nam);
        form_data.append("baocao",'ngay');
 	   }
 	   if(ftk.doanhthu.value == "thang")
	   {
        form_data.append("thang",thang);
        form_data.append("nam",nam);
        form_data.append("baocao",'thang');
 	   }
 	   if(ftk.doanhthu.value == "nam")
	   {
        form_data.append("nam",nam);
        form_data.append("baocao",'nam');
 	   }
 	   form_data.append("date",ftk.nthangnam.value);
 	   form_data.append("chon",ftk.doanhthu.value);
 	   chon = ftk.doanhthu.value;
 	   date = ftk.nthangnam.value;
 	   alert(ngay);
 	   $.ajax({
                        url: 'thongkedoanhthu.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#danhsach').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
              
	}
	function ptdt(e)
	{
		  var form_data = new FormData();
		  if(chon != null)
		  {
				   if(ftk.doanhthu.value == "ngay")
			   {
		        form_data.append("ngay",ngay);
		        form_data.append("thang",thang);
		        form_data.append("nam",nam);
		        form_data.append("baocao",'ngay');
		 	   }
		 	   if(ftk.doanhthu.value == "thang")
			   {
		        form_data.append("thang",thang);
		        form_data.append("nam",nam);
		        form_data.append("baocao",'thang');
		 	   }
		 	   if(ftk.doanhthu.value == "nam")
			   {
		        form_data.append("nam",nam);
		        form_data.append("baocao",'nam');
		 	   }

 	   }
 	   	form_data.append("date",date);
		 form_data.append("chon",chon);
		  form_data.append("trang",e);

		   $.ajax({
                        url: 'thongkedoanhthu.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#danhsach').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
	}

</script>