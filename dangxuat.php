<?php
   session_start();
   unset($_SESSION['nguoi_dung']);
   setcookie('ten_dang_nhap',$taikhoan['ten_dang_nhap'],time() - 60*60*24);
   header('Location:trangchu.php');
 ?>