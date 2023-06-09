<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/process.user.php?action=update_product">
<label for= "user_id"><?php echo $id;?></label>
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
            <option value="Staff" <?php if($user->get_user_access($id) == "Staff"){ echo "selected";};?>>Staff</option>
              <option value="Cashier" <?php if($user->get_user_access($id) == "Cashier"){ echo "selected";};?>>Cashier</option>
              <option value="Manager" <?php if($user->get_user_access($id) == "Manager"){ echo "selected";};?>>Manager</option>
              <option value="Owner" <?php if($user->get_user_access($id) == "Owner"){ echo "selected";};?>>Owner</option>
            </select>

            <div id="form-block-half">
            <label for="status">Account Status</label>
            <select id="status" name="status" disabled>
              <option <?php if($user->get_user_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
              <option <?php if($user->get_user_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" disabled value="<?php echo $user->get_user_email($id);?>" placeholder="Your email..">


            <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
            <a href="#">Change Email</a> |
            <a href="#">Change Password</a> |
            <?php
            if($user->get_user_status($id) == "1"){
              ?>
                <a href="#">Disable Account</a>
              <?php
            }else{
            ?>
                <a href="#">Activate Account</a>
            <?php////element is used in HTML to create a form that can be used to collect input from a user and send it to a server for processing.
            }
            ?>

        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
</div>
