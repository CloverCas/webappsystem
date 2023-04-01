<?php
//statement is used to include a PHP file called class.product.php. It's assumed that this file contains the definition for a PHP class called Product.
require_once('classes/class.product.php');
$product = new Product();
?>
    <div id="form-block">
        <h3>Provide the Required Information</h3>
        <form method="POST" action="processes/process.product.php?&action=update_product">
        <div id="form-block-half">
            <li><label for="product_name">Product Name
            <input type="text" id="product_name" class="input" name="product_name" value="<?php echo $product->get_productname($id) ?? ''; ?>"></label></li>

            <li>

            <input type="hidden" id="product_id" name="product_id" value="<?php echo $id;?>"/>
            <label for="ptype">Type</label>
            <select id="ptype" name="ptype">
            <option disbaled value="<?php echo $type_name;?>"><?php echo $product->get_product_type($id);?></option>
              <?php
              if($product->list_product_type() != false){
                foreach($product->list_product_type() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_name;?>" <?php if($product->get_prod_type_name($id) == $type_id){ echo "selected";};?>><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
        </select></li>


            <li><label for="prod_price">Price</label>
<input type="text" id="prod_price" class="input" name="prod_price" value="<?php echo $product->get_price($id);?>" pattern="[0-9]+(\.[0-9]{1,2})?"></li>

        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
        </form>
    </div>
