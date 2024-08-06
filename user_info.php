<?php

require_once('lib/functions.php');
require_once('header2.php');

$db = new db_functions();


if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $user = $db->get_user_by_id($user_id);
} else {
    header('Location: all_properties.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="css/user_info.css"> 
</head>
<body>
    <div class="container" >
        <hr>
        <h1>User Info</h1>
        <hr>
        <?php if(isset($user)): ?>
            <div class="user-info">
                <p><b>Name:</b> <?php echo ($user['name']); ?></p>
                <p><b>Email:</b> <?php echo ($user['email']); ?></p>
                <p><b>Phone:</b> <?php echo ($user['number']); ?></p>
                <?php $no= $user['number'];?>
                <!-- <?php echo $no;?> -->
            </div>
        <?php else: ?>
            <p>User not found.</p>
        <?php endif; ?><br>
        <a href="allproperty.php">Back to Properties</a>
    </div>



    <?php require_once('footer.php'); ?>
</body>
</html>
