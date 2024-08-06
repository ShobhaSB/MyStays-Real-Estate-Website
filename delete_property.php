<head>
    <link rel="stylesheet" href="css/register.css">
</head>
<?php
session_start();
require_once('lib/functions.php');

$db = new db_functions();
if (isset($_POST['property_id'])) {
    $property_id = $_POST['property_id'];
}
        if ($db->delete_property_by_property_id($property_id)) {
            header('Location: myproperty.php');
    
        } else {
            echo "Error deleting property.";
        }
    

?>
