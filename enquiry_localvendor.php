    <?php
    include './config.php' ;
    include 'test.php';
            if(isset($_POST['submit']))
            {  
                             $aid=$_POST['aid'];
                             $myad =parse_url($aid);
                             $m1 = $myad['path'];
                             $mad = str_replace('/','',$m1);
                             $name = $_POST['name1'];
                             $email = $_POST['email'];
                             $contactNO=$_POST['contactNo'];
                             
                             
                          // insert advtered id 
                         $querynewsn = "insert into helpvideo(name,emailid,contactno,vendor_id)values('".$name ."','".$email."','".$contactNO."','".$aid."')";
                         $resultnewsn = mysqli_query($mysqli,$querynewsn) or die("query error");  
                         $last_id = mysqli_insert_id($mysqli);
                         //searche th recoder in last id 
                         
                         $qry1= "select vendor_id,name,emailid,contactno from helpvideo where id='".$last_id. "'";
                         $res1 = mysqli_query($mysqli, $qry1);
                         $addrow1 = mysqli_fetch_row($res1);
                         $vandor_id=$addrow1[0]; $eName=$addrow1[1];$email1=$addrow1[2];$contact=$addrow1[3];
   
                          $qry = "select fname,v_email from vendor_details where vendor_id='".$mad . "'";
                          
                             $res = mysqli_query($mysqli, $qry);
                             $addrow = mysqli_fetch_row($res);
                           
                            $vendor_name=$addrow[0];
                            $vandorEmail=$addrow[1];
                                                 
                          // $to = 'nital@wdipl.com';
                          $to = $vandorEmail;
                            $from = $email1;
                            $subject ="New inquiry about your deal on Lovestruck Deals";
                            
                            $path=$_SERVER['SERVER_NAME'];                            
                            $serverurl = "https://" . $path."/" ;
                            
                            $body.='
 <table style="border: 1px solid #e0e5e9;box-shadow:0px -3px 8px #f6f6f8; min-width:600px; width:100%; max-width:600px" >
 <tr>
    <td align="center" valign="top">
    <table bgcolor="#fff" border="0" cellpadding="10" cellspacing="0" style="font: 14px  arial, helvetica, sans-serif;color: #2f353e; line-height: 1.5em;padding:0;transition: all 0.2s ease-in-out 0s;width:100%;">
      <tr>
        <td align="left" bgcolor="" style="padding:12px 0pt 12px 12px;" valign="top"><a href="'.$serverurl.'/index"><img src= "'.$serverurl.'/images/xaaza_logo.png"></a></td>
      </tr>
      <tr>
        <td colspan="3" height="50" bgcolor="#69C9CA" style="font: 18px  arial, helvetica, sans-serif; color:#fff; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none;padding-left:10px; font-stretch: normal;"> User Details</td>
      </tr>
      <tr>
        <td height="30" style="font: 14px  arial, helvetica, sans-serif; width: 80px; color:rgb(81, 80, 80);font-size-adjust: none; font-stretch: normal;" valign="middle">
        <p style="margin:0;padding-bottom:11px;"> Dear '.$vendor_name.',</p>
         <p style="font: arial, helvetica, sans-serif;padding:0 ;margin:0">There is a new inquiry for your deal.</p> 
          </td>
      </tr>
      </table>
      </td>
  </tr>
  <tr>
    <td align="center" valign="top">
    
    <table bgcolor="" border="0" cellpadding="" cellspacing="0" style="font: 14px  arial, helvetica, sans-serif;color: #2f353e;line-height: 1.5em;margin: 0;padding:0;transition: all 0.2s ease-in-out 0s;width:100% ">
     	
        <tr>
        <td colspan="2" style="border-bottom:1px solid #e0e5e9;padding:10px;font-size:16px;background-color:#69C9CA;color:#fff;">Please find the details below </td>
         <!--<td style="border-bottom:1px solid #e0e5e9;padding:10px;background-color:#69C9CA;color:#fff"> </td>-->
      	</tr>
        <tr>
          <td align="left" height="30"  valign="middle" style="border-bottom:1px solid #e0e5e9;padding:10px;width: 20%;"> Name</td>
          <td align="left" valign="middle"  style="border-bottom:1px solid #e0e5e9;padding:10px;"> :'. $eName .'</td>
        </tr>
        <tr>
          <td align="left" height="30" valign="middle" style="border-bottom:1px solid #e0e5e9;padding:10px;width: 20%;"> Email</td>
          <td align="left" valign="middle" style="border-bottom:1px solid #e0e5e9;padding:10px;"> :'. $email1 .'</td>
        </tr>
        <tr>
          <td align="left" height="30" valign="middle" style="padding:10px;;width: 20%;"> Message </td>
          <td align="left" valign="middle" style="padding:10px;"> :'. $contact .'</td>
        </tr>
      </table>
   </td>
  </tr>
  </table>

</tr>
</tbody> ';
                         
                           sendgridEmail($to, $from, $subject, $body);
                           
           }
         $pageID=$_POST['pageNo'];
        
              if($res)
                {
                ?>                   
                   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                   <script src="js/sweetalert-dev.js" type="text/javascript"></script>
                   <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
     <script>


$(document).ready(function () {
swal({ 
                title: "Thank you! The vendor will be receiving your message shortly.",
		text: "",
		type: "success",
		showCancelButton: false,
		confirmButtonColor: '#09DEDC',
		confirmButtonText: 'OK',
		closeOnConfirm: false
  },
  function(){
 
         var foo = <?php echo $pageID; ?>;
         
         if(foo==1){
                  window.location.href = 'vendor-profile?id=<?php echo $mad ?>';
              }else
              {
           
                   window.location.href = 'local-vendors';
               }
              
             
});

       // swal("THANK YOU VERY MUCH FOR YOUR INQUIRY !", " WE WILL REPLAY YOU SHORTLY");
         //window.location.href = 'vendor_admin/dashboard.php'
    });
</script>             

                     <?php
                }
                else
                { ?> 
                  <SCRIPT LANGUAGE='JavaScript'>
	       window.alert('Error record not added!!!')
		   window.location.href='local-vendors.php'
		   </SCRIPT>-->
                    <?php
             }                                    

