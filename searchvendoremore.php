<?php 
include "config.php";
$cat_id = $_POST['hdnid'];
$id = $_POST['add_id'];
$state = $_POST['stateID'];
$city = $_POST['cityID'];
$vid = $_POST['vendor_id'];
$qry = $mysqli->query("SELECT sid FROM state WHERE sname like '%$state'");
$row = $qry->fetch_row();
$sid = $row[0];
//$row = $qry->fetch_array();$sid=$row[0];
$qry1 = $mysqli->query("SELECT cityId FROM city WHERE cityName = '$city' ");
$row = $qry1->fetch_row();
$cid = $row[0];
$condition = "";
        
if($sid != NULL && $cid == NULL) {
    $condition.=" And c_regionstate='" . $sid . "'";
    
}else if($sid != NULL && $cid != NULL) {
    $condition.=" And c_regionstate='" . $sid . "' And c_city='" . $cid . "'";
    
}

// Display Company name
      function company_echo($x, $length) 
    {
        if (strlen($x) <= $length) 
        {
            echo $x;
        } 
        else 
        {
            $y = substr($x, 0, $length) . '';
            echo $y." ...";;
        }
    } 
function custom_echo($x, $length) {
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '';
        echo $y;
    }
}
if($id==NULL)

{

?>

<style>i.cat_icon img{margin-top:-9px;}</style>



        <div class="col-lg-12 pd0 bottom-border">

            <?php

            $adcat = "select * from  category where isdel='0' and categoryId = '" . $cat_id . "'";        

          $adresul = mysqli_query($mysqli, $adcat) or die(mysqli_error());

         $adrow = mysqli_fetch_array($adresul);

                {

            $addvendor = "select v.profile_image,v.fname,v.v_likes,v.c_city,v.c_regionstate,v.vendor_id,v.b_type,v.c_name,v.isdel,cit.cityName,c.categoryName

            from vendor_details v ,state s,category c ,city cit 

            where cit.cityId=v.c_city  and c.categoryId = v.b_type  and s.sid=v.c_regionstate and v.status = '1' and v.isdel = 1 ".$condition." order by v.vendor_id desc ";    

           

            $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());

           

            ?>

            <h2><i class="cat_icon"><img src="images/<?php echo $adrow['image_icon']?>"> </i><?php echo $adrow['categoryName']; ?></h2>  

            <?php while ($addrowven = mysqli_fetch_array($addresultven)) { ?>

                <div class="studio">

					<div class="bor">



                    <a href="vendor-profile.php?id=<?php echo $addrowven['vendor_id']; ?>"><img src="images/<?php echo $addrowven['profile_image']; ?>"></a>

                    <div class="border">

                    <h3 class="monts"><a href="vendor-profile.php?id=<?php echo $addrowven['vendor_id']; ?>"> <?php company_echo($addrowven['c_name'],16); ?> </a></h3>	

                    <div class="now">

<!--                                      <span><a href="chatnow.php?id=<?php echo $addrowven['vendor_id']; ?>" target="_blank">Chat Now</a></span>-->

                    <span><a id="getaID" class="getaID" href="<?php echo $id1=$addrowven['vendor_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>

                    </div>

                 </div>	

                    <!--<p>Multiple Locations</p>-->



                    <form  name="loacalvendor1" method="post">

                        <div class="dislike mt10">

                          <input type="hidden" name="vendor_id" value='<?php echo $addrowven['vendor_id']; ?> '/>

                            <ul>

                              

                                <li> 

                                    <a onclick="doSomething(<?php echo $addrowven['vendor_id']; ?>);"  name="post_id"> <span class="heart" id="likes_new_<?php echo $addrowven['vendor_id']; ?>" ><?php echo $addrowven['v_likes'] ?> </span></a></li>

                                   <li><span><?php custom_echo($addrowven['categoryName'],15); ?></span></li> 

                                   <li><span class="ny"><?php custom_echo($addrowven['cityName'], 2); ?></span></li>

                                

                                <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->

                            </ul>

                        </div>

                    </form>  

                    </div>              

                </div>

            <?php } ?>

            <!--                <div class="more-Cate">

                                <a href="categorydetails.php?cat_id=<?php // echo $categoryid;   ?>">More photographers<span class="glyphicon glyphicon-arrow-right"></span></a></div>-->

            <?php

                    }

            ?> 

        </div>



<?php    }else {?>


<style>i.cat_icon img{margin-top:-9px;}</style>
    <div class="col-lg-12 pd0 bottom-border" id="grid">



                <?php

//             

                    $cat_id = $_POST['hdnid'];

//                    $addvendor = "select v.profile_image,v.fname,v.c_name,v.b_type,v.v_likes,v.c_city,v.vendor_id,ca.categoryId,ca.categoryName,v.isdel

//                                    from  vendor_details v ,category ca

//                                    where v.b_type = ca.categoryId and v.b_type ='" . $cat_id . "' and v.isdel = 1";

              $adcat = "select image_icon,categoryName from  category where isdel='0' and categoryId = '" . $cat_id . "'";        

                $adresul = mysqli_query($mysqli, $adcat) or die(mysqli_error());

             $adrow = mysqli_fetch_row($adresul);

             //print_r($_POST); exit;

                

                      $addvendor="select v.profile_image,v.fname,v.v_likes,v.c_city,c.categoryName,c.image_icon,v.c_regionstate,v.vendor_id,v.b_type,v.c_name,v.isdel,cit.cityName 

                                from vendor_details v , category c,city cit, vendor_filter vf where c.categoryId = v.b_type

                                and v.vendor_id=vf.vendor_id

                                and cit.cityId=v.c_city

                                and vf.filterid=".$id." and v.isdel = 1 and v.status = '1' order by v.vendor_id desc "; 

                    $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());

                   

                    ?>

        

          <h2><i class="cat_icon"><img src="images/<?php echo $adrow[0]?>" > </i><?php echo $adrow[1]; ?></h2> 



                    <?php while ($addrowven = mysqli_fetch_array($addresultven)) { ?>

                           

                        <div class="studio">

							<div class="bor">

                                                       



                            <a href="vendor-profile.php?id=<?php echo $addrowven['vendor_id']; ?>"><img src="images/<?php echo $addrowven['profile_image']; ?>"></a>

                            <div class="border">

                            <h3 class="monts"><a href="vendor-profile.php?id=<?php echo $addrowven['vendor_id']; ?>"> <?php company_echo($addrowven['c_name'],16); ?> </a></h3>		

                              <div class="now">

<!--                                                <span><a href="chatnow.php?id=<?php// echo $addrowven['vendor_id']; ?>">Chat Now</a></span>-->

                                                 <span><a id="getaID" class="getaID" href="<?php echo $id1=$addrowven['vendor_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>

                                            

                                        </div>

                            </div>



                            <form  name="loacalvendor1" method="post">

                                <div class="dislike mt10">

                         <input type="hidden" name="vendor_id" value='<?php echo $addrowven['vendor_id']; ?> '/>

                                    <ul>

                                        <li> 

                                            <a onclick="doSomething(<?php echo $addrowven['vendor_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrowven['vendor_id']; ?>" ><?php echo $addrowven['v_likes'] ?></span></a></li>

                                            <li><span><?php custom_echo($addrowven['categoryName'],15); ?></span></li> 

                                         <li><span class="ny"><?php custom_echo($addrowven['cityName'], 2); ?></span></li>





                                      

                                         <!--<li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->

                                    </ul>

                                </div>

                            </form>  

                            </div>              

                        </div>

                <?php } ?>

                    <!--                <div class="more-Cate">

                                        <a href="categorydetails.php?cat_id=<?php // echo $categoryid;  ?>">More photographers<span class="glyphicon glyphicon-arrow-right"></span></a></div>

                                 

                                     <div class="pull-right"><a href="morecategories.php" class="more-deals">More <?php // echo $addrow['categoryName'] ?></a></div>-->

            

            </div>



    

    

 <?php  

 }



?>

 <!--Model Of Enquriy From -->

    

     <div class="container">

<!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Chat Now</a></span>-->

            <!-- Modal -->

                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <h4 class="modal-title" id="myModalLabel" style="margin-left: 128px;">LIVE CHAT COMING SOON</h4>

                            </div>                   <div class="modal-body">

                                <div class="views">

                                    <form method="post" action="enquiry_localvendor.php" onsubmit="return validatemanageform();">

                                        <input type="hidden" id="aid" name="aid" value="" /> 

                                        <div class="form-group">

                                            <label style="margin-left: 128px;" ><h4></h4></label>

                                            

                                        </div>

                                        <div class="form-group">

                                            <label>Name:</label>

                                            <input type="text" name="name1"  id="name1"placeholder="Name">

                                            <div id="name1_error" style="display:none;margin-left: 127px;"class="error_msg" ><font color="red"> Please Enter Your Name</font></div>

                                            <div id="name1_error1" style="display:none;margin-left: 127px;"class="error_msg" ><font color="red"> Please Enter Your Valid Name</font></div>



                                        </div>

                                        <div class="form-group">

                                            <label>Email:</label> 

                                            <input type="text" name="email" id="txtemail" placeholder="Email">

                                            <div id="txtemail_error" style="display:none;margin-left: 127px;"class="error_msg">Please Enter Email ID</div>

                                            <div id="txtemail_error1" style="display:none;margin-left: 127px;"class="error_msg">Please Enter Your Valid Email ID</div>



                                        </div>

                                        <div class="form-group">

                                             <label>Message:</label> 

                                           <textarea rows="4" cols="40" name="contactNo" id="txtcontact" placeholder="Message"></textarea>

                                           <div id="txtcontact_error" style="display:none;margin-left: 127px;"class="error_msg">Please Enter Message</div>



                                        </div>

                                        <div class="form-group">

                                        <label>&nbsp;</label>

                                        <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Send</button></div>



                                    </form>



                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            

        </div>

     <!--Model Of Enquriy From -->

     <script>

         $(document).ready(function(){

                $('a.getaID').click(function(){

            var status_id = $(this).attr('href');

          $('#aid').val(status_id);

       });

         });

      </script>