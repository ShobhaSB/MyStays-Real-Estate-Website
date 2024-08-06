<?php
require_once('lib/functions.php');
require_once('header2.php');

$db = new db_functions();

if (isset($_POST['location'])) {
    $location = $_POST['location'];
    if (!empty($location)) {
        $properties = $db->get_properties_by_location($location);
    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Properties</title>
    <link rel="stylesheet" href="css/search_property.css"> 
    <link rel="stylesheet" href="css/allproperty.css">

</head>
<body>
    <div class="container">
        <hr>
        <h1><center>Search Properties by Location<center></h1>
        <hr><center>
        <form method="post" action="search_properties.php" >
            <label for="location"><b>Enter Location:<b></label>
            <input type="text" id="location" name="location" required>
            <button type="submit">Search</button>
        </form>
</center>
        <?php if (isset($_POST['location'])): ?>
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
                                <img src="<?php echo ($property['image1']); ?>" alt="Property Image 1">
                                <img src="<?php echo ($property['image2']); ?>" alt="Property Image 2">
                                <img src="<?php echo ($property['image3']); ?>" alt="Property Image 3">
                                <img src="<?php echo ($property['image4']); ?>" alt="Property Image 4">
                            </div>
                            <form method="post" action="user_info.php">
                                <input type="hidden" name="user_id" value="<?php echo ($property['user_id']); ?>">
                                <button type="submit">Show User Info</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No properties found for the location "<?php echo ($location); ?>".</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php require_once('footer.php'); ?>
</body>
</html>
