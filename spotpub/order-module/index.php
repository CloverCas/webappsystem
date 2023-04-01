<h1>Order System</h1>
<hr>
<a class="btn-jsactive" onclick="document.getElementById('id03').style.display='block'"><i class="fa-solid fa-circle-plus"></i> NEW TRANSACTION </a>

<?php
switch ($action) {
    case 'order':
        require_once 'order-module/create-order.php';
        break;
    default:
        require_once 'order-module/index.php';
        break;
}
?>


<div id="id03" class="modal">
    <div id="form-update" class="modal-content">
        <div class="container">
            <div id="form-block">
                <form method="POST" action="processes/process.order.php?action=create">
                    <div id="form-block-center">
                        <h3> Make new transaction
              </div>
        <div id="button-block">
        <input type="submit" value="Create">
        </div>
  </form>
</div>
</div>
</div>


<script>
// Get the modal
var modal_newtran = document.getElementById('id03');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
  </script>
