<h1>Product's Module</h1><hr>
<a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'"><i class="fa-solid fa-circle-plus"></i> ADD NEW PRODUCT</a>
<div class="btn-box">
<a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'"><i class="fa-solid fa-circle-plus"></i> ADD NEW PRODUCT TYPE</a>
<a href="index.php?page=products&action=type"><i class="fa-solid fa-list"></i> PRODUCT TYPE</a>
</div>
</div>
<div id="subcontent">
    <?php
    //The switch statement is used to check the value of the $action variable and execute the corresponding code block.
    //comment
      switch($action){
                case 'add':
                    require_once 'product-module/add-product.php';
                break;
                case 'view':
                    require_once 'product-module/view-product.php';
                break;
                case 'type':
                    require_once 'product-module/product-type.php';
                break;
                default:
                    require_once 'product-module/main.php';
                break;
            }
    ?>
  </div>
  <div id="id01" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
    <div id="form-block">

      <h2>New Product Type</h2>

      <form method="POST" id="newForm" action="processes/process.product.php?action=newtype">
      <ul>
          <li>  <input type="text" id="tname" class="input" name="tname" placeholder="Product Type Name">  </li>
         <li> <div id="button-block">
        <input type="submit" onclick="enableSubmit()" value="Save">
        </div></li>
          </ul>


          </form>
      </div>
      </div>

          <div id="id02" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">

          <div id="form-block">
<h2>New Product</h2>

<form method="POST" id="newForm" action="processes/process.product.php?action=add">

            <ul>
              <li>
              <input type="text" id="productname" class="input" name="product_name" placeholder="Product Name"></label></li>

            <li>
            <select id="prodtype" name="prod_type" placeholder="Product Type">
            <?php
              if($product->list_product_type() != false){
                foreach($product->list_product_type() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_name;?>"><?php echo $type_name;?> </option>
              <?php
                }
              }
              ?>
            </select></li>
            <li>
            <input type="number" id="prod_price" class="input" name="prod_price" pattern="[0-9]+(\.[0-9]{1,2})?" placeholder="Product Price"></li>


</ul>
            <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal2){
    modal2.style.display = "none";
  }
}

function enableSubmit() {
    document.getElementById("newForm").submit();
}
</script>
