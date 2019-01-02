<?php
class PhanTrang {
			private $soluongsua;
			private $current_page ;
			private $limit ;
			protected $layketnoi;
			private $total_page;
			private $start;
			private $table ;
			private $para = [];
			private $sapxep;
			function __construct($bang) {
	        $this->soluongsua = 0;
	        $this->current_page = 0;
	        $this->limit = 0;
	        $this->total_page = 0;
	        $this->start =0;
	        $this->table = $bang;
	        $this->sapxep = null;
            }

public function __destruct() {
       
	}
	public function sap_xep($orderby)
	{
        $this->sapxep = $orderby;
	}
	public function trang_hien_tai($para1)
	{
		$this->limit = 10; 
	
		// so san pham hien thi trong 1 trang
		// $this->para[] = $para1;
		 
		foreach ($para1 as $key => $value) {
			$this->para[$key] = $value;
		}
		// lay gia tri phan trang
		$mang = [];
        $mang = array_slice($this->para,0,1); 
        foreach ($mang as $key => $value) {
        	   $this->current_page = isset($value) ?$value : 1;
        }
		
	}
	public function set_so_trang($sotrang)
	{
        $this->limit = $sotrang;
	}
	public function get_Tong_Trang()
	{
		return $this->total_page;
	}
	public function get_Trang_Hien_Tai()
	{
		return $this->current_page;
	}


	public function lay_count(){
          require_once('xulyDB.php');
      	$xuly = new XuLyDB();

      $sql = 'select count(*) as soluongsua from '.$this->table .' where ';
      $fields =[];
      $values =[];
      if(count($this->para) >1)
      {
      	      // mang con
              $mang = [];
              $mang = array_slice($this->para,1,count($this->para)); // lay mang con       
              foreach($mang as $key => $value) {
              	if($value > 0) // if dung de orderby
              	{
			     $sql = $sql . $key.' ='." ".$value." " . "and ";
			    }
		       }
		      $sql = substr( $sql,  0, count($sql) -5);

      }
      else
      {
      	  $sql = 'select count(*) as soluongsua from '.$this->table;
      }
	  $result = $xuly->lay_ket_noi()->query($sql);
	  $row = $result->fetch_assoc();
	  return $row['soluongsua'];
	}
	public function tong_so_trang()
	{
		
		$this->soluongsua =$this->lay_count();
		if( $this->soluongsua == 0)
		{
			echo "<div align=center> Chưa có dữ liệu</div>";
			return;
		}
		$this->total_page = ceil($this->soluongsua / $this->limit);
				if ($this->current_page > $this->total_page){
		$this->current_page =  $this->total_page;
		}
		else if ($this->current_page < 1){
		$current_page = 1;
		}
		if($this->soluongsua % $this->total_page != 0)
		{
			$current_page++;
		}
		// lay diem bat dau
		$this->start = ($this->current_page - 1) * $this->limit;
	}


	public function fill_du_lieu()
	{   
         require_once('xulyDB.php');
      	$xuly = new XuLyDB();
        $sql = "SELECT * FROM ".$this->table.' where ';
       
	    if(count($this->para)>1)
	    {     
		      // mang con
              $mang = [];
              $mang = array_slice($this->para,1,count($this->para)); // lay mang con       
              foreach($mang as $key => $value) {
              	 if($value != -1 && $value != -2  )// if dung de orderby
              	{
              		  $sql = $sql . $key.' ='." ".$value." " . "and ";
              	}
              
		       }
		      $sql = substr( $sql,  0, count($sql) -5);
		      if($this->sapxep == null)
              { 
             $sql = $sql ." LIMIT  ".$this->start.",".$this->limit ;
              }
              else
              {
              	$sql = $sql ." order by ".$this->sapxep." LIMIT  ".$this->start.",".$this->limit ;
              }

      }
      else
      {
      	  if($this->sapxep == null)
          { 
      	  $sql = "SELECT * FROM ".$this->table." LIMIT  ".$this->start.",".$this->limit ;
      	  }
      	  else
      	  {
      	  	$sql = "SELECT * FROM ".$this->table." order by ".$this->sapxep." LIMIT  ".$this->start.",".$this->limit ;
      	  }
      }
      // echo $sql;
		   $result = $xuly->lay_ket_noi()->query($sql);           
           $ket_qua =[];
           while($row = $result->fetch_assoc()){
	       $ket_qua[] = $row;
	        }
	return $ket_qua;
	}

}

class XuLy 
{

	function tim_kiem($arr,$id,$gt)
	{
		foreach ($arr as $key => $value) {

			if($value[$id] == $gt)
			{
				return $value[$id];
			}
		}
		return null;
	}
	function xuong_dong($value)
	{
		$vitriketiep = 4;
		$chuoitrave = explode(' ',$value);
		for($i = 0 ; $i < count($chuoitrave) ;$i++)
		{
              if($i == $vitriketiep)
              {
                 $chuoitrave[$i] .= ' <br>'; 
                 $vitriketiep*=2;
              }
		}
		return implode(' ', $chuoitrave);
	}
	function noi_dung_tin_tuc($hinh,$noidung,$cs)
	{
         $hinhanh = explode('<br>', $hinh);
         if(count($hinhanh) < 2)
         {
         	return $noidung;
         }
         $noidungtin = explode('<img>', $noidung);
         for ($i=0; $i < count($noidungtin)-1; $i++) { 
         	$noidungtin[$i] = $noidungtin[$i].'<br> <img src= "'.$cs.$hinhanh[$i+1].'" id="hinhndtintuc" /> <br>';
         }
		return implode(' ',  $noidungtin);
	}
	function mang_hinh($hinh)
	{
         $hinhanh = explode('<br>', $hinh);
		return  $hinhanh;
	}
	function dao_mang($mang)
	{
		$trave = [];
	   for ($i=count($mang); $i  > 0; $i--) { 
	   	   $trave[] = $mang[$i];
	   }
	   return $trave;
	}
	function xoa_para_url($url, $param) {	
		$a =  explode('&&',$url);
		$b; 
		for ($i=0; $i <count($a); $i++) { 
			if(strcmp($param,substr($a[$i],0, strlen($param)-1)) == 0)
			{
				$a[$i] = '';
			}
			if($i < 1)
			{
				$b = $b.$a[$i];
			}
			else
			{
				$b = $b.'&&'.$a[$i];
			}
		}

		return $b;
    }
}