<?php
session_start();    
include 'mailFunctions.php';

include './config.php';
$completed=$_POST['completed'];
$passkey = $_POST['vid'];
//echo 'vid:'.$passkey = $_POST['vid'];
$venderID = $_POST['venderid'];
$vendor_name = $_POST['username'];
$description = $_POST['description'];
$categoryId = $_POST['categoryid'];
$dealtitle = $_POST['dealtitle'];
$state = $_POST['stateid'];
$cityid = $_POST['cityid'];
$current_date = date("Y-m-d");
$expirydate = date('Y-m-d', strtotime('+6 months'));
$advtype = 'FEATURED';
$isdelete = '0';
$defaultImage = $_POST['DefaultImage'];
 
 
 
$image = imagecreatefromstring(file_get_contents($_FILES['image']['tmp_name']));
$exif = exif_read_data($_FILES['image']['tmp_name']);
if (!empty($exif['Orientation'])) {
    switch ($exif['Orientation']) {
        case 8:
             ini_set('memory_limit', '-1');
            $image = imagerotate($image, 90, 0);
            break;
        case 3:
             ini_set('memory_limit', '-1');
            $image = imagerotate($image, 180, 0);
            break;
        case 6:
             ini_set('memory_limit', '-1');
            $image = imagerotate($image, -90, 0);
            break;
    }
    imagejpeg($image, $_FILES['image']['tmp_name']);
}

$target_path1 = "vendor_admin/images/";
$imgname = rand(1000, 100000) . "-" . $_FILES['image']['name'];
$target_path = $target_path1 . $imgname;
move_uploaded_file($_FILES['image']['tmp_name'], $target_path);


 if ($_POST['DefaultImage'] != "" && $_FILES['image']['name'] == "") {

$sql1 = "INSERT INTO advertisement(categoryId,vendor_id,adv_type,advertise_img,description,dealtitle,vendor_name,cityId,sid,advDisplayDate,advExpiryDate,is_delete)
                                        VALUES('" . $categoryId . "','" . $venderID . "','" . $advtype . "','" . $defaultImage . "','" . $description . "','" . $dealtitle . "','" . $vendor_name . "','" . $cityid . "','" . $state . "','" . $current_date . "','" . $expirydate . "','" . $isdelete . "')";
$result12 = mysqli_query($mysqli, $sql1);
$last_id = mysqli_insert_id($result12);
$last_id = mysqli_insert_id($mysqli);
//vendor_filter to add dat in database for filtering
$quevendorfilter = "select vendor_id,advertise_id,sid,cityId,categoryId from advertisement where advertise_id='" . $last_id . "'";
$resultvendorfilter = mysqli_query($mysqli, $quevendorfilter);
$rowvendorfilter = mysqli_fetch_array($resultvendorfilter);
$vendoridfilter = $rowvendorfilter['advertise_id'];
$vendorfilterId = array();
$sqlcatvender1 = "select vendorfilterId from vendor_filter where vendor_id='" . $rowvendorfilter['vendor_id'] . "'";
$result1 = mysqli_query($mysqli, $sqlcatvender1);
while ($addrow1 = mysqli_fetch_array($result1)) {
    $vendorfilterId[] = $addrow1['vendorfilterId'];
}
$data = $vendoridfilter;
$data1['a2'] = $vendorfilterId;
$i = 0;
foreach ($data1['a2'] as $id) {
    $att = $data;
    $values = $data1['a2'][$i];
    $sql = "INSERT INTO catfliter(vendorfilterId, advertisement)value('" . $values . "','" . $att . "')";
    $result3 = mysqli_query($mysqli, $sql);
    $i++;
}
 }else{
     
     $sql1 = "INSERT INTO advertisement(categoryId,vendor_id,adv_type,advertise_img,description,dealtitle,vendor_name,cityId,sid,advDisplayDate,advExpiryDate,is_delete)
                                        VALUES('" . $categoryId . "','" . $venderID . "','" . $advtype . "','" . $imgname . "','" . $description . "','" . $dealtitle . "','" . $vendor_name . "','" . $cityid . "','" . $state . "','" . $current_date . "','" . $expirydate . "','" . $isdelete . "')";
$result12 = mysqli_query($mysqli, $sql1);
$last_id = mysqli_insert_id($result12);
$last_id = mysqli_insert_id($mysqli);
//vendor_filter to add dat in database for filtering
$quevendorfilter = "select vendor_id,advertise_id,sid,cityId,categoryId from advertisement where advertise_id='" . $last_id . "'";
$resultvendorfilter = mysqli_query($mysqli, $quevendorfilter);
$rowvendorfilter = mysqli_fetch_array($resultvendorfilter);
$vendoridfilter = $rowvendorfilter['advertise_id'];
$vendorfilterId = array();
$sqlcatvender1 = "select vendorfilterId from vendor_filter where vendor_id='" . $rowvendorfilter['vendor_id'] . "'";
$result1 = mysqli_query($mysqli, $sqlcatvender1);
while ($addrow1 = mysqli_fetch_array($result1)) {
    $vendorfilterId[] = $addrow1['vendorfilterId'];
}
$data = $vendoridfilter;
$data1['a2'] = $vendorfilterId;
$i = 0;
foreach ($data1['a2'] as $id) {
    $att = $data;
    $values = $data1['a2'][$i];
    $sql = "INSERT INTO catfliter(vendorfilterId, advertisement)value('" . $values . "','" . $att . "')";
    $result3 = mysqli_query($mysqli, $sql);
    $i++;
}
     
     
 }
//email to vendor 
$sqlvendorselect="select v.fname,v.profile_image,v.c_name,ca.categoryName,v.v_email,v.c_telephone,v.c_telephone1,v.c_telephone2,s.sname,c.cityName,v.lname 
                      from vendor_details v,category ca,state s,city c
                      WHERE v.b_type=ca.categoryId and v.c_regionstate=s.sid and v.c_city=c.cityId and v.confirm_code='".$passkey."'";  

    $resultvendor=  mysqli_query($mysqli, $sqlvendorselect);
    $row=  mysqli_fetch_row($resultvendor);
   $name=$row[0];$profileImage=$row[1];$companyName=$row[2];$categoryName=$row[3];
   $vendorEmail=$row[4];$vendeorNo1=$row[5];$vendeorNo2=$row[6];$vendeorNo3=$row[7];
   $stateName=$row[8];$cityName=$row[9];$sarName=$row[10];
   
    $to = $vendorEmail;
    $cc='info@lovestruckdeals.com';
    //$cc='xxaaza@gmail.com';
    //$from = 'rahulp@wdipl.com';
    
    $from = 'Lovestruckdeals';
    $subject ="New Vendor Registration";
   

// Your message

//$body = '<html><body>';
//
//$body.= '<img src="">';

//$body="Your Confirmation link \r\n";
//$body.="Click on this link to activate your account \r\n";
////$body.="http://192.168.1.230/xaazanew/confirmation.php?passkey=$confirm_code";
//$body.="http://www.livemysite.com/xaaza/confirmation.php?passkey=$confirm_code";

$path=$_SERVER['SERVER_NAME'];

$serverurl = "http://" . $path ;
$body.='<tbody>
   <tr>
              <td style="padding:20px 20px 20px;" valign="top"><table border="0" cellpadding="20" cellspacing="0" width="600" style="border:1px solid #f5f5f5;">
                  <!---->
                  <tbody>
                  <tr>
                      <td colspan="2" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="500" bgcolor="#fff">
                          <!--bgcolor="#ECEEF1"-->
                          
                     </table>
                     </td>
                     </tr>
                    <tr>
                      <td align="center" valign="top">
                      <table border="0" cellpadding="10" cellspacing="0" style="border:1px solid #f5f5f5; margin:15px 0;width:100%;">
                          <tbody>
                            <tr>
                              <td colspan="3" height="45" style="font: 18px arial, helvetica, sans-serif; color:#fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px;border-bottom-style: solid;background-color:#69c9ca;font-size-adjust: none; font-stretch: normal; font-weight:600;"> Vendor Login Details</td>
                            </tr>
                            <tr>
                           
                                  <td height="15" style="font: 14px arial, helvetica, sans-serif; width: 100%;float:left; color:#333;font-size-adjust: none; font-stretch: normal; text-align: justify;padding-left:3px;" valign="middle"> Vendor Profile Image </td>
                                   <td style="padding: 12px 0pt 12px 12px;width:100%;float:left;" valign="top"> <img src= "' . $serverurl . '/images/' . $profileImage . '"height="150px" width="150px"></td>
                                 
                              </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Name </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width:  auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $name .'&nbsp;'.$sarName.'</td>
                             <!-- <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Company Name </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $companyName .'</td>
                             <!-- <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Category </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width:  auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $categoryName .'</td>
                              <!--<td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Email Id </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $vendorEmail .'</td>
                             <!-- <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                            
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Location </td>
                              <td align="left" style="font:14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '.$stateName.',&nbsp;'.$cityName.' </td>
                               <!--<td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                           <tr>
                              <td align="left" height="30" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle">Vendor Contact No </td>
                              <td align="left" style="font: 14px arial, helvetica, sans-serif; width: auto; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width:1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '. $vendeorNo1 .'-'.$vendeorNo2.'-'.$vendeorNo3.'
                              
                              </td>
                            <!--  <td align="left" style="font: 14px arial, helvetica, sans-serif; color: #333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>-->
                            </tr>
                          </tbody>
                        </table>
                       </td>
                    </tr>
                   <!-- <tr>
                      <td height="30"></td>
                    </tr>-->
                    <tr>
                      <td align="left" style="font: 14px arial, helvetica, sans-serif; padding:10px 15px; color:#333; font-size-adjust: none; font-stretch: normal;" valign="top"> Thanks,<br />
                        <br />
                        LOVESTRUCK DEALS Support</td>
                    </tr>
                  </tbody>
                   <!-- footer-->
                  <tr> <td bgcolor="#f06597" colspan="2" height="40" style="padding-right: 15px; padding-left: 15px;" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" colspan="2">
                      <tbody>
                        <tr>
                          <td align="center"><a href="http://www.lovestruckdeals.com/" style="font: 14px arial, helvetica, sans-serif; color: rgb(255, 255, 255); text-decoration: none; font-size-adjust: none; font-stretch: normal;" target="_blank">www.lovestruckdeals.com</a></td>
                        </tr>
                      </tbody>
                  
                                
                  </table>
                </td>
                </tr>
                </table>
                </td>
            </tr>
     
  </tbody>
</table>';
sendgridEmail($to,$cc,$from, $subject, $body);
   
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

    //End Email for Webadmin
?>



<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert-dev.js" type="text/javascript"></script>
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
    window.location.href = 'vendor_admin/dashboard.php';
   
});
       // swal("THANK YOU VERY MUCH FOR YOUR INQUIRY !", " WE WILL REPLAY YOU SHORTLY");
         //window.location.href = 'vendor_admin/dashboard.php'
    });
</script>    
