<?php
require_once('lib/functions.php');
require_once('header2.php');
?>
<?php
$db = new db_functions();

$flag = 0;


if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {

    header('Location: login.php');
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];


    if ($pass != $c_pass) {
        $flag = 1;
    } else {
       
        if ($db->update_user_data($user_id, $name, $number, $email, $pass)) {
            $flag = 2; 
        } else {
            $flag = 3; 
        }
    }
}


$user_data = $db->get_user_by_id($user_id);

?>
<?php
if ($flag == 1) {
?>
    <div class="fail_msg" style="color:white;border:1px solid black;background-color:rgb(230, 92, 92);width:50%;text-align:center;padding:10px;margin:10px;margin-left:350px;">Passwords do not match! Please try again.</div>
<?php
} elseif ($flag == 2) {
?>
    <div class="success_msg" style="color:white;border:1px solid black;background-color:rgb(92, 184, 92);width:50%;text-align:center;padding:10px;margin:10px;margin-left:350px;">User information updated successfully!</div>
<?php
} elseif ($flag == 3) {
?>
    <div class="fail_msg" style="color:white;border:1px solid black;background-color:rgb(230, 92, 92);width:50%;text-align:center;padding:10px;margin:10px;margin-left:350px;">Failed to update user information. Please try again.</div>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update User Information</title>
   <link rel="stylesheet" href="css/register.css">
</head>
<body>



<section class="container">
   <form action="" method="post">
      <h3>Update Your Information</h3>
      <input type="tel" name="name" value="<?php echo ($user_data['name']); ?>" placeholder="Enter your name" class="formgrp">
      <input type="email" name="email" value="<?php echo ($user_data['email']); ?>" placeholder="Enter your email" class="formgrp">
      <input type="number" name="number" value="<?php echo ($user_data['number']); ?>" maxlength="10" placeholder="Enter your number" class="formgrp">
      <input type="password" name="pass" placeholder="Enter new password" class="formgrp">
      <input type="password" name="c_pass" placeholder="Confirm new password" class="formgrp">
      <input type="submit" value="Update Information" name="submit" class="btn">
   </form>
</section>

<?php require_once('footer.php');?>
</body>
</html>
