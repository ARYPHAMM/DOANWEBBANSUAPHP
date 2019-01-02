<?php
require_once('../xulyDB.php');
?>

<div style="margin:0 auto;" id="capnhatnhapsua1">
	<?php
if( $_POST['xu_ly'] == "Thêm"){
if(isset($_POST['ma_loai_sua'])&& isset($_POST['ten_loai']) &&isset($_POST['tinh_trang'])){
	$loaisua = ["ma_loai_sua"=> $_POST['ma_loai_sua'],"ten_loai"=> $_POST['ten_loai'], "tinh_trang" => $_POST['
	tinh_trang']];
	$truyvan = new XuLyDB();
	$row = $truyvan->them_moi($loaisua,'loai_sua');
        echo '<script language="javascript">';
        echo 'alert("Thêm thành công")';
        echo '</script>';
?>
        <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachloaisua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx1').html(res);
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
	if(isset($_POST['ma_loai_sua'])&& isset($_POST['ten_loai']) &&isset($_POST['tinh_trang'])){
	$loaisua1 = ["ma_loai_sua"=> $_POST['ma_loai_sua'],"ten_loai"=> $_POST['ten_loai'], "tinh_trang" =>  $_POST['tinh_trang']	];

	$truyvan = new XuLyDB();
	var_dump($loaisua1);
		$row = $truyvan->cap_nhat($loaisua1,'loai_sua','ma_loai_sua');
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
 ?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachloaisua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx1').html(res);
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



<form name="floaisua" id="frm" method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
							<td>Mã loại</td>
							<td>Tên loại sữa</td>
							<td>Tình trạng</td>					
						</tr>
						<tr>
							<?php
							{
		
							$truyvan = new XuLyDB();
							$a = $truyvan->lay_max('loai_sua','ma_loai_sua');
							$tangmasua = $a['ma_loai_sua'];
							++$tangmasua;
					
							?>
							<td>
								<input type="text" name="ma_loai_sua" size=20 readonly="False" value=<?=$tangmasua?> >
								<?php
								}
								?>
								</td>
							    <td>
									<input type="text" name="ten_loai">
								</td>
								<td>
									<select name="tinh_trang">
										<option value=0 >Không Kinh Doanh</option>
										<option value=1 >Kinh Doanh</option>
									</select>
								</td>
								</tr>
							   <tr>
								<td>
									<input type="button" id="xulyloaisua"  name="xuly" value=Thêm />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulyloaisua').on('click', function () {
                	// alert("abc");
                    alert(floaisua.ma_loai_sua.value);
                    var form_data = new FormData();
                     form_data.append("ma_loai_sua",floaisua.ma_loai_sua.value);
                     form_data.append("ten_loai",floaisua.ten_loai.value);
                     form_data.append("tinh_trang",floaisua.tinh_trang.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                     	tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                      form_data.append("xu_ly",floaisua.xuly.value);


               $.ajax({
                        url: 'nhaploaisua.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhapsua1').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	floaisua.xuly.value="Thêm";
         }
     <?php
        $row;
        if($_POST['ma'] != null)
       {
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('loai_sua','ma_loai_sua',$_POST['ma']);
      }
       else
       {
       ?> 
         $("#frm")[0].reset();  
       <?php
       }
       ?>     
			var capnhat = "<?php echo $row['ma_loai_sua']; ?>";
	        if(capnhat!="")
	        {
	        	floaisua.xuly.value="Cập nhật"
	        floaisua.ma_loai_sua.value = capnhat;
	           floaisua.ten_loai.value = "<?php echo $row['ten_loai']; ?>";
	        	floaisua.tinh_trang.value  = "<?php echo $row['tinh_trang']; ?>";
	        }

		</script>	
</div>



