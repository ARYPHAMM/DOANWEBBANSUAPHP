<?php
if(isset($_FILES['hinh_anh'])) {
	$_FILES['hinh_anh']['name'] = 'logo.png';
   $ext = pathinfo($_FILES['hinh_anh']['name'], PATHINFO_EXTENSION);
   if($ext != 'png')
   {
   	return;
   }
   $file_name = 'logo.'.$ext;
   $target_file = "../../doan/hinh/" . $file_name;
   unlink('../hinh/'.$_FILES['hinh_anh']['name']);
   move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file);
   var_dump($_FILES['hinh_anh']);
   echo "Upload thành công";

   $logo[] = array(
  'tenlogo' => 'hinh/'.$_FILES['hinh_anh']['name']
  );
   
  $doc = new DOMDocument();
  $doc->formatOutput = true;
   
  $rootNode = $doc->createElement('logo');
  $doc->appendChild($rootNode);
   
    $childNode = $doc->createElement('tenlogo');
       
    $ten = $doc->createElement('tenlogo');
    $ten->appendChild($doc->createTextNode($logo[0]['tenlogo'])); 
    $childNode->appendChild($ten);    
    $rootNode->appendChild($childNode);  

   
  $stringXML =  $doc->saveXML(); 
  $fileName = 'logo.xml';
 
  //Mo file de ghi. Neu file khong ton tai thi tao moi.
  $fp = fopen($fileName, 'w') or die('Cannot open file:  '. fileName);
  fwrite($fp, $stringXML); 
  fclose($fp);
 
  echo "<h2>GHI FILE THANH CONG!</h2>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form name="f" id="frm" method="post" action="" enctype="multipart/form-data">
		<input type="file" name="hinh_anh"/>
		<input type="submit" value="Cập nhật logo" name="btn_Thêm"/>
	</form>
</body>
</html>

<?php 

?>

<?php
$doc = new DOMDocument();
    $doc->load( 'logo.xml' );
 
    $KhachHang = $doc->getElementsByTagName( "tenlogo" );
    foreach( $KhachHang as $item )
    {
        $tagMaKH = $item->getElementsByTagName( "tenlogo" );
        $makh = $tagMaKH->item(0)->nodeValue;
 
        echo "$makh <br>";
    }
?>