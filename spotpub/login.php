<?php
//this code is checking if a user is already logged in, processing a login form submission, and displaying an error message if the login credentials are incorrect.
//comment
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time();?>">
</head>
<body>
    <div class="login">
      <center>
    <img src="media/rectangle.png" alt="logo">
    <form method="POST" action="" name="login">
        <input type="email" class="input" required name="useremail" id="Uname" placeholder="Username"/>
        <br><br>
        <input type="password" class="input" required name="password" id="Pass" placeholder="Password"/>
        <br><br>
        <input type="submit" name="submit" id="log" value="Submit"/>
        <br><br>
    </form>
</div>
</center>
</body>
</html>
