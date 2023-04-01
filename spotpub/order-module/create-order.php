<?php 
?>
<div class="order">
    <div class="btn-box">
  
            <br>
            <a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'"><i class="fa-solid fa-circle-plus"></i> ADD ORDER </a>
            <a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'"><i class="fa-solid fa-basket-shopping"></i> BUY </a>

            <?php
    
        ?>
        <br>
        <br>
        <table id="data-list">
        </div>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>`
            </tr>
            <?php
            require_once 'classes/class.release.php';
            $count = 1;
            $order = new Order();
           
            if ($order->list_order_items($id) != false) {
                foreach ($order->list_order_items($id) as $value) {
                    extract($value);
                    ?>
 
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php
                         require_once 'classes/class.product.php';
                         $product = new Product();
                        echo $product->get_productname($prod_id);?></td>
                        <td><?php echo $order_qty;?></td>
                        <td><?php 
                         require_once 'classes/class.product.php';
                         $product = new Product();
                        echo $product->get_price($prod_id);?></td>
                    </tr>
                <?php
                    $count++;
                }
            } else {
                echo "No Record Found.";
            }
            ?>
        </table>

      <h3>  Total: <?php echo number_format(calculateTotalPrice($id), 2); ?> </h3>

        <div id="id01" class="modal">
            <div id="form-update" class="modal-content">
                <div class="container">
                    <div id="form-block">
                        <h2>Input Order</h2>

                        <form method="POST" id="itemForm" action="processes/process.order.php?action=additem">
                            <input type="hidden" id="orderid" name="orderid" value="<?php echo $id; ?>"/>
                            <ul>

                                <input type="number" id="qty" class="input" name="qty" placeholder="Quantity">
                            </ul>

                            <select name="prodid" id="prodid">
                                <?php
                                require_once 'classes/class.product.php';
                                $count = 1;
                                $count = 1;
                                $product = new Product();
                                if ($product->list_products() != false) {
                                    foreach ($product->list_products() as $value) {
                                        extract($value);
                                        ?>
                                        <option value="<?php echo $product_id; ?>"><?php echo $product_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <li>
                                <div id="button-block">
                                    <input type="submit" onclick="itemSubmit()" value="Add">
                                </div>
                            </li>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="id02" class="modal">
            <form method="POST" id="itemSave" action="processes/process.order.php?action=saveitem">
                <input type="hidden" id="relid" name="relid" value="<?php echo $id;?>"/>

      </form>
      <div id="form-update" class="modal-content">
    <div class="container">
    <div id="form-block">
      <h2>Save Transaction</h2>
      <p>Are you sure you want to save this transaction?</p>
      <div class="clearfix">
        <button class="confirmbtn" onclick="saveSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
      </div>
    </div>
    </div>
       
</div>

</div>



<script>
// Get the modal
var modal = document.getElementById('id01');
var modal_save = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
function saveSubmit() {
    document.getElementById("itemSave").submit();
  }

function itemSubmit() {
  document.getElementById("itemForm").submit();
}
function calculateTotalPrice($price, $quantity) {
    return $price * $quantity;
}

// Call the function to calculate the total price
$totalPrice = calculateTotalPrice($price, $quantity);
  </script>