<?php
require_once('../xulyDB.php');
?>

<div style="margin:0 auto;" id="capnhathoadon">
    <?php
if( $_POST['xu_ly'] == "Cập nhật"){
	if(isset($_POST['ma_hd'])&& isset($_POST['tinh_trang'])){
	$hoadon = ["ma_hd"=> $_POST['ma_hd'], "tinh_trang" =>  $_POST['tinh_trang']	];

	$truyvan = new XuLyDB();
	var_dump($hoadon);
		$row = $truyvan->cap_nhat($hoadon,'hoa_don','ma_hd');
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
 ?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachhoadon.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxhd').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})
   		</script>
 <?php       
  }
}
?>



<form name="fhoadon" id="frm" method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
							<td>Mã hóa đơn</td>
							<td>Tài khoản</td>
							<td>Họ tên người mua</td>
							<td>Ngày mua</td>
							<td>Tình trạng</td>					
						</tr>
						<tr>
							<td>
								<input type="text" name="ma_hd" size=20 readonly="False" >
								</td>
							    <td>
									<input type="text" name="tai_khoan" readonly="False">
								</td>
								<td>
                                    <input type="text" name="ho_ten_nguoi_mua" readonly="False">  
								</td>
								<td>
                                    <input type="text" name="ngay_mua" readonly="False">  
								</td>
								<td>
									<select name="tinh_trang">
										<option value=0 >Chờ duyệt</option>
										<option value=1 >Đã duyệt</option>
										<option value=2 >Hủy</option>
									</select>
								</td>
								</tr>
							   <tr>
								<td>
									<input type="button" id="xulyhoadon"  name="xuly" value= />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulyhoadon').on('click', function () {
                	// alert("abc");
                    alert(fhoadon.ma_hd.value);
                    var form_data = new FormData();
                     form_data.append("ma_hd",fhoadon.ma_hd.value);
                     form_data.append("tinh_trang",fhoadon.tinh_trang.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                     	tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                      form_data.append("xu_ly",fhoadon.xuly.value);


               $.ajax({
                        url: 'capnhathoadon.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhathoadon').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	fhoadon.xuly.value="Thêm";
         }
     <?php
        $row;
        if($_POST['ma'] != null)
       {
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('hoa_don','ma_hd',$_POST['ma']);
      }
       else
       {
       ?> 
         $("#frm")[0].reset();  
       <?php
       }
       ?>     
			var capnhat = "<?php echo $row['ma_hd']; ?>";
	        if(capnhat!="")
	        {
	        	fhoadon.xuly.value="Cập nhật"
	            fhoadon.ma_hd.value = capnhat;
	            fhoadon.tai_khoan.value = "<?php echo $row['tai_khoan']; ?>";
	            fhoadon.ho_ten_nguoi_mua.value = "<?php echo $row['ho_ten_nguoi_mua']; ?>";
	            fhoadon.ngay_mua.value = "<?php echo $row['ngay_mua']; ?>";
	        	fhoadon.tinh_trang.value  = "<?php echo $row['tinh_trang']; ?>";
	        }

		</script>	
</div>



