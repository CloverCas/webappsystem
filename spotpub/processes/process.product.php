<?php
include '../classes/class.product.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'newtype':
        create_();
	break;
	case 'add':
        add_new_product();
	break;
    case 'update_product':
        update_product();
	break;
}

function create_(){
	$product = new Product();
    $tname= ucwords($_POST['tname']);    
    $tid = $product->new_product_type($tname);
    if(is_numeric($tid)){
        header('location: ../index.php?page=products&action=type');
    }
}

function add_new_product(){
	$product = new Product();
    $productname = ucwords($_POST['product_name']);
    $prodtype = ucwords($_POST['prod_type']);
    $price = $_POST['prod_price'];

    $result = $product->add_new_product($productname, $prodtype, $price);
    if($result){
        $product_id = $product->get_product_id($productname);
        header('location: ../index.php?page=products&action=view&id='.$product_id);
        exit();
    }
}

function update_product(){
	$product = new Product();
    $product_id = $_POST['product_id'];
    $productname= ucwords($_POST['product_name']);  
    $prodtype= ucwords($_POST['ptype']); 
    $price = ucwords($_POST['prod_price']);
    $result = $product->update_product($productname,$prodtype,$price,$product_id);
    
    if ($result) {
        header('location: ../index.php?page=products&action=view&id='.$product_id);
        exit();
    }
}
