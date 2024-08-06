
<?php 
require_once('lib/functions.php');
require_once('header.php');
require_once('unique_id.php');
?>
<?php
$db = new db_functions();

$flag=0;
if(isset($_POST['submit'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $c_pass =$_POST['c_pass'];

   if($pass != $c_pass) {
      $flag=1;

   } else {
      $flag=0;
   }
   if($flag==0)
   {
      if($db->save_user_data($id,$name,$number,$email,$c_pass))
      {
      setcookie('user_id', $id, time() + 3600, '/');
      header('location:index2.php');   
      }
   }
   else
   { 
   if($flag==1)
			{
?>
			<div class="fail_msg" style=" color:white;border:1px solid black;background-color:rgb(230, 92, 92);width:50%;text-align:center;padding:10px;margin:10px;margin-left:350px;margin-top:50px;">Password not Matched ! Please Try Again !</div>
<?php	
			}

   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <link rel="stylesheet" href="css/register.css">
</head>
<body>





<section class="container">

   <form action="" method="post">
      <h3>Create An Account!</h3>
      <input type="tel" name="name"  placeholder="enter your name" class="formgrp">
      <input type="email" name="email" placeholder="enter your email" class="formgrp">
      <input type="number" name="number"   maxlength="10" placeholder="enter your number" class="formgrp">
      <input type="password" name="pass"  placeholder="enter your password" class="formgrp">
      <input type="password" name="c_pass"  placeholder="confirm your password" class="formgrp">
      <p style="color:black;text-align:center;">Already have an Account? <a href="login.html">login now</a></p>
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<?php require_once('footer.php');?>
</body>
</html>

