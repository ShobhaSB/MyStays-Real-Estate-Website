<?php 
session_start();
require_once('lib/functions.php');
require_once('header.php');
require_once('unique_id.php');

$db = new db_functions();

$flag	=	0;

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
   echo $user_id;
}else{
   $user_id = '';
}

if(isset($_GET['logout']))
	{
		unset($_SESSION['name']);
	}

if(isset($_POST['submit'])){
   
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $result = $db->verify_user($email, $pass);

      if ($result) {
 
          setcookie('user_id', $result['id'], time() + 3600, '/');
          $flag	=	1;
          $_SESSION['name']	=	$result['name'];
          header('location:index2.php');   
            
      } else {
         
         $flag=2;
          
      }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
			if($flag==2)     
			{
		?>
			<div class="fail_msg" style="color:white;border:1px solid black;background-color:rgb(230, 92, 92);;width:50%;text-align:center;padding:10px;margin-left:350px;">Wrong Password Or Not Registered On Our Website</div>
		<?php	
			}
		?>
    <section class="container">
        <form action="" method="post">
           <h3>Welcome back!</h3>
           <input type="email" name="email"  placeholder="Enter your email" class="formgrp">
           <input type="password" name="pass"  placeholder="Enter your password" class="formgrp">
           <p style="color:black;text-align:center;">Don't have an account? <a href="register.html">Register new</a></p>
           <input type="submit" value="Login now" name="submit" class="btn">
        </form>
     </section>
</body>
</html>

<?php 
require_once('footer.php');
?>
