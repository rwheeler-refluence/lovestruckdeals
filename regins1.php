<?php
include './config.php';
session_start();
$msg = '';
//print_r($_POST);exit;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptcha = $_POST['g-recaptcha-response'];
    if (!empty($recaptcha)) {
        include("getCurlData.php");
        $google_url = "https://www.google.com/recaptcha/api/siteverify";
        $secret = '6LfPJiUTAAAAAJgj3t2hZKoLw6z1kaCQxNN5XfWW';
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $google_url . "?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $ip;
        $res = getCurlData($url);
        $res = json_decode($res, true);
        //reCaptcha success check 
        if ($res['success']) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $password1 = $_POST['password'];
            $current_date = date("Y-m-d");
            $fname1 = $_POST['firstname'];
            $fname =preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $fname1);
            
            $lname1 = $_POST['lastname'];
            $lname =preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $lname1);
            
            $cname1 = $_POST['companyname'];
            $cname =preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $cname1);
            $btype = $_POST['btype'];
            $msg = $_POST['msg'];
            $cemail = $_POST['cemail'];
            $ctelephone = $_POST['ctelephone'];
            $ctelephone1 = $_POST['ctelephone1'];
            $ctelephone2 = $_POST['ctelephone2'];
            $cwebsite = $_POST['cwebsite'];
            $cpostcode = $_POST['cpostalcode'];
            $cadd1 = mysqli_real_escape_string($mysqli,$_POST['caddress1']);
//            $cadd1 =preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $cadd11);
            $cadd2 = $_POST['caddress2'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $references = $_POST['aboutus'];
            $cmp_status = $_POST['complete_status'];
            $confirm_code=md5(time().$email); 
        ///  $passkey = $_POST['vid'];
            $result = $mysqli->query("INSERT INTO vendor_details(v_email,v_password,fname,lname,c_name,v_message,b_type,c_email,c_telephone,c_telephone1,c_telephone2,c_website,c_postalcode,c_address1,c_address2,c_regionstate,c_city,confirm_code,reference,address,joindate,is_complete)VALUES('" . $email . "', '" . $password . "','" . $fname . "','" . $lname . "','" . $cname . "','" . $msg . "','" . $btype . "','" . $cemail . "','" . $ctelephone . "','" . $ctelephone1 . "','" . $ctelephone2 . "','" . $cwebsite . "','" . $cpostcode . "','" . $cadd1 . "','" . $cadd2 . "','" . $state . "','" . $city . "','" . $confirm_code . "','" . $references . "','" . $address . "','" . $current_date . "','". $cmp_status ."')");
           // $last_id = mysqli_insert_id($mysqli);
            
           // $sql3="update vendor_details set confirm_code='$confirm_code' where vendor_id='$last_id'";
          //  $result3=$mysqli->query($sql3);
            $passkey = $confirm_code;
            $qry11 = "select vendor_id from vendor_details where confirm_code='".$passkey."'"; 
        $result11=mysqli_query($mysqli,$qry11);  
        $result=  mysqli_fetch_row($result11);
        $row=$result[0];

//        $qry13 = "select operatorid from caoperator where confirm_code='".$row."'"; 
//        $result13=mysqli_query($mysqli,$qry13);  
//        $result14=  mysqli_fetch_row($result13);
//        $operator_id=$result14[0];
        
//        $sql_operator = $mysqli->query("update caoperator set vclocalename='".$fname."' where confirm_code='".$row."'" );
        
//        $qry12 = "INSERT INTO caopgroup ("
//        . " vendor_id,vclocalname,vccommonname"
//        . ") VALUES  ('" . $row . "','" . $fname . "','".$fname."')";
//        $result12=mysqli_query($mysqli,$qry12);
//        
//        $group_id = mysqli_insert_id($mysqli);
//        //print_r($operator_id);print_r($group_id);die;
//        
//        $sql_operator2 = $mysqli->query("INSERT INTO caoperatortoopgroup ("
//        . " groupid,operatorid"
//        . ") VALUES  ('" . $group_id . "','". $operator_id ."')");
            ?>
            <SCRIPT LANGUAGE='JavaScript'>
                var passkey = "<?php echo $passkey; ?>";
                window.location.href = 'registration2?passkey=' + passkey;
            </SCRIPT> 
            <?php
        } else {
            $msg = "Please re-enter your reCAPTCHA.";
        }
    } else {
        $msg = "Please re-enter your reCAPTCHA.";
    }
}
?>


