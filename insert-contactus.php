<?php

    include './config.php'; 

    include './test.php';

    

    $dt2 = date("Y-m-d");    

    $name = $_POST['name'];

    $email = $_POST['email'];

    $message = $_POST['message'];

    

    $sqlcontactus = $mysqli->query("INSERT INTO contactus(conMemberName,conMemberEmail,conMembermessage,conMemberAddDate)VALUES('".$name."','".$email."','".$message."','".$dt2."')");

    

    $resultcontactus = mysqli_query($mysqli,$sqlcontactus);

    

    //$last_id = mysqli_insert_id($sqlcontactus);

    //$last_id = mysqli_insert_id($mysqli); 

    

    $to = 'info@lovestruckdeals.com';

    $from = $email;

    $subject ="New Contact Us Information";

    //$header="from: Nauman Ali <Nauman@gmail.com>";



    // Your message

    $path=$_SERVER['SERVER_NAME'];



$serverurl = "http://" . $path ;

$body.='<tbody>

    <tr>	

      <td align="left" bgcolor="#DDE3EC" style="padding: 12px 0pt 12px 12px;" valign="top"> <a><img src= "'.$serverurl.'/xaaza/images/xaaza_logo.png"></a></td>

      <!--<td align="right" bgcolor="#ECEEF1" style="font: 14px monospace; padding: 12px 12px 0pt 0pt; color: rgb(255, 255, 255); font-size-adjust: none; font-stretch: normal;" valign="top">

                                        </td>--> 

    </tr>

    <tr>

      <td colspan="2" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="723" bgcolor="#f8f8f8">

          <!--bgcolor="#ECEEF1"-->

          

                        </table></td>

                    </tr>

                   

                    <tr>

                      <td align="center" valign="top"><table bgcolor="#3B9C96" border="0" cellpadding="5" cellspacing="0" style="border:0; margin:15px 0" width="460" >

                          <tbody>

                            <tr>

                              <td colspan="3" height="30" style="font:14px monospace; color:#fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal; font-weight:600"> New Contact Details</td>

                            </tr>

                            <tr>

                              <td align="left" height="30" style="font: bold 14px monospace; width: 80px; color:#fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Name:</td>

                              <td align="left" style="font: 14px monospace; width: 20px; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"style="color: #F8F8F8"> '. $name .'</td>

                              <td align="left" style="font:  14px monospace; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>

                            </tr>

                            <tr>

                              <td align="left" height="30" style="font: bold 14px monospace; width: 80px; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> Email Id :</td>

                              <td align="left" style="font:14px monospace; width: 20px; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '.$email.' </td>

                              <td align="left" style="font:14px monospace; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"><?php echo $password ?></td>

                            </tr>

                            <tr>

                              <td align="left" height="30" style="font: bold 14px monospace; width: 80px; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle">Message:</td>

                              <td align="left" style="font:14px monospace; width: 20px; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"> '.$message.' </td>

                              <td align="left" style="font:14px monospace; color: #fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"><?php echo $password ?></td>

                            </tr>

                            <!--<tr>

                                                                                        <td align="left" height="35" style="font: bold 14px/normal arial, helvetica, sans-serif; width: 80px; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;" valign="middle">

                                                                                                Url</td>

                                                                                        <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; width: 20px; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;" valign="middle">

                                                                                                :</td>

                                                                                        <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;" valign="middle">

                                                                                                <a href="##siteurl##index.php?verifycode=##VERIFYCODE##style"="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;">Click here to activate your account</a></td>

                                                                                </tr>-->

                          </tbody>

                        </table></td>

                    </tr>

                    <tr>

                      <td height="30"></td>

                    </tr>

                    <tr>

                      <td align="left" style="font: 14px monospace; padding: 0px 10px 10px; color:#333; font-size-adjust: none; font-stretch: normal;" valign="top"> Thanks,<br />

                        <br />

                        LOVESTRUCK DEALS Support</td>

                    </tr>

                  </tbody>

                </table></td>

            </tr>

          </tbody>

        </table></td>

    </tr>

    <tr>

      <td bgcolor="#3B9C96" colspan="2" height="40" style="padding-right: 15px; padding-left: 15px;" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">

          <tbody>

            <tr>

              <td align="center" style="padding-top: 15px;"><a href="http://www.lovestruckdeals.com" style="font: 13px/normal arial, helvetica, sans-serif; color: rgb(255, 255, 255); text-decoration: none; font-size-adjust: none; font-stretch: normal;" target="_blank">www.lovestruckdeals.com</a></td>

            </tr>

          </tbody>

        </table></td>

    </tr>

  </tbody>

</table>';

sendgridEmail($to, $from, $subject, $body);

  



    //$body.="Click on this link to activate your account \r\n";

    //$body.="http://192.168.1.230/xaazanew/confirmation.php?passkey=$confirm_code";

    //$body.="http://www.livemysite.com/xaaza/confirmation.php?passkey=$message";





    sendgridEmail($to, $from, $subject, $body);

  

    //header("location: about_us.php");

 

   // if($resultcontactus)

    //{   

?>



       <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

       <script src="js/sweetalert-dev.js" type="text/javascript"></script>

       <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>

      

    

 <SCRIPT LANGUAGE='JavaScript'>

                   

$(document).ready(function () {

swal({ 

                title: "Thank you for contacting Lovestruck Deals!",

		text: "",

		type: "success",

		showCancelButton: false,

		confirmButtonColor: '#09DEDC',

		confirmButtonText: 'OK',

		closeOnConfirm: false

  },

  function(){

    window.location.href = 'about_us.php';

});



       // swal("THANK YOU VERY MUCH FOR YOUR INQUIRY !", " WE WILL REPLAY YOU SHORTLY");

         //window.location.href = 'vendor_admin/dashboard.php'

    });

                

                </SCRIPT>  



<?php

   // }

?>