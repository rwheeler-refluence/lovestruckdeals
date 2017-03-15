<?php
include './config.php';
//include('config1.php');
//$mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
//$mysqli = mysqli_connect('localhost', 'livemysi_xaaza', 'n8viiA(liqof', 'livemysi_xaaza'); 
// Passkey that got from link
$passkey = $_GET['passkey'];

// Retrieve data from table where row that match this passkey
$sql1 = "SELECT * FROM vendor_details WHERE confirm_code ='".$passkey."'";

 $result1 = mysqli_query($mysqli,$sql1);


// If successfully queried
if ($result1) {

// Count how many row has this passkey
    $count = mysqli_num_rows($result1);    
    
// if found this passkey in our database, retrieve data from table "temp_members_db"
    if ($count == 1) {

        $rows = mysqli_fetch_array($result1);
        $vendor_id = $rows['confirm_code'];
        

        $sql3 = "update vendor_details  set verification='1' where vendor_id='".$vendor_id."'";        
        $result3 = mysqli_query($mysqli,$sql3);
    }

// if not found passkey, display message "Wrong Confirmation code
    else {
        echo "Wrong Confirmation code";
    }

// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
    if ($result2) {

        echo "Your account has been activated";

// Delete information of this user from table "temp_members_db" that has this passkey
//$sql3="update vendor_details  set confirm_code='confirm', where vendor_id='$vendor_id'";
//$result3=$mysqli->query($sql3);

        
    }
    
    ?>
<SCRIPT LANGUAGE='JavaScript'>
    var vendorid='<?php echo $vendor_id; ?>';
    window.location.href='registration2?passkey='+vendorid;
</SCRIPT> 
<?php

   // header("location: registration2?passkey=$vendor_id");
}
?>