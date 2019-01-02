<?php
require_once('../xulyDB.php');
?>

<div style="margin:0 auto;" id="capnhatnhaploaitintuc">
	<?php
var_dump($_POST);
if( $_POST['xu_ly'] == "Thêm"){
if(isset($_POST['ma_loai_tt'])&& isset($_POST['ten_loai_tt']) &&isset($_POST['tinh_trang'])){
	$ma_loai_tt = $_POST['ma_loai_tt'];
	$ten_loai_tt = $_POST['ten_loai_tt'];
	$tinh_trang = $_POST['tinh_trang'];
	
	$loaitintuc = ["ma_loai_tt"=> $ma_loai_tt,"ten_loai_tt"=> $ten_loai_tt, "tinh_trang" => $tinh_trang];
	$truyvan = new XuLyDB();
	$row = $truyvan->them_moi($loaitintuc,'loai_tin_tuc');
        echo '<script language="javascript">';
        echo 'alert("Thêm thành công")';
        echo '</script>';
 ?>
        <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachloaitintuc.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxloaitintuc').html(res);
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
	if(isset($_POST['ma_loai_tt'])&& isset($_POST['ten_loai_tt']) &&isset($_POST['tinh_trang'])){
	$ma_loai_tt = $_POST['ma_loai_tt'];
	$ten_loai_tt = $_POST['ten_loai_tt'];
	$tinh_trang = $_POST['tinh_trang'];
	
	$loaitintuc = ["ma_loai_tt"=> $ma_loai_tt,"ten_loai_tt"=> $ten_loai_tt, "tinh_trang" => $tinh_trang];

	$truyvan = new XuLyDB();
	var_dump($th1);
		$row = $truyvan->cap_nhat($loaitintuc,'loai_tin_tuc','ma_loai_tt');
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachloaitintuc.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxloaitintuc').html(res);
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



<form name="floaitt" id="frm" method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
							<td>Mã thương hiệu</td>
							<td>Tên thương hiệu</td>
							<td>Tình trạng</td>					
						</tr>
						<tr>
							<?php
							{
		
							$truyvan = new XuLyDB();
							$a = $truyvan->lay_max('loai_tin_tuc','ma_loai_tt');
							$tangmasua = $a['ma_loai_tt'];
							++$tangmasua;
					
							?>
							<td>
								<input type="text" name="ma_loai_tt" size=20 readonly="False" value=<?=$tangmasua?> >
								<?php
								}
								?>
								</td>
							    <td>
									<input type="text" name="ten_loai_tt">
								</td>
								<td>
									<select name="tinh_trang">
										<option value=0 >Không còn sử dụng</option>
										<option value=1 >Còn sử dụng</option>
									</select>
								</td>
								</tr>
							   <tr>
								<td>
									<input type="button" id="xulyloaitintuc"  name="xuly" value=Thêm />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulyloaitintuc').on('click', function () {
                	// alert("abc");
                    alert(floaitt.ma_loai_tt.value);
                    var form_data = new FormData();
                     form_data.append("ma_loai_tt",floaitt.ma_loai_tt.value);
                     form_data.append("ten_loai_tt",floaitt.ten_loai_tt.value);
                     form_data.append("tinh_trang",floaitt.tinh_trang.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                     	tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                      form_data.append("xu_ly",floaitt.xuly.value);


               $.ajax({
                        url: 'nhaploaitintuc.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhaploaitintuc').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	floaitt.xuly.value="Thêm";
         }
     <?php
        $row;
       if($_POST['ma'] != null)
       {
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('loai_tin_tuc','ma_loai_tt',$_POST['ma']);
       }
       else
       {
       ?> 
         $("#frm")[0].reset();
       
       <?php
       }
       ?>      
			var capnhat = "<?php echo $row['ma_loai_tt']; ?>";
	        if(capnhat!="")
	        {
	        		floaitt.xuly.value="Cập nhật"
	            	floaitt.ma_loai_tt.value = capnhat;
	            	floaitt.ten_loai_tt.value = "<?php echo $row['ten_loai_tt']; ?>";
	        		floaitt.tinh_trang.value  = "<?php echo $row['tinh_trang']; ?>";
	        }

		</script>	
</div>