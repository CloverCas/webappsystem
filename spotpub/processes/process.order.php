<?php
include '../classes/class.release.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){

    case 'additem':
        new_order_item();
	break;
    case 'create':
        create_new_transaction();
	break;
    case 'saveitem':
        save_order_items();
	break;
}

function create_new_transaction(){
	$order = new Order();
    $oid = $order->new_order();
    if(is_numeric($oid)){
        header('location: ../index.php?page=orders&action=order&id='.$oid);
    }
}

function new_order_item(){
	$order = new Order();
    $orderid= $_POST['orderid'];
    $prodid= $_POST['prodid']; 
    $qty= $_POST['qty']; 
    $oid = $order->new_order_item($orderid, $prodid, $qty);
    if($oid){
        header('location: ../index.php?page=orders&action=order&id='.$orderid);
    }
}

function save_order_items(){
	$order = new Order();
    $orderid= $_POST['orderid'];
    $order->save_to_order($orderid);
    $oid = $order->save_order_items($orderid);
    if($oid){
        header('location: ../index.php?page=orders&action=order&id='.$orderid);
    }
}

function calculateTotalPrice($id) {
    $totalPrice = 0;
    $order = new Order();
    if ($order->list_order_items($id) != false) {
      foreach ($order->list_order_items($id) as $value) {
        extract($value);
        $product = new Product();
        $price = $product->get_price($prod_id);
        $totalPrice += $price * $order_qty;
      }
    }
    return $totalPrice;
  }