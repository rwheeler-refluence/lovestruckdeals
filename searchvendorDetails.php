<?php
include "config.php";
 include './validation_enquiryform.php'; 
 include './urlseo.php';
// print_r("fdsf ".$_POST['stateID']." lll");
$catid = $_POST['cat'];
$cati = $_POST['cat'];
$vid = $_POST['vendor_id'];
$address = $_POST['txtAddress'];


$state = $_POST['stateID'];
$city = $_POST['cityID'];
 
$qry = $mysqli->query("SELECT sid FROM state WHERE sname = '$state'");
$row = $qry->fetch_row();$sid=$row[0];
//$row = $qry->fetch_array();$sid=$row[0];
$qry1 = $mysqli->query("SELECT cityId FROM city WHERE cityName = '$city'");
$row = $qry1->fetch_row();$cid=$row[0];

$condition = "";

if($sid != NULL && $cid == NULL && $catid == NULL) {
    $condition.=" And c_regionstate='" . $sid . "'";
    
}else if($sid != NULL && $cid != NULL && $catid == NULL) {
    $condition.=" And c_regionstate='" . $sid . "' And c_city='" . $cid . "'";
    
}else if($sid !=NULL  && $cid != NULL && $catid != NULL) {
    $condition.=" And c_regionstate='" . $sid . "' And c_city='" . $cid . "' And b_type='" . $catid . "'";
}else if($sid == NULL && $cid == NULL && $catid != NULL) {
  $condition.=" And b_type='" . $catid . "'";
}else if($sid != NULL && $cid == NULL && $catid != NULL) {
    
  $condition.=" And c_regionstate='" . $sid . "' And  b_type='" . $catid . "'";
  
}



$condition1 = "";
if ($cati != Null) {
    $condition1.=" And categoryId='" . $cati . "'";
} else {
    $condition1.=" And categoryId<>0";
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
            echo $y." ...";
        }
    }
function custom_echo($x, $length) 
    {
        if (strlen($x) <= $length) 
        {
            echo $x;
        } 
        else 
        {
            $y = substr($x, 0, $length) . '';
            echo $y;
        }
    }
?>
<style>i.cat_icon img{margin-top:-9px;}</style>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.owlcarousel.owlgraphic.com/assets/owlcarousel/assets/owl.theme.default.min.css">
<script src="js/owl.carousel.js"></script>
<!--<script src="http://www.owlcarousel.owlgraphic.com/assets/vendors/jquery.min.js"></script>
<script src="http://www.owlcarousel.owlgraphic.com/assets/owlcarousel/owl.carousel.js"></script>-->
<div class="col-lg-12 pd0 bottom-border" id="grid">

    <?php
    $addcat = "SELECT * FROM category WHERE isdel = 0 " . $condition1 . "";
    $addresult = mysqli_query($mysqli, $addcat) or die(mysqli_error());
    while ($addrow = mysqli_fetch_array($addresult)) {

      $addvendor="select v.profile_image,v.c_name,v.b_type,v.v_likes,v.isdel,v.c_city,v.status,v.vendor_id,c.cityName from vendor_details v,city c where v.b_type = '".$addrow['categoryId']."' ".$condition." and c.cityId = v.c_city and v.status = '1' and v.isdel = 1 order by v.vendor_id desc limit 5";
       $addresultven = mysqli_query($mysqli, $addvendor) or die(mysqli_error());
        ?>
        <div class="vendor-list">

          <h2><i class="phone-icon cat_icon pull-left graphers"><img src="images/<?php echo $addrow['image_icon']?>" ></i><?php echo $addrow['categoryName'];?></h2>  
            <div class="col-md-12 fln owl-carousel_new pd0" id="owlCarouselWithArrows">
                <?php while ($addrowven = mysqli_fetch_array($addresultven)) { 
                    $title = $addrowven['c_name'];
                     $string = slug ($title);
                      $tu_id= $addrowven['vendor_id'];?>
                   
                     
                    <div class="studio studio1 item">
						<div class="bor">
                                                 <a href="  <?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id.'/'.$string; ?> "><img src="images/<?php echo $addrowven['profile_image']; ?>"></a>
                  
                      <?php/*  <a href="vendor-profile.php?id=<?php echo $addrowven['vendor_id']; ?>"><img src="images/<?php echo $addrowven['profile_image']; ?>"></a> */?>
                        <div class="border">
                                                  

                        <h3 class="monts"><a href="  <?php echo ROOT_PATH; ?>vendor-profile/<?php echo $tu_id.'/'.$string; ?> "> <?php company_echo($addrowven['c_name'],17); ?></a></h3>		
                       <div class="now">
<!--                                            <span><a href="chatnow.php?id=<?php// echo $addrowven['vendor_id']; ?>" target="_blank">Message</a></span>-->
                                             <span><a id="getaID" class="getaID" href="<?php echo $id1=$addrowven['vendor_id']; ?>" data-toggle="modal" role="button" data-target="#myModal1">Message</a></span>
                                    </div>
                        </div>
                        
					
                        <form  name="loacalvendor1" method="post">
                            <div class="dislike mt10">
                         <input type="hidden" name="vendor_id" value='<?php echo $addrowven['vendor_id']; ?> '/>
                                <ul>
                                    <li><a onclick="doSomething(<?php echo $addrowven['vendor_id']; ?>);"  name="post_id"><span class="heart" id="likes_new_<?php echo $addrowven['vendor_id']; ?>" ><?php echo $addrowven['v_likes'] ?></span></a></li>
                                        <li><span><?php custom_echo($addrow['categoryName'],15); ?></span></li>   
                                      <li><span class="ny"><?php custom_echo($addrowven['cityName'], 2); ?></span></li>                

                                    
                                    <!-- <li><a href="#" class="zero"><i class="iconss phone-icon pull-left zro"></i>0</a></li>-->
                                </ul>
                            </div>
                        </form>   
                        </div>             
                    </div>
				
                <?php } ?>
            </div> 
            
            
            <div class="more_vendor_link text-center">
            <div class="arrow">
                <div class="owl-carousel-arrows">
                    <a class="prev" href="#"><i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
          <div class="more_vendor">
 <span class="more_vendor_bg"><a href="morecategories.php?cat_id=<?php echo $addrow['categoryId']; ?>" class="more-deals">MORE <?php echo $addrow['categoryName'] ?></a></span>
          </div>
            <div class="arrow">
                <div class="owl-carousel-arrows">
                    <a class="next" href="#"><i class="fa fa-chevron-right"></i></a><!--btn btn-primary-->
                </div>
            </div>
            
            </div>
        </div>
       
        <?php
    }
    ?> 
</div>   
 <div class="container"> 
  <!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Message</a></span>--> 
  <!-- Modal -->
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact this vendor</h4>
        </div>
        <div class="modal-body">
          <div class="views">
            <form method="post" action="<?php echo ROOT_PATH; ?>enquiry_localvendor" onsubmit="return validatemanageform();">
              <input type="hidden" id="aid" name="aid" value="" />
		  <input type="hidden" id="pageNo" name="pageNo" value="2" />
              <div class="form-group mt0">
               <label class="mt0"><h4 class="mt0"></h4></label>
              </div>
              <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name1"  id="name1"placeholder="Name">
                <div id="name1_error" style="display:none;margin-left: 127px;" class="error_msg" ><font color="red"> Please Enter Your Name</font></div>
                <div id="name1_error1"  style="display:none;margin-left: 127px;" class="error_msg" ><font color="red"> Please Enter Your Valid Name</font></div>
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" id="txtemail" placeholder="Email">
                <div id="txtemail_error"  style="display:none;margin-left: 127px;" class="error_msg">Please Enter Email ID</div>
                <div id="txtemail_error1" style="display:none;margin-left: 127px;" class="error_msg">Please Enter Your Valid Email ID</div>
              </div>
              <div class="form-group">
                    <label>Message:</label> 
                    <textarea rows="4" cols="40" name="contactNo" id="txtcontact" placeholder="Message"></textarea>
                     <div id="txtcontact_error" style="display:none;margin-left: 127px;"class="error_msg">Please Enter Message</div>
              </div>
              <div class="form-group">
                <label>&nbsp;</label>
                <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Send</button>
              </div>
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

<script>
$('.owl-carousel_new').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
$(document).ready(function() {

    var owl = $("#owlCarouselWithArrows");

    owl.owlCarousel({
        items: 3
    });

    // Custom Navigation Events
    $(".owl-carousel-arrows .next").click(function() {
        owl.trigger('owl.next');
    });
	
    $(".owl-carousel-arrows .prev").click(function() {
        owl.trigger('owl.prev');
    });

});
</script>
