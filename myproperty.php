<?php
require_once('lib/functions.php');
require_once('header2.php');

$db = new db_functions();

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
    // echo $user_id;
    $properties = $db->get_properties_by_user($user_id);
} else {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Properties</title>
    <link rel="stylesheet" href="css/allproperty.css">
</head>
<body>
    <div class="container">
        <h1><center>My Properties<center></h1>

        <?php if (!empty($properties)): ?>
            <div class="property-list">
                <?php foreach ($properties as $property): ?>
                    <div class="property-item">
                        <h2><?php echo ($property['title']); ?></h2>
                        <p><?php echo ($property['description']); ?></p>
                        <p><b>Price:</b> <?php echo ($property['price']); ?></p>
                        <p><b>Location:</b> <?php echo ($property['location']); ?></p>
                        <p><b>Preferred type:</b> <?php echo ($property['type']); ?></p>
                        <div class="property-images">
                        <!-- <?php echo ($property['image1']); ?> -->
                            <img src="<?php echo ($property['image1']); ?>" alt="Property Image 1">
                            <img src="<?php echo ($property['image2']); ?>" alt="Property Image 2">
                            <img src="<?php echo ($property['image3']); ?>" alt="Property Image 3">
                            <img src="<?php echo ($property['image4']); ?>" alt="Property Image 4">
                        </div>
                        <form method="post" action="delete_property.php" style="margin-top:15px;" >
                            <input type="hidden" name="property_id" value="<?php echo ($property['id']); ?>">
                            <button type="submit">Delete Property</button>
                        </form>
                    
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <hr style="border-color:black;">
            <p><center>You have not posted any properties yet</center>.</p>
            <p><center>Wanna Post Properties Click Below -></center></p>
            <p><center><a href="postproperty.php" style="color:red;">Post Property</a></center></p>
        <?php endif; ?>
    </div>

    <?php require_once('footer.php'); ?>
</body>
</html>
