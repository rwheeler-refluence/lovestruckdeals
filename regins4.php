<?php
    
session_start();
    include './config.php';
    //include 'test.php';
//      include 'mailFunctions.php';
    //$minprice = $_POST['minprice'];
    //$maxprice = $_POST['maxprice'];
   
    $completed=$_POST['completed'];
    $maxcapacity = $_POST['maxcapacity'];
    $venuset = $_POST['venuset'];
    
    $type = $_POST['cat'];   
    
    $passkey = $_POST['vid'];
          
    $sql3 = "UPDATE vendor_details set max_capacity='" . $maxcapacity . "',venue_setting='" . $venuset . "' where confirm_code='" . $passkey . "'";    
    
    $result3 = mysqli_query($mysqli, $sql3);
    
    $sqlvendorselect="select * from vendor_details WHERE confirm_code='" . $passkey . "'";  
    
    $resultvendor=  mysqli_query($mysqli, $sqlvendorselect);
    
    while($rowvendor=  mysqli_fetch_array($resultvendor))
    {
        $fname=$rowvendor['fname'];
        $vid=$rowvendor['v_email'];
        $vendorid=$rowvendor['vendor_id'];   
        $sqlvendorfilter="delete from vendor_filter where vendor_id='".$vendorid."'";          
        $resultvendorfilter=  mysqli_query($mysqli, $sqlvendorfilter);
    }                                        
    foreach($_POST['cat'] as $val )
    {                                      
        $vendorfilters=$val;                                              
        $queinsertfilter="insert into vendor_filter (vendor_id,filterid) values ('".$vendorid."','".$vendorfilters."')";  
       
        $resultinserfilter=  mysqli_query($mysqli, $queinsertfilter);  
     
    }
    if($type=='')
    {                                      
        $vendorfilters=0;                                              
        $queinsertfilter="insert into vendor_filter (vendor_id,filterid) values ('".$vendorid."','".$vendorfilters."')";  
       
        $resultinserfilter=  mysqli_query($mysqli, $queinsertfilter);  
     
    }

    // Email send for Webadmin 
   
    
    // sesssion id send to dashboard 
    $_SESSION['fname']=$fname;
    $_SESSION["name"]=$vid; 
    $s = $_SESSION["name"]=$vid;
    $_SESSION['vendor_id']=$vendorid;
    
    
    if($completed=="3")
    {
        $sql3 = "UPDATE vendor_details set is_complete='5' where confirm_code='" . $passkey . "'";        
        $result3 = mysqli_query($mysqli, $sql3);
    }
    else 
    {
        $sql3 = "UPDATE vendor_details set is_complete='4' where confirm_code='" . $passkey . "'";        
        $result3 = mysqli_query($mysqli, $sql3);
    }
    
    ?>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<!-- This is what you need -->

<!--<script src="js/sweetalert-dev.js" type="text/javascript"></script>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
     <script>


    $(document).ready(function () {
swal({ 
                title: "",
		text: "Thank you for registering with Lovestruck Deals",
		type: "success",
		showCancelButton: false,
		confirmButtonColor: '#09DEDC',
		confirmButtonText: 'OK',
		closeOnConfirm: false
  },
  function(){
    window.location.href = 'vendor_admin/dashboard';
   
});
       // swal("THANK YOU VERY MUCH FOR YOUR INQUIRY !", " WE WILL REPLAY YOU SHORTLY");
         //window.location.href = 'vendor_admin/dashboard'
    });
</script>    -->
<SCRIPT LANGUAGE='JavaScript'>

        var passkey = '<?php echo $passkey; ?>';

        window.location.href = 'registration5?passkey=' + passkey;

    </SCRIPT> 

    <?php

    exit();


