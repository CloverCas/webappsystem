<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}

	public function new_product_type($tname){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$tname,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_type (type_name, type_date_added, type_time_added, type_status) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}
	
	public function add_new_product($productname,$prodtype,$price){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$productname, $prodtype, $price, $NOW,$NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_product (product_name, prod_type, prod_price, product_date_added, product_time_added) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_product($productname,$prodtype, $price, $product_id ){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET product_name=:product_name, prod_type=:prod_type, prod_price=:prod_price, product_date_updated=:product_date_updated,product_time_updated=:product_time_updated WHERE product_id=:product_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_name'=>$productname, ':prod_type'=>$prodtype,':prod_price'=>$price, ':product_date_updated'=>$NOW,':product_time_updated'=>$NOW,':product_id'=>$product_id));
		return true;
	}

	public function list_products(){
		$sql="SELECT * FROM tbl_product";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

public function list_product_type(){
	$product = new Product();
	$sql="SELECT * FROM tbl_type";
	$q = $this->conn->query($sql) or die("failed!");
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
	$data[]=$r;
	}
	if(empty($data)){
	   return false;
	}else{
		return $data;	
	}
}

function get_product_id($productname){
	$sql="SELECT product_id FROM tbl_product WHERE product_name = :product_name";	
	$q = $this->conn->prepare($sql);
	$q->execute(array(':product_name'=>$productname));
	$product_id = $q->fetchColumn();
	return $product_id;
}

	function get_productname($id){
		$sql="SELECT product_name FROM tbl_product WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_name = $q->fetchColumn();
		return $product_name;
	}
	function get_product_type($id){
		$sql="SELECT prod_type FROM tbl_product WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$product_type = $q->fetchColumn();
		return $product_type;
	}

	function get_price($id){
		$sql="SELECT prod_price FROM tbl_product WHERE product_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_price = $q->fetchColumn();
		return $prod_price;
	}

	
		function get_prod_type_name($id){
			$sql = "SELECT type_name FROM tbl_type WHERE type_id = :id";	
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$type_name = $q->fetch(PDO::FETCH_COLUMN);
			return $type_name;
		}
		
		function get_type_id($typename){
			$sql="SELECT type_id FROM tbl_type WHERE type_name = :typename";	
			$q = $this->conn->prepare($sql);
			$q->execute(['typename' => $typename]);
			$typeid = $q->fetchColumn();
			return $typeid;
		}
		
	}
