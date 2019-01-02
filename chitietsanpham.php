<?php
session_start();
include('header.php');
     require_once('xuly.php');
     if($_SESSION['hoadon'] != null)
     {
     	unset($_SESSION['hoadon']);
     	unset($_SESSION['giohang']);
     }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Chi tiết sản phẩm</title>
		
	</head>
	<body>

		<div id="themvaogio">
            <?php 

							$flag = 0;
							$giohang = [];
							if(isset($_POST['so_luong']) && isset($_SESSION['giohang']))// co session va so luong
							{
								
								if(isset($_SESSION['giohang'])){
									$giohang = $_SESSION['giohang'];
								}
								for($i = 0;$i<count($giohang);$i++){
							if($giohang[$i]['ma_sua'] == $_POST['ma_sua']) {
								$flag = 1;
								$giohang[$i]['so_luong'] += $_POST['so_luong'];
								break;
							}
								}
								if($flag == 0){
								$truyvan = new XuLyDB();
								$row = $truyvan->lay_sua('sua',$_POST['ma_sua']);
								$row['so_luong'] = $_POST['so_luong'];
								$giohang[] = $row;
								}
							$_SESSION['giohang'] = $giohang;
							}
							if(!isset($_SESSION['giohang']) && isset($_POST['so_luong'])) // chua co session  nhung co so luong
							{
								$truyvan = new XuLyDB();
								$row = $truyvan->lay_sua('sua',$_POST['ma_sua']);
								$row['so_luong'] = $_POST['so_luong'];
								$giohang[] = $row;
							$_SESSION['giohang'] = $giohang;
							}
							if($_POST['them_vao_gio'] == 'Thêm vào giỏ'){
							?>
							<script type="text/javascript">
								alert('Sản phẩm được lưu vào giỏ hàng')
		                	location.reload(); 
		                    </script>
							<?php
 }

            ?>
		</div>
		
		<div class="container">
			<div class="row">
				<table class="ctsp">
					<?php
					{
							$truyvan = new XuLyDB();
							$row = $truyvan->lay_sua('sua',$_GET['ma_sua']);
							$rowhinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$_GET['ma_sua']);
					?>
					<form name="f" method="post" action="">
						<tr>
							
							<td>
								<div class="thongtinsp">
									<h4 ><?=$row['ten_sua']?></h4>

									<span><?=$row['tinh_trang'] == 2?"Mới":$row['tinh_trang']==1?"Bán chạy":" " ?>
										<br>
										<?php
										if($row['khuyen_mai']!=0)
										echo 'KM'.$row['khuyen_mai'].'%';
										?>
									</span>
									<div id="hinhzoom">
									<img id="hinhctsp" src=<?=$rowhinh['hinh_anh1']?>   data-zoom-image=<?=$rowhinh['hinh_anh1']?> />
								    </div>
									<div id="listhinh">
										<img id="hinhsp1" style="height: 100px;width: 100px" src=<?=$rowhinh['hinh_anh1']?>  />
										<img id="hinhsp2" style="height: 100px;width: 100px" src=<?=$rowhinh['hinh_anh2']?>   />
										<img id="hinhsp3" style="height: 100px;width: 100px" src=<?=$rowhinh['hinh_anh3']?>   />
									</div>
									<h4>Giá: <?=number_format($row['gia'],3)?> VNĐ</h4>
								</td>
								<td id="themvaogio">
                                    <p>
                                    	<?=$row['mo_ta']?>

                                    </p>

									<input hidden="true" type="text" name="ma_sua" value="<?=$_GET['ma_sua']?>">
									Số lượng : <input type="number" min="0" max="<?=$row['so_luong']?>" name="so_luong" oninput="check(<?=$row['so_luong']?>)" value="1"><input type="button" onclick="tang(<?=$row['so_luong']?>)"  value="+"><input type="button" onclick="giam()"  value="-">
									<input type="button" name="tvg" onclick="themvaogio()" value="Thêm vào giỏ" >
									
								</td>
							</tr>
						</form>
						<?php
						}
						?>
					</table>
				</div>
			</div>
			<div class="container">
			
				<div style="margin-top: 25em" class="qcsp">
				<h4>Sản phẩm liên quan</h4>
				<?php 
				     
											$truyvan = new XuLyDB();
											$row = $truyvan->lay_du_lieu_theo_dieu_kien('sua','loai_sua = '.$row['loai_sua'].' limit 0,7');
											
											foreach($row as $key => $value)
											{ 
							
							                  $rowhinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$value['ma_sua']);
			
				?>
				<div class="thongtinsp">
						<h4><?=$value['ten_sua']?></h4>
					<span><?=$value['tinh_trang'] == 2?"Mới":$value['tinh_trang']==1?"Bán chạy":" " ?>
						<br>
						<?php
						if($value['khuyen_mai']!=0)
						echo 'KM'.$value['khuyen_mai'].'%';
						?>
					</span>
					<img id="hinhttsp" src=<?=$rowhinh['hinh_anh1']?>>
					<h4>Giá: <?=number_format($value['gia'],3)?> VNĐ</h4>
					<a href="chitietsanpham.php?ma_sua=<?=$value['ma_sua']?>">Chi tiết sản phẩm</a>
				</div>
				
				<?php
				}
				?>				
			</div>
			</div>
			   <div class="container-fluid">
   	<?php
   	include('footer.php');
   	?>
   </div>
		</body>
	</html>
	<script type="text/javascript">
	function themvaogio()
    {
    	var form_data = new FormData();
                     form_data.append("ma_sua",f.ma_sua.value);
                     form_data.append("so_luong",f.so_luong.value);
                     form_data.append("them_vao_gio",f.tvg.value);
               $.ajax({
                        url: 'chitietsanpham.php?ma_sua='+f.ma_sua.value, // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#themvaogio').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });
    }

   $(document).ready(function () {
     $("#hinhctsp").data('zoom-image', hinhctsp.src).elevateZoom({
     responsive: true,
     zoomType: "lens", 
     containLensZoom: true
    });
   });

	$( "#hinhsp1" ).click(function() {
     hinhctsp.src = hinhsp1.src;
     $("#hinhctsp").data('zoom-image', hinhsp1.src).elevateZoom({
     responsive: true,
     zoomType: "lens", 
     containLensZoom: true
    });
    });
    $( "#hinhsp2" ).click(function() {
     hinhctsp.src = hinhsp2.src;
      $("#hinhctsp").data('zoom-image', hinhsp2.src).elevateZoom({
     responsive: true,
     zoomType: "lens", 
     containLensZoom: true
    });


    });
    
    
    $( "#hinhsp3" ).click(function() {
     hinhctsp.src = hinhsp3.src;
       $("#hinhctsp").data('zoom-image', hinhsp3.src).elevateZoom({
     responsive: true,
     zoomType: "lens", 
     containLensZoom: true
    });
    });


</script>