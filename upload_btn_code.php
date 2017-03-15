<?php
$val_code = $_POST['pcode'];
//echo $val_code;
$val_id = $_POST['btnid'];
//$act_value = htmlspecialchars($val_code);
$act_value = $val_code;
$enc_val = base64_encode($act_value);
        include 'config.php';

       $sql1="select vendor_id from caopgroup where groupid = '" .$val_id. "'";
       //echo $sql1;
       $qry1 = mysqli_query($mysqli,$sql1);
       $result1=  mysqli_fetch_row($qry1);
       $vendor_id = $result1['0'];
       
       $status = 1;
       $sql2="update caopgroup set btn_status='".$status."' where groupid ='".$val_id."' ";
       $qry = mysqli_query($mysqli,$sql2);

       //print_r($vendor_id); 
       $sql="update vendor_details set buttoncode='".$enc_val."' where vendor_id='".$vendor_id."' ";
        $qry = mysqli_query($mysqli,$sql);
        echo 1;
exit;
        
?>