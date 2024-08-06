<?php
    require_once('lib/functions.php');
    require_once('header2.php');
    require_once('unique_id.php');
    $db = new db_functions();

 
    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
        echo $user_id;
    } else {
       
        header('location:login.php');

    }

    if (isset($_POST['property-title'])) {
        $id = create_unique_id();
        $title = $_POST['property-title'];
        $description = $_POST['property-description'];
        $price = $_POST['property-price'];
        $location = $_POST['property-location'];
        $type = $_POST['property-type'];
        
        $image1 = $_FILES['property-image1']['name'];
        $image2 = $_FILES['property-image2']['name'];
        $image3 = $_FILES['property-image3']['name'];
        $image4 = $_FILES['property-image4']['name'];

        $tmpimage1 = $_FILES['property-image1']['tmp_name'];
        $tmpimage2 = $_FILES['property-image2']['tmp_name'];
        $tmpimage3 = $_FILES['property-image3']['tmp_name'];
        $tmpimage4 = $_FILES['property-image4']['tmp_name'];
        
        $img_dir = 'upoloadwalaimage/'; 
        $upload_image1 = move_uploaded_file($tmpimage1, $img_dir . $image1);
        $upload_image2 = move_uploaded_file($tmpimage2, $img_dir . $image2);
        $upload_image3 = move_uploaded_file($tmpimage3, $img_dir . $image3);
        $upload_image4 = move_uploaded_file($tmpimage4, $img_dir . $image4);

        if ($upload_image1 && $upload_image2 && $upload_image3 && $upload_image4) {
            $property_data = array(
                'id' => $id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'location' => $location,
                'type' => $type,
                'image1' => $img_dir . $image1,
                'image2' => $img_dir . $image2,
                'image3' => $img_dir . $image3,
                'image4' => $img_dir . $image4,
                'user_id' => $user_id
            );

            if ($db->post_property($property_data)) {
                header('Location: myproperty.php');
            }
        } else {
            $error_msg = 'Failed to upload images.';
            echo $error_msg;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    !
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Property</title>

    <link rel="stylesheet" href="css/property.css">
</head>
<body style="background-color: rgb(223, 199, 199);font-family:cursive;">
    <div class="container" style="border:2px solid black;border-radius:15px;">
        <h1>Post Your Property</h1>
        
        <form action="" method="POST" class="property-form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="property-title">Property Title:</label>
                <input type="text" id="property-title" name="property-title" required style="border-color:black;">
            </div>
            
            <div class="form-group">
                <label for="property-description">Property Description:</label>
                <textarea id="property-description" name="property-description" required style="border-color:black;"></textarea>
            </div>
            
            <div class="form-group">
                <label for="property-price">Price:</label>
                <input type="text" id="property-price" name="property-price" required style="border-color:black;">
            </div>
            
            <div class="form-group">
                <label for="property-location">Location:</label>
                <input type="text" id="property-location" name="property-location" required style="border-color:black;">
            </div>
            
            <div class="form-group" >
                <label for="property-type">Preferred type:</label>
                <select id="property-type" name="property-type" required style="border-color:black;">
                    <option value="">Select Property Type</option>
                    <option value="Sale">Sale</option>
                    <option value="Rent">Rent</option>
    
                </select>
            </div>
            
            <div class="form-group" >
                <label for="property-images">Upload Images:</label>
                <input type="file" id="property-image1" name="property-image1" accept="image/*" required style="border-color:black;">
                <input type="file" id="property-image2" name="property-image2" accept="image/*" required style="border-color:black;">
                <input type="file" id="property-image3" name="property-image3" accept="image/*" required style="border-color:black;">
                <input type="file" id="property-image4" name="property-image4" accept="image/*" required style="border-color:black;">
            </div>
            
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
<?php require_once('footer.php'); ?>
    