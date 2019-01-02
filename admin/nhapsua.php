<?php
require_once('../xulyDB.php');
?>

<div style="margin:0 auto;" id="capnhatnhapsua">
	<?php
	var_dump($_GET);
if( $_POST['xu_ly'] == "Thêm"){
if(isset($_FILES['hinh_anh']) && isset($_POST['ma_sua'])&& isset($_POST['ten_sua'])&& isset($_POST['loai_sua'])&& isset($_POST['thuong_hieu']) && isset($_POST['xuat_xu'])&& isset($_POST['mo_ta'])&& isset($_POST['so_luong']) && isset($_POST['gia'])&& isset($_POST['tinh_trang'])&& isset($_POST['nam_sx'])&& isset($_POST['khuyen_mai'])){
	for ($i=0; $i <3 ; $i++) { 
		$ext = pathinfo($_FILES['hinh_anh']['name'][$i], PATHINFO_BASENAME);
	    $file_name = md5(time()) . "." . $ext;
	    $target_file = "../../doan/hinh/" . $file_name;
	    move_uploaded_file($_FILES['hinh_anh']['tmp_name'][$i], $target_file);
	    $k = $i + 1;
	    $_POST['hinh_anh'.$k.''] = "hinh/". $file_name;
	}

	echo "Upload hình thành công";
	$sua = ["ma_sua" => $_POST['ma_sua'], "ten_sua"=> $_POST['ten_sua'], "loai_sua" => $_POST['loai_sua'], "thuong_hieu" => $_POST['thuong_hieu'], "xuat_su" => $_POST['xuat_xu'] , "mo_ta" => $_POST['mo_ta'], "so_luong" => $_POST['so_luong'], "gia" => $_POST['gia'], "lua_tuoi" => $_POST['lua_tuoi'], "tinh_trang" => $_POST['tinh_trang'], "nam_sx" => $_POST['nam_sx'], "khuyen_mai" => $_POST['khuyen_mai'], "trang_chu" => 0
	];
	$hinh_anh = [ "ma_sua" => $_POST['ma_sua'], "hinh_anh1" => $_POST['hinh_anh1'], "hinh_anh2"=> $_POST['hinh_anh2'] , "hinh_anh3"=> $_POST['hinh_anh3'] ];
	// var_dump($sua);
	$truyvan = new XuLyDB();
	$row = $truyvan->them_moi($sua,'sua');
	$row = $truyvan->them_moi($hinh_anh,'hinh_anh');
        echo '<script language="javascript">';
        echo 'alert("Thêm thành công")';
        echo '</script>';
   ?>
        <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachsua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx').html(res);
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
	if(isset($_POST['ma_sua'])&& isset($_POST['ten_sua'])&& isset($_POST['loai_sua'])&& isset($_POST['thuong_hieu']) && isset($_POST['xuat_xu'])&& isset($_POST['mo_ta'])&& isset($_POST['so_luong']) && isset($_POST['gia'])&& isset($_POST['tinh_trang'])&& isset($_POST['nam_sx'])&& isset($_POST['khuyen_mai']))
	{
		var_dump($_POST);
			$truyvan = new XuLyDB();
		$sua1 = ["ma_sua" => $_POST['ma_sua'], "ten_sua"=> $_POST['ten_sua'], "loai_sua" => $_POST['loai_sua'], "thuong_hieu" => $_POST['thuong_hieu'], "xuat_su" => $_POST['xuat_xu'] , "mo_ta" => $_POST['mo_ta'], "so_luong" => $_POST['so_luong'], "gia" => $_POST['gia'], "lua_tuoi" => $_POST['lua_tuoi'], "tinh_trang" => $_POST['tinh_trang'], "nam_sx" => $_POST['nam_sx'], "khuyen_mai" => $_POST['khuyen_mai'], "trang_chu" => $_POST['trang_chu']];
		$row = $truyvan->cap_nhat($sua1,'sua','ma_sua');
		if(isset($_FILES['hinh_anh']))
        {
        		for ($i=0; $i <3 ; $i++) { 
					$ext = pathinfo($_FILES['hinh_anh']['name'][$i], PATHINFO_BASENAME);
				    $file_name = md5(time()) . "." . $ext;
				    $target_file = "../../doan/hinh/" . $file_name;
				    move_uploaded_file($_FILES['hinh_anh']['tmp_name'][$i], $target_file);
				    $k = $i + 1;
				    $_POST['hinh_anh'.$k.''] = "hinh/". $file_name;
	            }
	            $hinh_anh = [ "ma_sua" => $_POST['ma_sua'], "hinh_anh1" => $_POST['hinh_anh1'], "hinh_anh2"=> $_POST['hinh_anh2'] , "hinh_anh3"=> $_POST['hinh_anh3'] ];

	            $xoahinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$_POST['ma_sua']);
                  unlink('../'.$xoahinh['hinh_anh1']);
                  unlink('../'.$xoahinh['hinh_anh2']);
                  unlink('../'.$xoahinh['hinh_anh3']);
	            $row = $truyvan->cap_nhat($hinh_anh,'hinh_anh','ma_sua');
        }
		echo '<script language="javascript">';
        echo 'alert("Cập nhật thành công")';
        echo '</script>';
	 ?>
         <script type="text/javascript">
   			  var tranghientai = "<?php echo $_POST['tranghientai']; ?>";
   			$.ajax({
					method: "GET",
					url: "danhsachsua.php",
					data: {"trang" : tranghientai}
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#xx').html(res);
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


<form name="f" id="frm" method="post" action="" enctype="multipart/form-data">
					<table class="nhapsua"   border="1">
						<tr>
							<td>Mã sữa</td>
							<td>Tên sữa</td>
							<td>Loại sữa</td>
							<td>Thương Hiệu</td>
							<td>Xuất xứ</td>
							<td>Số lượng</td>
							
						</tr>
						<tr>
							<?php
							{
		
							$truyvan = new XuLyDB();
							$a = $truyvan->lay_max('sua','ma_sua');
							$tangmasua = substr($a['ma_sua'],1);
							if($tangmasua == null)
							{
								$tangmasua = 0;
							}

							++$tangmasua;
							$masuanew =   $tangmasua < 10 ? "S"."0".$tangmasua : "S".$tangmasua;
							?>
							<td>
								<input type="text" name="ma_sua" size=20 readonly="False" value=<?=$masuanew?> >
								<?php
								}
								?>
								<td>
									<input type="text" name="ten_sua">
								</td>
								<td>
									<select name="loai_sua">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu_theo_dieu_kien('loai_sua','tinh_trang = 1');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['ma_loai_sua']?> >  <?=$value['ten_loai']?> </option>
										<?php
										}
										?>
									</select>
								</td>
								<td>
									<select name="thuong_hieu">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu_theo_dieu_kien('thuong_hieu','tinh_trang = 1');
										
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
									<select name="xuat_xu">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu('quoc_gia');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['ma_qc']?> >  <?=$value['ten_qc']?> </option>
										<?php
										}
										?>
									</select>
								</td>
								<td>
									<input type="text" name="so_luong">
								</td>
								
							</tr>
							<tr>
								
								<td>Giá</td>
								<td>Lứa tuổi</td>
								<td>Tinh trang</td>
								<td>Năm sản xuất</td>
								<td>Khuyến mãi</td>
							</tr>
							<tr>
								
								<td>
									<input type="text" name="gia">
								</td>
								<td>
									<select name="lua_tuoi">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu('lua_tuoi');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['loai_tuoi']?> >  <?=$value['tuoi']?> </option>
										<?php
										}
										?>
									</select>
								</td>
								<td>
									<select name="tinh_trang">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu('tinh_trang');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['ma_tt']?> >  <?=$value['ten_tinh_trang']?> </option>
										<?php
										}
										?>
									</select>
								</td>
								<td>
									<input type="text" name="nam_sx">
								</td>
								<td>
									<select name="khuyen_mai">
										<?php
										$truyvan = new XuLyDB();
										$row = $truyvan->lay_du_lieu('khuyen_mai');
										
										foreach($row as $key => $value)
										{
										?>
										<option value=<?=$value['phan_tram']?> >  <?=$value['phan_tram']?> </option>
										<?php
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Mô tả</td>
								<td>Trang chủ</td>
								<td>Ảnh</td>
							</tr>
							<tr>
								<td height="300" width="300">
									<textarea style="height: 300px;width: 300px" name="mo_ta"></textarea>
								</td>
								<td>
									<select name="trang_chu">
	
										<option value=0 > Không hiển thị </option>
										<option value=1 > Hiển thị </option>
									</select>
								</td>
								<td>
									<!-- <p id="nhapsua"> -->
										
									
							<!-- 		</p> -->
									<input type="file" multiple="" id="upload" name="hinh_anh[]"/>
								</td>
			
								
							</tr>
							<tr>
								<td>
									<input type="button" id="xulysua"  name="xuly" value=Thêm />
									<input type="reset"  onclick="lammoi()" value="Làm mới" />
								</td>
							</tr>
						</table>
					</form>
</div>
		<script src="../js/jquery.min.js"></script>
	<!-- 	<script src="js/jquery-3.2.1.min.js"></script> -->
		<script type="text/javascript">
$(document).ready(function (e) {
                $('#xulysua').on('click', function () {
                	// alert("abc");
                    alert(f.ma_sua.value);
                    var form_data = new FormData();
                    var ins = document.getElementById('upload').files.length;
                    // alert(ins);
                    for (var x = 0; x < ins; x++) {
                        form_data.append("hinh_anh[]", document.getElementById('upload').files[x]);
                    }
                     form_data.append("ma_sua",f.ma_sua.value);
                     form_data.append("ten_sua",f.ten_sua.value);
                     form_data.append("loai_sua",f.loai_sua.value);
                     form_data.append("thuong_hieu",f.thuong_hieu.value);
                     form_data.append("xuat_xu",f.xuat_xu.value);
                     form_data.append("mo_ta",f.mo_ta.value);
                     form_data.append("so_luong",f.so_luong.value);
                     form_data.append("gia",f.gia.value);
                     form_data.append("lua_tuoi",f.lua_tuoi.value);
                     form_data.append("tinh_trang" ,f.tinh_trang.value);
                     form_data.append("nam_sx",f.nam_sx.value); 
                     form_data.append("khuyen_mai",f.khuyen_mai.value);
                      form_data.append("trang_chu",f.trang_chu.value);
                     form_data.append("xu_ly",f.xuly.value);
                     var tranghienhanh = "<?php echo $_POST['tranghientai']; ?>"; // sau khi xu ly khong sub mit
                     form_data.append("tranghientai",tranghienhanh);


               $.ajax({
                        url: 'nhapsua.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#capnhatnhapsua').html(response); // display success response from the PHP script
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
		$row = $truyvan->lay_mot_dong('sua','ma_sua',$_POST['ma']);
       }
       else
       {
       ?> 
         $("#frm")[0].reset();
       <?php
       }
       ?>   
			var capnhat = "<?php echo $row['ma_sua']; ?>";
	        if(capnhat!="")
	        {
	        	f.xuly.value="Cập nhật"
	        	f.ma_sua.value = capnhat;
	            f.ten_sua.value = "<?php echo $row['ten_sua']; ?>";
	        	f.loai_sua.value  = "<?php echo $row['loai_sua']; ?>";
	        	f.thuong_hieu.value = "<?php echo $row['thuong_hieu']; ?>";
	        	f.xuat_xu.value = "<?php echo $row['xuat_su']; ?>";
	        	f.so_luong.value = "<?php echo $row['so_luong']; ?>";
	        	f.gia.value = "<?php echo $row['gia']; ?>";
	        	f.lua_tuoi.value = "<?php echo $row['lua_tuoi']; ?>";
	        	f.tinh_trang.value = "<?php echo $row['tinh_trang']; ?>";
	        	f.nam_sx.value = "<?php echo $row['nam_sx']; ?>";
	        	f.khuyen_mai.value = "<?php echo $row['khuyen_mai']; ?>";
	        	f.mo_ta.value = "<?php echo $row['mo_ta']; ?>";
	        	f.trang_chu.value = "<?php echo $row['trang_chu']; ?>";
	        }

		</script>	


