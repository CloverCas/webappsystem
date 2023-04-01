<?php
class Order{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_order(){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$NOW,$NOW],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_order(order_date_added, order_time_added) VALUES (?,?)");
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

	
	public function list_order(){
		$sql="SELECT * FROM tbl_order";
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



	public function list_order_items($id){
		$stmt = $this->conn->prepare("SELECT * FROM tbl_order_items WHERE order_id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$data = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		if(empty($data)){
			return false;
		} else {
			return $data;   
		}
	}
	
	public function new_order_item($orderid,$prodid,$qty){
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$orderid,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_order_items(order_id, prod_id, order_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function save_order_items($id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$sql = "UPDATE tbl_order SET order_saved=:order_saved WHERE order_id=$id";
		$q = $this->conn->prepare($sql);
		return true;
	}

	
	public function save_to_order($id){
		$stmt = $this->conn->prepare("SELECT * FROM tbl_order_items WHERE order_id = ?");
		$stmt->execute([$id]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = $this->conn->prepare("INSERT INTO tbl_order_final (order_id, prod_id, prod_qty) VALUES (?, ?, ?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute([$order_id, $prod_id, $order_qty]);
			}
			$this->conn->commit();
		} catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	function get_order_id($prodid){
		$sql="SELECT order_id FROM tbl_order_items WHERE product_id = :prodid";	
		$q = $this->conn->prepare($sql);
		$q->execute(['prodid' => $prodid]);
		$order_id = $q->fetchColumn();
		return $order_id;
	}

	public function calculateTotalPrice() {
		// retrieve all the rows from the order table
		$rows = $this->list_order_items();
		
		// calculate the total price of all items in the order
		$totalPrice = 0;
		foreach ($rows as $row) {
			$totalPrice += $row['price'] * $row['quantity'];
		}
		
		return $totalPrice;
	}
}