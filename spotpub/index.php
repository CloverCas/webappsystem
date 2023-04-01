<?php
include_once 'classes/class.user.php';
include 'config/config.php';
// this code is checking for the presence of specific GET parameters and assigning their values to variables if they exist. This is a common pattern in web development for handling user input and routing requests to different parts of an application.
//comment
$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
//this code is checking if a user session is active and redirecting the user to a login page if not. It is also retrieving the user ID associated with the email stored in the session.
//comment
$user = new User();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">

    <title>SPOT Cafe & Pub</title>
</head>
  <body>
    <div class="sidebar">
        <center>
    <img src="media/RECTANGLE.png" alt="Cafe Logo">
</center>
    <ul>
     <li><a href="index.php?page=orders"><i class="fa-solid fa-qrcode"></i>Order</a></li>
     <li><a href="index.php?page=products"><i class="fa-solid fa-mug-hot"></i>Product</a></li>
     <li><a href="index.php?page=sales"><i class="fa-solid fa-peso-sign"></i>Sales</a></li>
     <li><a href="index.php?page=users"><i class="fa-solid fa-user"></i>Users</a></li>
     </ul>
    <div class="navfoot">
<img src="media/avatar.png" alt="Avatar">
<div class="name">
  <?php echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id);?> &nbsp; <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
</div>
</div>
   </div>
<div id="content">
<?php
//this code is using a switch statement to execute different blocks of code based on the value of the $page variable. This is a common pattern in web development for routing requests to different parts of an application based on user input.
//comment
      switch($page){
        case 'orders':
          require_once 'order-module/index.php';
      break;
        case 'users':
          require_once 'users-module/index.php';
      break;
      case 'products':
          require_once 'product-module/index.php';
      break;
      case 'sales':
        require_once 'sales-module/index.php';
    break;
      default:
          require_once 'order-module/index.php';
      break;
            }
    ?>
  </div>

  </body>
</html>
