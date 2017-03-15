<?php
include './config.php';
include './test.php';

if(isset($_REQUEST['frgtPass']))
{
    $email = $_POST['email'];
    $sqleemail = "select * from vendor_details where v_email = '$email'";
    $resemail = mysqli_query($mysqli, $sqleemail);
    $rowres = mysqli_fetch_assoc($resemail);
    $registerID = $rowres->vendor_id;
//    echo $rowres['v_email']; exit();
    
    if(mysqli_num_rows($resemail) > 0)
    {
        $curr_date = date("Y-m-d H:i:s");
        $length = 6;
        $randompass =substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,$length);
        $resetPass=md5($randompass);
        $sqlforgetpass = "update vendor_details set v_password ='$resetPass' where v_email ='".$_POST['email']."'" ;
        $resforgetpass = mysqli_query($mysqli, $sqlforgetpass);
       
        
        
             $to = $email;
             $from = 'Lovestruckdeals';
             $subject ="Forgot Password ";
             $path=$_SERVER['SERVER_NAME'];
             $serverurl = "https://" . $path ;
             $body.='  <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" >
<tbody>
   <tr>
              <td   valign="top">
			  <table border="0" cellpadding="5" cellspacing="0" style="border:1px solid #f5f5f5; width:100%">
                  <!---->
                  <tbody>
                  <tr>
                      <td colspan="2" valign="top"  >
                      <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#fff">
                          <!--bgcolor="#ECEEF1"-->
                          <tbody>
                                  <tr>	
             			 <td align="left" bgcolor="#fff" valign="top" style="padding-top:20px"> <a href="'.$serverurl.'/index"><img src= "'.$serverurl.'/images/xaaza_logo.png"></a></td>
                       			 </tr>
                     </tbody>
                     </table>
                     </td>
                     </tr>
                    <tr>
                      <td align="center" valign="top">
                      <table border="0" cellpadding="10" cellspacing="0" style=" margin:15px 0;width:100%;">
                          <tbody>
                            <tr>
                              <td colspan="3" height="45" style="font: 18px arial, helvetica, sans-serif; color:#fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px;border-bottom-style: solid;background-color:#69c9ca;font-size-adjust: none; font-stretch: normal; ">Password Reset Successful</td>
                            </tr>
                             <tr>
                                 <td style="width:100%;"><p style="margin:10px 0 0 0;">Thank you for contacting Lovestruck Deals! Your password has been reset. Please
 copy the system generated password and log in by clicking the link below.</p></td>
                             </tr>
                          
                           
                           
                            <tr>
                              <td align="left" height="40" style="font: 14px arial, helvetica, sans-serif; width: 176px; color:#333;  font-size-adjust: none; font-stretch: normal;" valign="middle"> Vendor Email  :'.$email.'</td>

                            </tr>
                            
                            <tr>
    <td style="background:#69c9ca none repeat scroll 0 0; border-radius: 6px;  display: inline-block; margin: 0 0 10px 10px; padding: 15px;color:#fff;">Your temporary password:<br/>
      <input class="form-control" value="'.$randompass.'" readonly type="text" kl_virtual_keyboard_secure_input="on" name="txtPassword placeholder=" required="" style=" border:0;border-radius: 4px; font-weight: 600; color: #585352; padding: 8px; width: 89%;margin:10px 0 0 0;"></td>
  </tr>
                           <tr>
    <td><a href="https://www.lovestruckdeals.com/" style="font:14px arial, helvetica, sans-serif; color:#A70318; margin-top:10px;" target="_blank">Login Here</a></td>
  </tr>
  <tr>
  <td align="left" height="40" style="color:#3b9c96;font:14px arial,helvetica,sans-serif;width:176px;font-size-adjust:none;font-stretch:normal" valign="middle"> Note: Please change your temporary password to your own in the profile section of  your account. </td>
  </tr>
                          </tbody>
                        </table>
                       </td>
                    </tr>
                   <!-- <tr>
                      <td height="30"></td>
                    </tr>-->
                    <tr>
                      <td align="left" style="font: 14px arial, helvetica, sans-serif; padding:10px 15px; color:#333; font-size-adjust: none; font-stretch: normal;" valign="top"> Thank you, <br />
                        <br />
                        LOVESTRUCK DEALS Support</td>
                    </tr>
                  </tbody>
                   <!-- footer-->
                  <tr> <td bgcolor="#f06597" colspan="2" height="40" style="padding-right: 15px; padding-left: 15px;" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" colspan="2">
                      <tbody>
                        <tr>
                          <td align="center"><a href="https://www.lovestruckdeals.com" style="font: 14px arial, helvetica, sans-serif; color: rgb(255, 255, 255); text-decoration: none; font-size-adjust: none; font-stretch: normal; line-height:40px" target="_blank">www.lovestruckdeals.com</a></td>
                        </tr>
                      </tbody>
                  
                                
                  </table>
 
                </td>
                </tr>
                </table>
                </td>
            </tr>
     
  </tbody>
</table>
';
    sendgridEmail($to, $from, $subject, $body);    
    ?>
<!--    <script type="text/javascript">
        window.location.href ='/dev/index.php';
            
    </script>-->
    
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="js/sweetalert-dev.js" type="text/javascript"></script>
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script>
        $(document).ready(function () {
        swal({ 
                   title: "Check your email to reset your password",
                   text: "",
                   type: "success",
                   showCancelButton: false,
                   confirmButtonColor: '#09DEDC',
                   confirmButtonText: 'OK',
                   closeOnConfirm: false
        },
        function(){
            window.location.href ='index';
          
        });

          // swal("THANK YOU VERY MUCH FOR YOUR INQUIRY !", " WE WILL REPLAY YOU SHORTLY");
            //window.location.href = 'vendor_admin/dashboard.php'
        });
        </script>       
   <?php
    }
    else
    {
         $redirect="Please enter your valid Email ID";
    }
}
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
 <body class="signin">
     <title>Forget Password</title>    
     <div style="margin-top: 130px; margin-left: 421px;">  
         <a href="/"><img src= "/images/xaaza_logo.png"></a>
         
 </div>	
                       			 
                     
        <section style="margin-top: 35px;">
            
            <div class="panel panel-signin">
                <div class="panel-body">
                  
                    <h3>Forget Password ?</h3>
                    <p>Enter your e-mail address below to reset your password. </p>
                    
                    
                    <form action="" method="post">
                         <?php if ( $redirect == "Please enter your valid Email ID")
                        { ?>
                        <div class="form-group" id="alert-dng"  >
<!--                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>-->
                                    <div style="color:#A70318;"><?php echo $redirect ?></div> <a href="#" class="alert-link"></a> 
                                    
                     </div>   
                        <?php } ?>
                     
                        <div class="form-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="email"  class="form-control"  placeholder="Email">
                        </div>
                      
                       
                               <div class="form-group">
                               <!-- <button class="btn btn-default pull_right col-sm-4" id="back-btn" type="button">Back</button>-->
                                <button type="submit"  id="frgtPass" name="frgtPass" class="btn btn-success">Submit<i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    
                </div><!-- panel-body -->
          
            </div><!-- panel -->
            
        </section>
    </body>





<!--<form action="" method="post">
                         
                        <div class="input-group mb15 col-sm-12">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="email"  class="form-control"  placeholder="Email">
                        </div>
                      
                        <div class="clearfix">
                               <div class="pull-right">
                                 <button class="btn btn-default pull_right col-sm-4" id="back-btn" type="button">Back</button>
                                <button type="submit"  id="frgtPass" name="frgtPass" class="btn btn-success">Submit <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>-->