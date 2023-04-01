
                <table id="data-list">
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Type</th>
                </tr>
                <?php
                //require_once to include a PHP class file called class.product.php. 
    require_once 'classes\class.product.php';
    $count = 1;
    $product = new Product();
    if($product->list_product_type() != false){
        foreach($product->list_product_type() as $value){
           extract($value);
        ?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $type_id;?></a></td>
                    <td><?php echo $type_name;?></td>
                </tr>
                <tr>
            <?php
            $count++;
            }
            }else{
            echo "No Record Found.";
            }
            ?>
                </table>
