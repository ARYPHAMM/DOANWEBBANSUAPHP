<?php
	class XuLyDB {
	private $severname;
    private $usename;
    private $password;
    private $dbname ;
	public $conn;
	// Hàm khởi tạo
	function __construct() {
	$this->severname = "localhost";
	$this->usename = "root";
	$this->password = "";
	$this->dbname = "cua_hang_ban_sua_db";
	$this->conn = new mysqli($this->severname,$this->usename,$this->password,$this->dbname);
	mysqli_query($this->conn,"SET NAMES 'UTF8'");
	}
// Hàm hủy
	public function __destruct() {
	# Buoc 4: Dong ket noi
	if($this->conn != null){
	$this->conn->close();
	}
	}
	public function lay_ket_noi()
	{
	return $this->conn;
	}
	public function them_moi($params, $table) {
	//$params = ['key' => value,....]
	// key => tên trường (column, field trong $table)
		$fields = [];
		$values = [];
		foreach($params as $key => $value) {
		    $fields[]= $key;
			 $values[]= "'".$value."'";
	
		}
		// var_dump($fields);
		// var_dump($values);
		$fields = implode(",", $fields);
		$values = implode(",", $values);
		$sql = "INSERT INTO " . $table . "(". $fields .") VALUES (". $values .")";
		echo $sql;
	# Buoc 3: thuc thi SQL
       	return $this->conn->query($sql);
	}
	public function cap_nhat($params, $table, $id) {
		$fields = [];
		$values =[];
		foreach($params as $key => $value) {
			
			if($key == 'tinh_trang')
			{
              $fields[]= $key . "=". "".$value.""; 
		  	}
			else
			{
				 $fields[]= $key . "=". "'".$value."'"; 
			}
		   
		    $values[] = "'".$value."'";
	
		}
		$fields = implode(",", $fields);
		$sql = "Update " . $table ." SET ". $fields ." where ".$id." = ". $values[0];

	# Buoc 3: thuc thi SQL
       	return $this->conn->query($sql);
	}
	public function xoa($table, $madk,$ma) {

			$sql = "Delete  from " . $table ." where ".$madk." = "."'".$ma."'";
		echo $sql;
       	return $this->conn->query($sql);
	}
	public function lay_du_lieu($table) {
	$sql = "SELECT * FROM " . $table;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	$ket_qua = [];
	while($row = $result->fetch_assoc()){
	$ket_qua[] = $row;
	}
	return $ket_qua;
	}

	public function lay_du_lieu_theo_dieu_kien($table,$dk) {
	$sql = "SELECT * FROM " . $table . " where ".$dk;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	$ket_qua = [];
	while($row = $result->fetch_assoc()){
	$ket_qua[] = $row;
	}
	return $ket_qua;
	}
	public function lay_max($table,$id){
	$sql = "SELECT max(".$id.") as ".$id." FROM " . $table;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);

	return $result->fetch_assoc();
	}
public function lay_count($table,$id){
	$sql = "SELECT count(".$id.") as ".$id." FROM " . $table;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);

	return $result->fetch_assoc();
	}

	public function lay_sua($table,$id){
	$sql = "SELECT * FROM " . $table." where ma_sua = '".$id."' ";
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	return $result->fetch_assoc();

	}
	public function lay_top($table,$loai,$top,$tinhtrang) {
	$sql = "SELECT * FROM " . $table." where loai_sua =".$loai." and tinh_trang= ".$tinhtrang. " LIMIT 0 ,".$top;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	$ket_qua = [];
	while($row = $result->fetch_assoc()){
	$ket_qua[] = $row;
	}
	return $ket_qua;
	}

	public function lay_mot_dong($table,$ma,$id){

	$sql = "SELECT * FROM " . $table." where " .$ma. " = " . "'".$id."'";
	

    // echo $sql;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	  return $result->fetch_assoc();
	}
    public function lay_thong_tin_tk($tk,$mk){

	$sql = "SELECT * FROM nguoi_dung,loai_nguoi_dung where tai_khoan = " . "'" .$tk."'" . " and mat_khau =  "."'".$mk."'"." and loai_nguoi_dung.ma_loai_nd = nguoi_dung.loai_nguoi_dung and loai_nguoi_dung.tinh_trang = 1";
	

    echo $sql;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	  return $result->fetch_assoc();
	}
	public function lay_thong_tin_tk_cookie($tk){

	$sql = "SELECT * FROM nguoi_dung,loai_nguoi_dung where tai_khoan = "."'" .$tk."'" ." and loai_nguoi_dung.ma_loai_nd = nguoi_dung.loai_nguoi_dung and loai_nguoi_dung.tinh_trang = 1";
	

    echo $sql;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	  return $result->fetch_assoc();
	}

	public function lay_nhieu_dong_theo_id($table,$ma,$id){

	$sql = "SELECT * FROM " . $table." where " .$ma. " = ".$id ;
    $result = $this->conn->query($sql);
	$ket_qua = [];
	while($row = $result->fetch_assoc()){
	$ket_qua[] = $row;
	}
	return $ket_qua;

    }
 	public function lay_du_lieu_tin_tuc($table,$id){
	$sql = "SELECT * FROM " . $table . " where ma_tin = '".$id."' ";
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	return $result->fetch_assoc();
	}
	public function lay_sum_theo_dk($table,$ma,$para){

	$sql = "SELECT sum(".$ma.") FROM " . $table." where ";
	foreach ($para as $key => $value) {
		$sql = $sql . $key.' ='." ".$value." " . "and ";
	}
	  $sql = substr( $sql,  0, count($sql) -5);
	  if(count($para) == 0)
	  {
	  	$sql = "SELECT sum(".$ma.") FROM " . $table;
	  }
	
    // echo $sql;
	# Buoc 3: thuc thi SQL
	$result = $this->conn->query($sql);
	  return $result->fetch_assoc();
	}


	
}