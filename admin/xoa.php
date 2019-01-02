<?php
require_once('../xulyDB.php'); 
$truyvan = new XuLyDB();
if(isset($_POST['xoa']))
   {
    $a =  $truyvan->lay_mot_dong('nguoi_dung','tai_khoan',$_POST['xoa']);
     if( $a['loai_nguoi_dung'] == 1 ||$_POST['xoa']== 'admin')
     {
        echo "Khong the xoa tai khoan quan ly";
        return;
     }

     if($_POST['table'] == 'tin_tuc' )
     {
     	$xoahinh = $truyvan->lay_mot_dong('tin_tuc','ma_tin',$_POST['xoa']);
        $data = explode('<br>',$xoahinh['hinh_anh']);
        if(count($data) > 0)
        {
	         for ($i=0; $i < count($data)-1; $i++) { 
	         	  unlink('../'.$data[$i]);
	         }
        }
     }
     if($_POST['table'] =='sua')
     {
     	$xoahinh = $truyvan->lay_mot_dong('hinh_anh','ma_sua',$_POST['xoa']);
        unlink('../'.$xoahinh['hinh_anh1']);
        unlink('../'.$xoahinh['hinh_anh2']);
        unlink('../'.$xoahinh['hinh_anh3']);
     }   
    $truyvan->xoa($_POST['table'],$_POST['madk'],$_POST['xoa']);

   }
?>