<?php
require_once('../xuly.php');

$phantrang = new PhanTrang('tin_tuc');
if($_GET['trang'] == 0)
{
  $_GET['trang'] = 1;

}
$phantrang->trang_hien_tai($_GET);
$phantrang->set_so_trang(2);
$phantrang->sap_xep('ngay_viet desc');
$phantrang->tong_so_trang();
$dulieu = $phantrang->fill_du_lieu();
?>
<form id="xxtt" name="chucnang" method="post" action="">

<table border="1px">
	<tr style="background: lightblue;">
		<td>Mã tin</td>
		<td>Loại tin</td>
		<td>Ngày viết</td>
		<td>Tiêu đề</td>
		<td>Hình ảnh</td>
		<td>Tóm tắt</td>
		<td>Nội dung</td>
		<td>Lượt xem</td>
	</tr>
	<?php
	$xuly = new XuLy();
	$phantrang = new PhanTrang('tin_tuc');
	$truyvandulieu = new XuLyDB();
	$laymotdong ;
	$phantrang->trang_hien_tai($_GET);
	$phantrang->set_so_trang(2);
	$phantrang->sap_xep('ngay_viet desc');
	$phantrang->tong_so_trang();
	$dulieu = $phantrang->fill_du_lieu();
	$trang = $phantrang->get_Trang_Hien_Tai();
		foreach ($dulieu as $key => $value) {
	?>
	<tr>    
		<td><?=$value['ma_tin']?></td>
		<td><?php  $laymotdong = $truyvandulieu->lay_mot_dong('loai_tin_tuc','ma_loai_tt',$value['loai_tin_tuc']);
		echo $laymotdong['ten_loai_tt']?></td>
		<td><?=$value['ngay_viet']?></td>
		<td><?=$value['tieu_de']?></td>
		<td><img style="height: 100px;width: 100px;" src='../<?=$xuly->mang_hinh($value['hinh_anh'])[0]?>' ></td>
		<td><?=$value['tom_tat']?></td>
		<td>
			<?=$xuly->noi_dung_tin_tuc($value['hinh_anh'],$value['noi_dung'],'../')?></td>
	    <td>
		<input id="tr_sua<?=$i?>" onclick="capnhattintuc('<?=$value['ma_tin']?>')" type="button" value=Cập nhật><input type="button" onclick="xoa('<?=$value['ma_tin']?>')" value="Xóa">
		 </td>
	   </tr>
	<?php
	}
	?>
</table>
</form>
	<div id="xoatt">
 
    </div>
<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
          var tranghientai = "<?php echo $trang; ?>";
		function capnhattintuc(e)
		{
			alert(e);
				$.ajax({
					method: "POST",
					url: "nhaptintuc.php",
					data: {"ma": e,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhaptintuc').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// chucnang.reset();
				// location.reload();
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


		}
		function xoa(e)
		{
			if (!confirm("Bạn chắc chắn xóa!")) {
				    return;
				} 
               alert(e);
				$.ajax({
					method: "POST",
					url: "xoa.php",
					data: {"xoa" : e , "table":"tin_tuc","madk":"ma_tin"}
				})
               	.done(function(res){
					console.log("Thanh cong");
					$('#xoatt').html(res);
					// location.reload(); 
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})
				// load trang
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

				$.ajax({
					method: "POST",
					url: "nhaptintuc.php",
					data: {"ma": null,'tranghientai':tranghientai} // cap nhat xong refesh
				})
				.done(function(res){
					console.log("Thanh cong");
					$('#capnhatnhaptintuc').html(res);
				})
				.fail(function(jsXHR, res){
					console.log("Loi");
					console.log(res);		
				})



                
   
		}

		</script>
