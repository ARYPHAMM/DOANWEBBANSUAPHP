<?php
require_once('../xulyDB.php');
?>

<div id="capnhatnhapnguoidung">
	<?php

if( $_POST['xu_ly'] == "Cập nhật"){
	if(isset($_POST['tai_khoan']) && isset($_POST['mat_khau']) && isset($_POST['nam_sinh']) && isset($_POST['email']) && isset($_POST['sdt']) && isset($_POST['loai_nguoi_dung'])&& isset($_POST['dia_chi']) && isset($_POST['ho_ten'])){
	$th1 = [ "tai_khoan"=> $_POST['tai_khoan'],"mat_khau"=> md5($_POST['mat_khau']), "ho_ten" =>$_POST['ho_ten'] , "nam_sinh" =>$_POST['nam_sinh'], "email" =>$_POST['email'],"sdt" =>$_POST['sdt'],"loai_nguoi_dung" =>$_POST['loai_nguoi_dung'],"loai_nguoi_dung" =>$_POST['loai_nguoi_dung'],"dia_chi" =>$_POST['dia_chi']   ];

	$truyvan = new XuLyDB();
		$row = $truyvan->cap_nhat($th1,'nguoi_dung','tai_khoan');
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
 ?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachnguoidung.php",
					data: {"trang" : 1}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx5').html(res);
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
<form name="fnguoidung" id="frm" method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
								<td>Tài khoản</td>
		<td>Mật khẩu</td>
		<td>Họ tên</td>
		<td>Năm sinh</td>
		<td>Email</td>
		<td>SDT</td>
		<td>Loại người dùng</td>
		<td>Địa chỉ</td>				
						</tr>
						<tr>

							<td>
								<input type="text" name="tai_khoan" size=20 readonly="False" >
							</td>
							    <td>
									<input type="text" maxlength="100" name="mat_khau">
								</td>
								 <td>
									<input type="text" name="ho_ten">
								</td>
								 <td>
									<input type="text" name="nam_sinh">
								</td>
								<td>
									<input type="text" name="email">
								</td>
								<td>
									<input type="text" name="sdt">
								</td>
							    <td>
								<select name="loai_nguoi_dung">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu('loai_nguoi_dung');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['ma_loai_nd']?>>  <?=$value['ten_loai_nd']?> </option>
										<?php
										}
										?>
									</select>
								</td>
								<td>
									<input type="text" name="dia_chi">
								</td>
								</tr>
							   <tr>
								<td>
									<input type="button" id="xulynguoidung"  name="xuly" value= >
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulynguoidung').on('click', function () {
                	
                     alert(fnguoidung.tai_khoan.value);
                     var form_data = new FormData();
                     form_data.append("tai_khoan",fnguoidung.tai_khoan.value);
                     form_data.append("mat_khau",fnguoidung.mat_khau.value);
                     form_data.append("ho_ten",fnguoidung.ho_ten.value);
                     form_data.append("nam_sinh",fnguoidung.nam_sinh.value);
                     form_data.append("email",fnguoidung.email.value);
                     form_data.append("sdt",fnguoidung.sdt.value);
                     form_data.append("loai_nguoi_dung",fnguoidung.loai_nguoi_dung.value);
                     form_data.append("dia_chi",fnguoidung.dia_chi.value);
            var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                      tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                     form_data.append("xu_ly",fnguoidung.xuly.value);


               $.ajax({
                        url: 'nhapnguoidung.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhapnguoidungn').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	fnguoidung.xuly.value="";
         }
     <?php
        $row;
        if($_POST['ma'] != null)
       {
       
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('nguoi_dung','tai_khoan',$_POST['ma']);
       }
       else
       {
       ?> 
         $("#frm")[0].reset(); 
       <?php
       }
       ?>   
			var capnhat = "<?php echo $row['tai_khoan']; ?>";
	        if(capnhat!="")
	        {   

	        	fnguoidung.xuly.value="Cập nhật";
	            fnguoidung.tai_khoan.value = capnhat;
	            fnguoidung.mat_khau.value  = "";	
	        	fnguoidung.ho_ten.value  = "<?php echo $row['ho_ten']; ?>";
	        	fnguoidung.nam_sinh.value = "<?php echo $row['nam_sinh']; ?>";
	        	fnguoidung.email.value  = "<?php echo $row['email']; ?>";
	        	fnguoidung.sdt.value = "<?php echo $row['sdt']; ?>";
	        	fnguoidung.loai_nguoi_dung.value  = "<?php echo $row['loai_nguoi_dung']; ?>";
	        	fnguoidung.dia_chi.value  = "<?php echo $row['dia_chi']; ?>";
	        }

		</script>	
</div>