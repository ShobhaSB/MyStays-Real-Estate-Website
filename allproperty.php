 <?php

require_once('lib/functions.php');
require_once('header2.php');

$db = new db_functions();           
$properties = $db->get_all_properties();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Properties</title>
    <link rel="stylesheet" href="css/allproperty.css"> 
</head>
<body>
    <div class="container">
        
        <h1 style="text-align: center;color: #00000;">All Properties</h1>
 
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
                        <form method="post" action="user_info.php" style="margin-top:15px">
                            <input type="hidden" name="user_id" value="<?php echo ($property['user_id']); ?>">
                            <button type="submit">Show User Info</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No properties found.</p>
        <?php endif; ?>
    </div>

    <?php require_once('footer.php'); ?>
</body>
</html>
