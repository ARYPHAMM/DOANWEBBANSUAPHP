<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

   if($_SESSION['giohang'] == null )
     {
     	  header('Location:trangchu.php');
     }
     if($_SESSION['nguoi_dung'] == null )
     {      
     	  header('Location:dangnhap.php');
     }
 include('xulyDB.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <div class="container">
    	<div id="thanhtoan">
    		<?php
    		    if($_POST['ten_nguoi_nhan'] != "" && $_POST['dia_chi'] != "" && $_POST['sdt'] != "")
    		    {
              
    		    	$tongtien = 0;
    		    	foreach ($_SESSION['giohang'] as $key => $value)
    		    	{
                        $tongtien += ($value['so_luong']*$value['gia']) - (($value['so_luong']*$value['gia'])*($value['khuyen_mai']/100));
    		    	}
                    $truyvan = new XuLyDB();
					$mahd = $truyvan->lay_max('hoa_don','ma_hd');
					++$mahd['ma_hd'];
    		    	$HD = ["ma_hd" => $mahd['ma_hd'] ,"tai_khoan" => $_SESSION['nguoi_dung']['tai_khoan'],"ho_ten_nguoi_mua" => $_POST['ten_nguoi_nhan'] ,"sdt" => $_POST['sdt'],"ngay_mua" => date("Y-m-d H:i:s"),"tong_thanh_toan" => $tongtien+$_POST['dich_vu'],"dia_chi" => $_POST['dia_chi'],"phi_van_chuyen" => $_POST['dich_vu'],"tinh_trang" => 0 ];
    		    	$truyvan->them_moi($HD,'hoa_don'); // them hoa don
    		    	$_SESSION['hoadon'] = $HD;
    		        foreach ($_SESSION['giohang'] as $key => $value)
    		    	{

                        $CTHD = ["ma_hd" => $mahd['ma_hd'] ,"ma_sua" => $value['ma_sua'],"ten_sua" => $value['ten_sua'],"so_luong" => $value['so_luong'],"gia" => $value['gia'],"thanh_tien" => $value['gia']*$value['so_luong']- (($value['gia']*$value['so_luong'])*($value['khuyen_mai'] / 100)),"khuyen_mai" => $value['khuyen_mai']  ];
                        $DSCTHD[] = $CTHD;
                       $truyvan->them_moi($CTHD,'cthoadon');
                    }
                   
                    header('Location:dathangthanhcong.php');
    		    }
    		?>
    	</div>
    		<div class="frmtt">
	<form name="frmtthd" action="#" method="post">
		<h1 style="text-align: center;">Cung cấp thêm thông tin</h1>
		<table style="margin: 0 auto">
           <tr>
		     <td><label>Tên người nhận</label></td>
		     <td><input type="text" placeholder="Bắt buộc phải có" name="ten_nguoi_nhan"></td>
		  </tr>
		  <tr>
		     <td><label>Địa chỉ nhận hàng</label></td>
		     <td><textarea placeholder="Bắt buộc phải có" name="dia_chi"></textarea></td>
		  </tr>
		<tr>
			<td><label>SĐT</label></td>
			<td><input type="text" name="sdt"></td>
		</tr>
		<tr>
			<td><label>Chọn khu vực</label></td>
			<td><select name="khu_vuc">
			    <option value="nội">Nội ô</option>
			    <option value="ngoại">Nội ngoại</option>
		        </select>
		    </td>
	     </tr>
	     <tr>
		       <td><label>Chọn dịch vụ giao hàng</label></td>
		       <td><select name="dich_vu">
			   <option value="15">VNPOST(15K)4->6 ngày</option>
			  <option value="25">VIETTELL POST(25K)2->4 ngày</option>
		        </select></td>
		 </tr>

		 <tr>
		 	<td colspan="2" style="text-align: center;">
		 	<input type="submit" value="Thanh Toan" onclick="thanhtoan()" name="">
		 	</td>
		 </tr>                         
        
        </table>
       
	</form>
	 </div>
   </div>
   <script src="js/jquery.min.js"></script>
		<script type="text/javascript">
			function thanhtoan() {
				if(frmtthd.sdt.value == "" || frmtthd.ten_nguoi_nhan.value == "" || frmtthd.dia_chi.value =="" )
				{
					alert("Vui long nhap day du thong tin");
					return ;
				}
			}
		</script>
</body>
</html>