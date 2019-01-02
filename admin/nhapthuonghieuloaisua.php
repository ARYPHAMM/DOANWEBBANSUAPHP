<?php
require_once('../xulyDB.php');
?>

<div style="margin:0 auto;" id="capnhatnhapthuonghieuloaisua">
	<?php
echo $_POST['ma_th'];
if( $_POST['xu_ly'] == "Thêm"){
if(isset($_POST['ma_loai_sua']) && isset($_POST['id']) && isset($_POST['ma_th'])&& isset($_POST['ma_loai_sua'])){
	$th = [ "id"=> $_POST['id'],"ten_thuong_hieu"=> $_POST['ten_thuong_hieu'], "ma_th" => $_POST['ma_th'], "ma_loai_sua" => $_POST['ma_loai_sua']];
	$truyvan = new XuLyDB();
	$row = $truyvan->them_moi($th,'thuong_hieu_loai_sua');
        echo '<script language="javascript">';
        echo 'alert("Thêm thành công")';
        echo '</script>';
?>
        <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachthuonghieuloaisua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx3').html(res);
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
	if(isset($_POST['ma_loai_sua']) && isset($_POST['id']) && isset($_POST['ma_th'])&& isset($_POST['ma_loai_sua'])){
	$th1 = [ "id"=> $_POST['id'],"ten_thuong_hieu"=> $_POST['ten_thuong_hieu'], "ma_th" => $_POST['ma_th'], "ma_loai_sua" => $_POST['ma_loai_sua']];

	$truyvan = new XuLyDB();
	var_dump($th1);
		$row = $truyvan->cap_nhat($th1,'thuong_hieu_loai_sua','id');
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachthuonghieuloaisua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx3').html(res);
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



<form name="fthloaisua" id="frm" method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
								<td>id</td>
		                        <td>Tên thương hiệu</td>
		                         <td>Thương hiệu</td>
		                        <td>Loại Sữa</td>				
						</tr>
						<tr>
							<?php
							{
		
							$truyvan = new XuLyDB();
							$a = $truyvan->lay_max('thuong_hieu_loai_sua','id');
							$tangmasua = $a['id'];
							++$tangmasua;
					
							?>
							<td>
								<input type="text" name="id" size=20 readonly="False" value=<?=$tangmasua?> >
								<?php
								}
								?>
								</td>
							    <td>
									<input type="text" name="ten_thuong_hieu">
								</td>
								<td>
									<select name="thuong_hieu1">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu('thuong_hieu');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['ma_th']?> >  <?=$value['ten_thuong_hieu']?> </option>
										<?php
										}
										?>
									</select>
								</td>
								<td>
									<select name="loai_sua">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu('loai_sua');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['ma_loai_sua']?> >  <?=$value['ten_loai']?> </option>
										<?php
										}
										?>
									</select>
								</td>
								</tr>
							   <tr>
								<td>
									<input type="button" id="xulythuonghieuloaisua"  name="xuly" value=Thêm />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulythuonghieuloaisua').on('click', function () {
                	// alert("abc");
                    alert(fthloaisua.thuong_hieu1.value);
                    var form_data = new FormData();
                    form_data.append("id",fthloaisua.id.value);
                     form_data.append("ten_thuong_hieu",fthloaisua.ten_thuong_hieu.value);
                         form_data.append("ma_th",fthloaisua.thuong_hieu1.value);
                     form_data.append("ma_loai_sua",fthloaisua.loai_sua.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                     	tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                      form_data.append("xu_ly",fthloaisua.xuly.value);


               $.ajax({
                        url: 'nhapthuonghieuloaisua.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhapthuonghieuloaisua').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	fthloaisua.xuly.value="Thêm";
         }
     <?php
        $row;
       if($_POST['ma'] != null)
       {
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('thuong_hieu_loai_sua','id',$_POST['ma']);
      }
       else
       {
       ?> 
         $("#frm")[0].reset();
       
       <?php
       }
       ?>    
			var capnhat = "<?php echo $row['id']; ?>";
	        if(capnhat!="")
	        {
	        	fthloaisua.xuly.value="Cập nhật"
	            fthloaisua.id.value = capnhat;
	           fthloaisua.ten_thuong_hieu.value = "<?php echo $row['ten_thuong_hieu']; ?>";
	           fthloaisua.thuong_hieu1.value = "<?php echo $row['ma_th']; ?>";
	        	fthloaisua.loai_sua.value  = "<?php echo $row['ma_loai_sua']; ?>";
	        }

		</script>	
</div>