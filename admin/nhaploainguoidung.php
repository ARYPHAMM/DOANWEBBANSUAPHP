<?php
require_once('../xulyDB.php');
?>

<div style="margin:0 auto;" id="capnhatnhaploainguoidung">
	<?php
echo $_POST['ma_loai_sua'];
if( $_POST['xu_ly'] == "Thêm"){
if(isset($_POST['ma_loai_nd']) && isset($_POST['ten_loai_nd']) && isset($_POST['tinh_trang'])){
	$th = [ "ma_loai_nd"=> $_POST['ma_loai_nd'],"ten_loai_nd"=> $_POST['ten_loai_nd'], "tinh_trang" =>$_POST['tinh_trang'] ];
	$truyvan = new XuLyDB();
	$row = $truyvan->them_moi($th,'loai_nguoi_dung');
        echo '<script language="javascript">';
        echo 'alert("Thêm thành công")';
        echo '</script>';
  ?>
        <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachloainguoidung.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx4').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);					
				})
   		</script>
    <?php
  }
}
if( $_POST['xu_ly'] == "Cập nhật"){
	if(isset($_POST['ma_loai_nd']) && isset($_POST['ten_loai_nd']) && isset($_POST['tinh_trang'])){
	$th1 = [ "ma_loai_nd"=> $_POST['ma_loai_nd'],"ten_loai_nd"=> $_POST['ten_loai_nd'], "tinh_trang" =>$_POST['tinh_trang'] ];

	$truyvan = new XuLyDB();
	var_dump($th1);
		$row = $truyvan->cap_nhat($th1,'loai_nguoi_dung','ma_loai_nd');
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachloainguoidung.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx4').html(res);
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



<form name="floainguoidung" id="frm" method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
								<td>Mã loại người dùng</td>
		                        <td>Tên loại người dùng</td>
		                         <td>Tình trạng</td>				
						</tr>
						<tr>
							<?php
							{
		
							$truyvan = new XuLyDB();
							$a = $truyvan->lay_max('loai_nguoi_dung','ma_loai_nd');
							$tangmasua = $a['ma_loai_nd'];
							++$tangmasua;
					
							?>
							<td>
								<input type="text" name="ma_loai_nd" size=20 readonly="False" value=<?=$tangmasua?> >
								<?php
								}
								?>
								</td>
							    <td>
									<input type="text" name="ten_loai_nd">
								</td>
							    <td>
									<select name="tinh_trang">
										<option value=0 >Cấm truy cập</option>
										<option value=1 >Được truy cập</option>
									</select>
								</td>
								</tr>
							   <tr>
								<td>
									<input type="button" id="xulyloainguoidung"  name="xuly" value=Thêm />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulyloainguoidung').on('click', function () {
                	
                     alert(floainguoidung.ma_loai_nd.value);
                     var form_data = new FormData();
                     form_data.append("ma_loai_nd",floainguoidung.ma_loai_nd.value);
                     form_data.append("ten_loai_nd",floainguoidung.ten_loai_nd.value);
                     form_data.append("tinh_trang",floainguoidung.tinh_trang.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                     	tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                     form_data.append("xu_ly",floainguoidung.xuly.value);


               $.ajax({
                        url: 'nhaploainguoidung.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhaploainguoidung').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	floainguoidung.xuly.value="Thêm";
         }
     <?php
        $row;
        if($_POST['ma'] != null)
       {
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('loai_nguoi_dung','ma_loai_nd',$_POST['ma']);
      }
       else
       {
       ?> 
         $("#frm")[0].reset();
       
       <?php
       }
       ?>    
			var capnhat = "<?php echo $row['ma_loai_nd']; ?>";
	        if(capnhat!="")
	        {
	        	floainguoidung.xuly.value="Cập nhật"
	            floainguoidung.ma_loai_nd.value = capnhat;
	            floainguoidung.ten_loai_nd.value = "<?php echo $row['ten_loai_nd']; ?>";
	        	floainguoidung.tinh_trang.value  = "<?php echo $row['tinh_trang']; ?>";
	        }

		</script>	
</div>