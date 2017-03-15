<?php 
    include '../config.php';
    $transectionId = $_GET['tx'];
    $status = $_GET['st'];
    $amount = $_GET['amt'];
    $cc = $_GET['cc'];
    $cm = $_GET['cm']; 
   // $advid=$_GET['advid'];
             
    $month=$_GET['month'];
    $expirydate = date('Y-m-d', strtotime('+'.$month.'months'));
    
    $advtype='FEATURED';
    $current_date= date("Y-m-d");
    $categoryid=$_GET['categoryid'];
    $vendorid=$_GET['vendorid'];
    $image=$_GET['image'];
    $description=$_GET['description'];
    $dealtitle=$_GET['dealtitle'];
    $vendorname=$_GET['vendorname'];          
    $state=$_GET['stateid'];
    $city=$_GET['cityid'];
//    $latitude=$_GET['latitude'];
//    $longitude=$_GET['longitude'];
//          
    $isdelete='0';
    $spolightdeal='no';
    
    $sql1 = "INSERT INTO advertisement(categoryId,vendor_id ,advertise_img,description,dealtitle,vendor_name,cityId,sid,is_delete,spotlightDeal,adv_type,advExpiryDate,advDisplayDate) "
            . "VALUES('" . $categoryid . "','" . $vendorid . "','" . $image . "','" . $description . "','".$dealtitle."','" . $vendorname . "','" . $city . "','" . $state . "','".$isdelete."','".$spolightdeal."','".$advtype."','".$expirydate."','".$current_date."')";                                                                                          
    echo $sql1;exit;
    $result12 = mysqli_query($mysqli, $sql1); 
    
    $last_id = mysqli_insert_id($result12);
    $last_id = mysqli_insert_id($mysqli);   
      
    $insertpayment="insert into payments(txn_id,payment_status,amount,advertise_id,adv_type,monthplan,paydate)values('".$transectionId."','".$status."','".$amount."','".$last_id."','".$advtype."','".$month."','".$current_date."')";    
    $resultpayment=  mysqli_query($mysqli, $insertpayment);
    
    
     //vendor_filter to add dat in database for filtering
    $quevendorfilter="select vendor_id,advertise_id,sid,cityId,categoryId from advertisement where advertise_id='".$last_id."'";
    $resultvendorfilter=  mysqli_query($mysqli, $quevendorfilter);
    $rowvendorfilter=  mysqli_fetch_array($resultvendorfilter); 
    
    $vendoridfilter=$rowvendorfilter['advertise_id'];
    $state=$rowvendorfilter['sid'];
    $city=$rowvendorfilter['cityId'];
    $categoryid=$rowvendorfilter['categoryId'];
   

    
    $vendorfilterId = array();

    $sqlcatvender1 = "select vendorfilterId from vendor_filter where vendor_id='".$rowvendorfilter['vendor_id']."'";
    
    $result1 = mysqli_query($mysqli, $sqlcatvender1);
    while ($addrow1 = mysqli_fetch_array($result1)) 
    {
        $vendorfilterId[] = $addrow1['vendorfilterId'];
    }
    $data=$vendoridfilter;
    $data1['a2'] = $vendorfilterId;


    $i = 0;
    foreach ($data1['a2'] as $id) 
    {       
        $att = $data;
        $values = $data1['a2'][$i];       
         $sql = "INSERT INTO catfliter(vendorfilterId, advertisement)value('".$values."','".$att."')";         
         $result3 = mysqli_query($mysqli,$sql);   
        $i++;
    }
            
//    $updateadvertise="update advertisement set spotlightDeal='no',adv_type='".$advtype."',is_delete='0',advExpiryDate='".$expirydate."' where advertise_id='".$advid."'";
//    $resultupdateadvertise=  mysqli_query($mysqli, $updateadvertise);
    
    if($resultpayment)
    {
?>
    <script type="text/javascript">
        location.href = 'managedeals.php';                       
    </script>
    
    <?php } ?>

    