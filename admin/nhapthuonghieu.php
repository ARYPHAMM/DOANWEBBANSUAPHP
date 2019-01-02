<?php
require_once('../xulyDB.php');
?>

<div style="margin:0 auto;" id="capnhatnhapthuonghieu">
	<?php
var_dump($_POST);
if( $_POST['xu_ly'] == "Thêm"){
if(isset($_POST['ma_th'])&& isset($_POST['ten_thuong_hieu']) &&isset($_POST['tinh_trang'])){
	$th = ["ten_thuong_hieu"=> $_POST['ten_thuong_hieu'], "tinh_trang" => $_POST['
	tinh_trang']];
	$truyvan = new XuLyDB();
	$row = $truyvan->them_moi($th,'thuong_hieu');
        echo '<script language="javascript">';
        echo 'alert("Thêm thành công")';
        echo '</script>';
 ?>
        <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachthuonghieu.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx2').html(res);
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
	if(isset($_POST['ma_th'])&& isset($_POST['ten_thuong_hieu']) &&isset($_POST['tinh_trang'])){
	$th1 = ["ma_th"=> $_POST['ma_th'],"ten_thuong_hieu"=> $_POST['ten_thuong_hieu'], "tinh_trang" => (int)str_replace(' ', '', $_POST['tinh_trang'])	];

	$truyvan = new XuLyDB();
	var_dump($th1);
		$row = $truyvan->cap_nhat($th1,'thuong_hieu','ma_th');
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachthuonghieu.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx2').html(res);
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



<form name="fth" id="frm" method="post" action="" enctype="multipart/form-data">
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
							$a = $truyvan->lay_count('thuong_hieu','ma_th');
							$tangmasua = $a['ma_th'];
							++$tangmasua;
					
							?>
							<td>
								<input type="text" name="ma_th" size=20 readonly="False" value=<?=$tangmasua?> >
								<?php
								}
								?>
								</td>
							    <td>
									<input type="text" name="ten_thuong_hieu">
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
									<input type="button" id="xulythuonghieu"  name="xuly" value=Thêm />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulythuonghieu').on('click', function () {
                	// alert("abc");
                    alert(fth.ma_th.value);
                    var form_data = new FormData();
                     form_data.append("ma_th",fth.ma_th.value);
                     form_data.append("ten_thuong_hieu",fth.ten_thuong_hieu.value);
                     form_data.append("tinh_trang",fth.tinh_trang.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                     	tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                      form_data.append("xu_ly",fth.xuly.value);


               $.ajax({
                        url: 'nhapthuonghieu.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhapthuonghieu').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	f.xuly.value="Thêm";
         }
     <?php
        $row;
       if($_POST['ma'] != null)
       {
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('thuong_hieu','ma_th',$_POST['ma']);
       }
       else
       {
       ?> 
         $("#frm")[0].reset();
       
       <?php
       }
       ?>      
			var capnhat = "<?php echo $row['ma_th']; ?>";
	        if(capnhat!="")
	        {
	        	fth.xuly.value="Cập nhật"
	            fth.ma_th.value = capnhat;
	            fth.ten_thuong_hieu.value = "<?php echo $row['ten_thuong_hieu']; ?>";
	        	fth.tinh_trang.value  = "<?php echo $row['tinh_trang']; ?>";
	        }

		</script>	
</div>