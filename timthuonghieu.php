<?php
include('xulyDB.php');
//get the q parameter from URL
$q=$_GET["q"];

 $truyvan = new XuLyDB();
 $dulieu = $truyvan->lay_du_lieu_theo_dieu_kien('thuong_hieu',' ten_thuong_hieu like '."'".'%'.$q.'%'."'");

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
   foreach ($dulieu as $key => $value) {
      //find a link matching the search text
      if (stristr($value['ten_thuong_hieu'],$q)) {
        if ($hint=="") {
          $hint="<a onkeyup='sosanhth(1)' href=danhmuc.php?trang=1&&thuong_hieu=".$value['ma_th'] ." target='_blank'>" . 
         $value['ten_thuong_hieu']. "</a>";
        } else {
          $hint=$hint . "<br /><a href=danhmuc.php?trang=1&&thuong_hieu=".$value['ma_th'] ." target='_blank'>" . 
         $value['ten_thuong_hieu']. "</a>";
        }
      }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="Không tìm thấy kết quả";
} else {
  $response=$hint;
}
if($_GET['tenth'])
{
  $flag = false;
  $response = "Tên thương hiệu không tồn tại";
  foreach ($dulieu as $key => $value) {

         if($value['ten_thuong_hieu']==$_GET['tenth'])
         {
            $flag = true;
            $response = "dung".$value['ma_th'];
            break;
         }
  }
  if($flag == false)
  {
     $dulieu = $truyvan->lay_du_lieu_theo_dieu_kien('thuong_hieu',' ten_thuong_hieu like '."'".'%'.$_GET['tenth'].'%'."'");
     $response = "dung".$dulieu[0]['ma_th'];
  }
}

//output the response
echo $response;
?>