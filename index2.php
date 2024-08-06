
<?php
session_start();
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id']; 
    // echo $user_id;
} else {
    header('Location: login.php');

}
?>
<?php 
require_once('header2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet"  href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<div class="mid_container">
    <?php
if (isset($_SESSION['name'])) {
        echo "Welcome: " . ($_SESSION['name']) . "!!";
    } else {
        echo "Welcome, Guest!";
    }
    ?>
</div>
<body>
      
<div class="background"></div>
  
<div class="main ">
    <h1>Welcome to MyStays</h1>
    <p>Your comfort is our priority! Find your ideal accommodation with us.</p>
    <a href="search_properties.php" class="button">Search NOW</a>
</div>


<div class="services">
    <h2>Our Services</h2>
    <div class="service-item">
        <i class="fas fa-bed"></i>
        <h3>Comfortable Rooms</h3>
        <p>Spacious and well-furnished rooms to ensure a comfortable stay.</p>
    </div>
    <div class="service-item">
        <i class="fas fa-utensils"></i>
        
        <h3>Delicious Meals</h3>
        <p>Enjoy a variety of delicious meals prepared by our expert chefs.</p>
    </div>
    <div class="service-item">
        <i class="fas fa-wifi"></i>
        <h3>Free Wi-Fi</h3>
        <p>Stay connected with our high-speed internet access available 24/7.</p>
    </div>
</div>
    <div class="container">
        <h1><center>Featured Properties<center></h1>
        <div class="property-list" style=" display: flex;overflow-x: auto;gap: 20px;padding-bottom: 20px;">
            <div class="property-item">
                <h2>Riwan Mahel</h2>
                <p><b>Location:</b> Delhi , Paraygraj Nagar</p>
                <p><b>Price:</b> 48,000</p>
                <div class="property-images">
                    <img src="upoloadwalaimage/house-img-2.webp" alt="Property 1 Image 1">
                    <img src="upoloadwalaimage/hall-img-2.webp" alt="Property 1 Image 2">
                </div>
            </div>
            <div class="property-item">
                <h2>Roys Villa</h2>
                <p><b>Location:</b>Lucknow , Anand Vann , Near Dyre School</p>
                <p><b>Price:</b> 3,00,000</p>
                <div class="property-images">
                    <img src="upoloadwalaimage/house-img-1.webp" alt="Property 2 Image 1">
                    <img src="upoloadwalaimage/hall-img-1.webp" alt="Property 2 Image 2">
                </div>
            </div>
            <div class="property-item">
                <h2>Sahi Mahel</h2>
                <p><b>Location:</b> Pune , XYz</p>
                <p><b>Price:</b> 70,000</p>
                <div class="property-images">
                    <img src="upoloadwalaimage/house-img-3.jpg" alt="Property 1 Image 1">
                    <img src="upoloadwalaimage/hall-img-3.webp" alt="Property 1 Image 2">
                </div>
            </div>
        </div>
    </div>
</body>

</body>
</html>
<?php 
require_once('footer.php');
?>  