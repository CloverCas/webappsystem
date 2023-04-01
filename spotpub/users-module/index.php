<h1>User's Module</h1><hr>
<a class="btn-jsactive" onclick="document.getElementById('id03').style.display='block'"><i class="fa-solid fa-circle-plus"></i> ADD NEW USER</a>
</div>
<div id="subcontent">
    <?php
      switch($action){

                case 'profile':
                    require_once 'users-module/view-profile.php';
                break;
                default:
                    require_once 'users-module/main.php';
                break;
            }
            //the code surrounding this block includes JavaScript or CSS code to display the modal window and handle form submission.
    ?>
  </div>

  <div id="id03" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
    <div id="form-block">
<h3>Provide the Required Information</h3>

    <form method="POST" action="processes/process.user.php?action=new">
            <ul>
              <li><label for="fname">
              <input type="text" id="fname" class="input" name="firstname" placeholder="Your name.."></label></li>
            <li><label for="lname"></label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name.."></li>

            <li><label for="access"></label>
            <select id="access" name="access">
            <option value="Cashier">Staff</option>
              <option value="Cashier">Cashier</option>
              <option value="Manager">Manager</option>
              <option value="Owner">Owner</option>
            </select></li>



            <li><label for="email"></label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email.."></li>

            <li><label for="password"></label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.."></li>

            <li><label for="confirmpassword"></label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">  </li>
</ul>
            <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>
      </div>
    </div>
          </div>

          <script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function enableSubmit() {
    document.getElementById("newForm").submit();
}
</script>
