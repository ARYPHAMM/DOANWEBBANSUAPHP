<?php
require_once('../xulyDB.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<div style="margin:0 auto;" id="capnhatnhaptintuc">
	<?php
if( $_POST['xu_ly'] == "Thêm"){
if(isset($_POST['ma_tin'])&& isset($_POST['tieu_de']) &&isset($_POST['tom_tat'])&&isset($_POST['noi_dung']) ){
	$ma_tin = $_POST['ma_tin'];
	$tieu_de = $_POST['tieu_de'];
	$tom_tat = $_POST['tom_tat'];
	$noi_dung = $_POST['noi_dung'];
	$loai_tin_tuc = $_POST['loai_tin_tuc'];
	$hinh_anh;

	$ngay_viet = date("Y-m-d H:i:s");
    for ($i=0; $i <count($_FILES['hinh_anhtt']['name']) ; $i++) { 
		$ext = pathinfo($_FILES['hinh_anhtt']['name'][$i], PATHINFO_BASENAME);
	    $file_name = md5(time()) . "." . $ext;
	    $target_file = "../../doan/hinh/" . $file_name;
	    move_uploaded_file($_FILES['hinh_anhtt']['tmp_name'][$i], $target_file);
	    $hinh_anh = $hinh_anh . "hinh/". $file_name.'<br>';
	}
	$tintuc = ["ma_tin"=> $ma_tin,"loai_tin_tuc" => $loai_tin_tuc, "tieu_de" => $tieu_de,"hinh_anh" => $hinh_anh, "tom_tat" => $tom_tat, "noi_dung" => $noi_dung,"ngay_viet"=>$ngay_viet];
	$truyvan = new XuLyDB();
	$row = $truyvan->them_moi($tintuc,'tin_tuc');
        echo '<script language="javascript">';
        echo 'alert("Thêm thành công")';
        echo '</script>';
        ?>
        <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachtintuc.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxtt').html(res);
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
if(isset($_POST['ma_tin'])&& isset($_POST['tieu_de']) &&isset($_POST['tom_tat'])&&isset($_POST['noi_dung']) ){
	$ma_tin = $_POST['ma_tin'];
	$tieu_de = $_POST['tieu_de'];
	$tom_tat = $_POST['tom_tat'];
	$noi_dung = $_POST['noi_dung'];
	$loai_tin_tuc = $_POST['loai_tin_tuc'];
	$hinh_anh;
	$tintuc = ["ma_tin"=> $ma_tin,"loai_tin_tuc" => $loai_tin_tuc, "tieu_de" => $tieu_de, "tom_tat" => $tom_tat];
	$truyvan = new XuLyDB();
    if(isset($_FILES['hinh_anhtt']))
    {
        for ($i=0; $i <count($_FILES['hinh_anhtt']['name']) ; $i++) { 
		$ext = pathinfo($_FILES['hinh_anhtt']['name'][$i], PATHINFO_BASENAME);
	    $file_name = md5(time()) . "." . $ext;
	    $target_file = "../../doan/hinh/" . $file_name;
	    move_uploaded_file($_FILES['hinh_anhtt']['tmp_name'][$i], $target_file);
	    $hinh_anh = $hinh_anh . "hinh/". $file_name.'<br>';
	    }  
        $tintuc = ["ma_tin"=> $ma_tin,"loai_tin_tuc" => $loai_tin_tuc, "tieu_de" => $tieu_de,"hinh_anh" => $hinh_anh, "tom_tat" => $tom_tat, "noi_dung" => $noi_dung];
         $xoahinh = $truyvan->lay_mot_dong('tin_tuc','ma_tin',$ma_tin);
         $data = explode('<br>',$xoahinh['hinh_anh']);
        if(count($data) > 0)
        {
	         for ($i=0; $i < count($data)-1; $i++) { 
	         	  unlink('../'.$data[$i]);
	         }
        }
    }
    var_dump($tintuc);
    	$row = $truyvan->cap_nhat($tintuc,'tin_tuc','ma_tin');
        echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
        ?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachtintuc.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xxtt').html(res);
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
<form name="ftintuc"  method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
								<td>Mã tin</td>
								<td>Loại tin tức</td>
								<td>Tiêu đề</td>
								<td>Hình ảnh</td>
								<td>Tóm tắt</td>
								
						<tr>
							<?php
							{
		
							$truyvan = new XuLyDB();
							$a = $truyvan->lay_max('tin_tuc','ma_tin');
							$tangmasua = $a['ma_tin'];
							++$tangmasua;
					
							?>
							<td>
								<input type="text" name="ma_tin" size=20 readonly="False" value=<?=$tangmasua?> >
								<?php
								}
								?>
								</td>
								<td>
									<select name="loai_tin_tuc">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu_theo_dieu_kien('loai_tin_tuc','tinh_trang = 1');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['ma_loai_tt']?> >  <?=$value['ten_loai_tt']?> </option>
										<?php
										}
										?>
									</select>
								</td>
							    <td>
									<input type="text" name="tieu_de">
								</td>
								  <td>
										<input type="file" multiple="" id="uploadtt" name="hinh_anhtt[]"/>
								 </td>
								 <td>
										<textarea name="tom_tat"></textarea>
								 </td>
		
								</tr>
								<tr >
										<td width="100%" align="center" colspan="5">Nội dung</td>			
								</tr>
								<tr>
									<td width="100%" colspan="5">
										<textarea style="height: 600px;
									width: 100%;" name="noi_dung"></textarea>
								 </td>
								</tr>
							   <tr>
								<td >
									<input type="button" id="xulytintuc"  name="xuly" value=Thêm />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
							<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulytintuc').on('click', function () {
                	// alert("abc");
                    alert(ftintuc.ma_tin.value);
                    var form_data = new FormData();

                     var ins = document.getElementById('uploadtt').files.length;
                    for (var x = 0; x < ins; x++) {
                        form_data.append("hinh_anhtt[]", document.getElementById('uploadtt').files[x]);
                    }
                     form_data.append("ma_tin",ftintuc.ma_tin.value);
                     form_data.append("tieu_de",ftintuc.tieu_de.value);
                      // form_data.append("hinh_anh",document.getElementById('uptt').files);
                      form_data.append("loai_tin_tuc",ftintuc.loai_tin_tuc.value); 
                     form_data.append("tom_tat",ftintuc.tom_tat.value);
                      form_data.append("noi_dung",ftintuc.noi_dung.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     if(tranghienhanh == "")
                     {
                     	tranghienhanh = "<?php echo $_GET['trang']; ?>";
                     }
                     form_data.append("tranghientai",tranghienhanh);
                      form_data.append("xu_ly",ftintuc.xuly.value);


               $.ajax({
                        url: 'nhaptintuc.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhaptintuc').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
 
         function lammoi()
         {
         	ftintuc.xuly.value="Thêm";
         }
     <?php
        $row;
      if($_POST['ma'] != null)
       {
		$truyvan = new XuLyDB();
		$row = $truyvan->lay_mot_dong('tin_tuc','ma_tin',$_POST['ma']);
       }
       else
       {
       ?> 
         $("#frm")[0].reset();
       
       <?php
       }
       ?>     
			var capnhat = "<?php echo $row['ma_tin']; ?>";
	        if(capnhat!="")
	        {
	        	ftintuc.xuly.value="Cập nhật"
	            ftintuc.ma_tin.value = capnhat;
	             ftintuc.loai_tin_tuc.value = "<?php echo $row['loai_tin_tuc']; ?>";
	            ftintuc.tieu_de.value = "<?php echo $row['tieu_de']; ?>";
	        	ftintuc.tom_tat.value  = "<?php echo $row['tom_tat']; ?>";

	        }

		</script>	
</div>