<?php
include './config.php';

   if (!empty($_POST['email'])) {
       
      

    $email = $_POST['email'];
    $query = "SELECT vendor_id FROM vendor_details WHERE v_email = '{$email}' LIMIT 1;";
    $results = $mysqli->query($query);
    if ($results->num_rows == 0) {
        echo "true";  //good to register
    } else {
        echo "false"; //already registered
    }
} else {
    echo "false"; //invalid post var
}

?>
