<table id="data-list">
    <tr>
        <th>#</th>
        <th>Code</th>
        <th>Name</th>
        <th>Type</th>
        <th>Price</th>
    </tr>

    <?php
    //The code is requiring the 'class.product.php' file which presumably contains the definition of a PHP class called 'Product'.
    //The code initializes a variable called $count and sets its value to 1.
    require_once 'classes\class.product.php';
    $count = 1;
    $product = new Product();
    if($product->list_products() != false){
        foreach($product->list_products() as $value){
           extract($value);
        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $product_id;?></td>
            <td><a href="index.php?page=products&action=view&id=<?php echo $product_id;?>"><?php echo $product_name;?></a></td>
            <td><?php echo $prod_type;?></td>
            <td><?php echo $prod_price;?></td>
        </tr>
    <?php
        $count++;
    }
}else{
  echo "No Record Found.";
}

    ?></table>
