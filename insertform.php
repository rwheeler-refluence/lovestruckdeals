    <?php
    include './config.php' ;
    include './mailFunctions.php';
            if(isset($_POST['submit']))
            {  
                // value insert into data--------------
                //echo "<pre>";print_r($_POST['state'][0]);die;           
                             
                             $name = $_POST['name1'];
                             $email = $_POST['email'];
                             $querynewsn = "insert into newsletterform(name,email)values('".$name ."','".$email."')";
                             $resultnewsn = mysqli_query($mysqli,$querynewsn) or die("query error");  
                             $state_id = $_POST['state'][0];
                             $last_id = mysqli_insert_id($resultnewsn);
                             $last_id = mysqli_insert_id($mysqli);
                            
                           foreach($_POST['cat'] as $val ) 
                           {
                            //echo "<pre>";print_r($val); pr($last_id); die;  
                            
                            $catid = $val;
                            $querynews = "insert into category_newsletter(categoryId,newsletterformId)values('".$catid."','".$last_id."')";
                            $resultnews = mysqli_query($mysqli,$querynews) or die("query error");  
                           
                            }
                        
                           foreach($_POST['city'] as $val ) 
                           {
                            //echo "<pre>";print_r($val); pr($last_id); die;  
                            
                            $city_id = $val;
                            $querynewss="insert into statecity_newsletter(newsletterformId,sid,cityId)values('".$last_id."','".$state_id."','".$city_id."')";
                            $resultnewss = mysqli_query($mysqli,$querynewss) or die("query error"); 
                            
                            }
                             
//                            $sqlemail = "select * from newsletterform where email =  '".$email . "'";
//                             $resultsql = mysqli_query($mysqli, $resultsql);
                       
                            $qry = "SELECT n.name,n.email,n.status,cn.categoryId,cn.newsletterformId,ctn.newsletterformId,ctn.cityId,ctn.sid,
                            GROUP_CONCAT(DISTINCT c.categoryName SEPARATOR ',') AS Category_Interested,
                            GROUP_CONCAT(DISTINCT ci.cityName SEPARATOR ',')AS City_name,
                            GROUP_CONCAT(DISTINCT st.sname SEPARATOR ',')AS State_name
                            FROM newsletterform n,category c,category_newsletter cn , statecity_newsletter ctn,city ci,state st
                            WHERE cn.categoryId = c.categoryId 
									 AND n.newsletterformId = cn.newsletterformId 
									 AND ctn.cityId = ci.cityId
									 AND ctn.sid = st.sid
									 AND n.newsletterformId = ctn.newsletterformId AND n.email = '".$email . "'";
                             $res = mysqli_query($mysqli, $qry);
                             $addrow = mysqli_fetch_array($res);
                             
                             $catname = $addrow['Category_Interested'];
                             $cityname = $addrow['City_name'];
                             $statename = $addrow['State_name'];
                                                        
                                                        
                            $to = 'info@lovestruckdeals.com';
                            $from = $email;
                            $subject ="New Newsletter Subscription";
                            
                            $path=$_SERVER['SERVER_NAME']."";                            
                            $serverurl = "https://" . $path ;
                            
                            $body.='
                                  <tr>
                                    <td align="left" bgcolor="#DDE3EC" style="padding: 12px 0pt 12px 12px;" valign="top">
                                        <a href="'.$serverurl.'/"><img src= "'.$serverurl.'/images/xaaza_logo.png"></a></td>                                                                                                                     
                                </tr>
                               <tr>
  <td align="center" valign="top"><table bgcolor="#f8f8f8" border="0" cellpadding="5" cellspacing="0" style="border: 1px solid #ccc;" width="460">
      <tbody>
        <tr>
          <td colspan="3" height="40" bgcolor="#66CCCC" style="font: bold 16px/normal arial, helvetica, sans-serif; color:#333; border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none;padding-left:10px; font-stretch: normal;"> User Details</td>
        </tr>
        <tr>
          <td align="left" height="35" style="font: bold 14px/normal arial, helvetica, sans-serif; width:140px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none;padding-left:10px; font-stretch: normal;" valign="middle"> Name</td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; width: 20px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;padding-left:10px" valign="middle"> :'. $name .'</td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>
        </tr>
        <tr>
          <td align="left" height="35" style="font: bold 14px/normal arial, helvetica, sans-serif; width:140px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;padding-left:10px;" valign="middle"> Email Id</td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; width: 20px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;padding-left:10px" valign="middle"> :'. $email .'</td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>
        </tr>
        <tr>
          <td align="left" height="35" style="font: bold 14px/normal arial, helvetica, sans-serif; width:140px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;padding-left:10px" valign="middle"> Category Interested</td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; width: 20px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;padding-left:10px" valign="middle"> :'.$catname.'</td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>
        </tr>
        <tr>
          <td align="left" height="35" style="font: bold 14px/normal arial, helvetica, sans-serif; width:140px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;padding-left:10px" valign="middle"> Location </td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; width: 20px; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;padding-left:10px" valign="middle"> :'.$statename.','.$cityname.' </td>
          <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); border-bottom-color: rgb(202, 202, 202); border-bottom-width: 1px; border-bottom-style: solid; font-size-adjust: none; font-stretch: normal;" valign="middle"></td>
        </tr>
        <!--<tr>
                                                                                        <td align="left" height="35" style="font: bold 14px/normal arial, helvetica, sans-serif; width: 80px; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;" valign="middle">
                                                                                                Url</td>
                                                                                        <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; width: 20px; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;" valign="middle">
                                                                                                :</td>
                                                                                        <td align="left" style="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;" valign="middle">
                                                                                                <a href="https://www.lovestruckdeals.com/?verifycode=##VERIFYCODE##" style="font: 14px/normal arial, helvetica, sans-serif; color: rgb(81, 80, 80); font-size-adjust: none; font-stretch: normal;">Click here to activate your account</a></td>
                                                                                </tr>-->
      </tbody>
    </table></td>
</tr>
                                    <tr> 
                                ';
                            
                           sendgridEmail($to,$cc, $from, $subject, $body);
           }
             if($res)
                {
                ?>                   
                   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                   <script src="js/sweetalert-dev.js" type="text/javascript"></script>
                   <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
     <script>


$(document).ready(function () {
swal({ 
                title: "Thank you for subscribing! The latest deals will be sent directly to your inbox.",
		text: "",
		type: "success",
		showCancelButton: false,
		confirmButtonColor: '#09DEDC',
		confirmButtonText: 'OK',
		closeOnConfirm: false
  },
  function(){
    window.location.href = 'https://www.lovestruckdeals.com/';
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
	       window.alert('Error Record not Added!!!')
		   window.location.href='https://www.lovestruckdeals.com/'
		   </SCRIPT>-->
                    <?php
             }   
