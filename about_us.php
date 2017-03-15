<?php
    include './header.php';
    include './config.php';
    include './validationuser.php';
?>
<!---- We Are ---> 
<div class="about">
    <div class="who-we-are mt40">
        <div class="container">
            <h3>WHAT WE DO</h3>
            <p>Connecting couples with great vendors</p>
        </div>
    </div>
</div>
<!---- End We Are --->
<!---- Free Vendor --->
<div class="vendor-feature mt40">
    <div class="container">
        <div class="row">
            <div class="tabs-left">
                <ul class="we-do-tab">
                    <li class="active"><a href="#what-we-do" data-toggle="tab"  class="deals">What We Do</a></li>
                    <li><a href="#FAQ" data-toggle="tab" class="profile">FAQ</a></li>
                    <li><a href="#contact-us" data-toggle="tab" class="profile">Contact us</a></li>
                    <li><a href="#careers" data-toggle="tab"  class="chats">Careers</a></li>
                </ul>
                <div id="myTabContent" class="tab-content description mt40">
                    <div class="tab-pane active pd0" id="what-we-do">
                        <div class="description-left">
                            <p>
                                <?php
                                    $add = "select * from staticpages where staticPageTitle = 'What We Do' and  staticStatus = '1'";
                                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                                    while ($addrow = mysqli_fetch_array($addresult)) 
                                    {
                                        $whatwedo = $addrow['staticPageContent'];
                                        echo $whatwedo;
                                }
                                ?>
                            </p>
                        </div>

                        <div class="description-right">
                            <img src="images/about_us_right.jpg"> 
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane" id="FAQ">
                        <div class="description-left">
                            <div class="col-md-12 pd0">
                                <div class="panel with-menu-tabs panel-primary press-tabs">
                                    <div class="panel-heading">
                                        <ul class="nav press-tabs">
                                            <li class="active"><a href="#tab1primary" data-toggle="tab">Couples</a></li>
                                            <li><a href="#tab2primary" data-toggle="tab">Vendors</a></li>

                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1primary">
                                                <div class="">

                                                    <?php
                                                    $add = "select * from staticpages where staticPageTitle = 'FAQ-Couples' and  staticStatus = '1'";
                                                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                                                    while ($addrow = mysqli_fetch_array($addresult)) 
                                                    {
                                                        $whatwedo = $addrow['staticPageContent'];
                                                        echo $whatwedo;
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tab2primary">
                                                <div class="">
                                                    <?php
                                                    $add = "select * from staticpages where staticPageTitle = 'FAQ-Vendors' and  staticStatus = '1'";
                                                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                                                    while ($addrow = mysqli_fetch_array($addresult)) 
                                                    {
                                                        $whatwedo = $addrow['staticPageContent'];
                                                        echo $whatwedo;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="description-right">
                            <img src="images/about_us_right.jpg"> 
                        </div>
                    </div>
					<div class="tab-pane" id="contact-us">
                        <div class="contact-left">
                            <div class="regdetails">
                                <h4>Your Information</h4>
                                <form  name="ff" method="post" action="insert-contactus" onsubmit="return validateContact()" class="mt20">
                                    <div class="row">        
                                        <div class="col-sm-6">
                                            <input type="text" class="olytext easyui-validatebox"  placeholder="*Name" id="name" name="name">
                                            <div id="contactname_error" style="display:none"class="error_msg" ><font color="red"> Please Enter your name</font></div>
                                            <div id="contactname_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid name</font></div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <input type="text" class="easyui-validatebox"  placeholder="*Email" id="txtemail" name="email">
                                            <div id="txtemail_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Your Email ID</font></div>
                                            <div id="txtemail_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Your Email ID</font></div>
                                        </div>
                                    </div>
                                    <div class="row">                                        
                                        <div class="col-sm-12">
                                            <textarea cols="50" rows="2" class="easyui-validatebox"  placeholder="Message limit 500 character " id="message" name="message" maxlength="500"></textarea>
                                            <div id="textdesc_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Message</font></div>
                                            <div id="textdesc_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter Message limit 500 character </font></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 pd0"> 
                                        <input type="submit" name="submit" value="Submit" class="button">
                                    
                                    <!--class="button row"-->
                                    </div>
                                </form>
                            
                        </div>
                        
                    </div> 
                        <div class="contact-right">
                            <h4>Reach Us</h4>

                            <div>
                                <i class="iconss phone-icon pull-left">  </i>
                               <span><a href="mailto:info@lovestruckdeals.com">info@lovestruckdeals.com</a></span>
                            </div>
                           <!-- <div class="mt15">
                                <i class="iconss phones1 pull-left">  </i>
                                <span> 516-444-7742</span>
                            </div>-->
                        </div>
                    



                </div>
                	<div class="tab-pane" id="careers">
                        <?php
                        $add = "select * from staticpages where staticPageTitle = 'careers' and  staticStatus = '1'";
                        $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                        while ($addrow = mysqli_fetch_array($addresult)) {
                            $whatwedo = $addrow['staticPageContent'];
                            echo $whatwedo;
                        }
                        ?>
                    </div>
                    <!-- /tab-content -->
            </div>
        </div>


    </div>
</div>
<!---- Free Vendor --->
<div class="clearfix"></div>
<!---- Description--->
<div class="about-search mt40">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12 about-desc pd0">
                <div class="col-sm-4 wdp col-xs-4"><img src="images/desc-1.png"></div> 
                <div class="col-sm-8 wdp col-xs-8 pd0">  
                    <p><span class="uppercase"> FIND BEST DEALS</span>
                        Who says that a beautiful wedding needs to be expensive? Browse through deals posted by the industry's top wedding vendors and save thousands on your wedding!  </p>
                    <a href="wedding_deals.php" class="read-more mrgn">Find deals</a>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12 about-desc pd0">
                <div class="col-sm-4 wdp col-xs-4 floatleftimg"><img src="images/desc-2.png"></div> 
                <div class="col-sm-8 wdp col-xs-8 pd0">  
                    <p><span class="uppercase">FIND YOUR VENDORS</span>
                        Search our wedding vendor directory for the perfect vendors. Once you find them, you can chat with them instantly for free! 
                    </p>
                    <a href="local-vendors.php" class="read-more mt30">Find vendors</a>
                </div>
            </div>
        </div>
        <div class="row mt20">  
            <div class="col-sm-6 col-xs-12 about-desc pd0 mt30">
                <div class="col-sm-4 wdp col-xs-4 floatleftimg"><img src="images/desc-3.png"></div> 
                <div class="col-sm-8 wdp col-xs-8 pd0"> 
                    <p><span class="uppercase">VENDOR SIGN-UP</span>
                      
                        Ready to chat with brides and offer them your best deal? Create a free profile, upload your images and a video and start booking more weddings today!</p>
                     <?php  if (!isset($_SESSION['fname'])) 
               {
                   ?> <a href="registration.php" class="read-more mt30">Sign Up</a><?php } ?>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12 about-desc pd0 mt30">
                <div class="col-sm-4 wdp col-xs-4 floatleftimg"><img src="images/desc-4.png"></div>  
                <div class="col-sm-8 wdp col-xs-8 pd0">
                    <p><span class="uppercase">CHAT LIVE</span>
                        LOVESTRUCK DEALS  is the only wedding website that connects couples and vendors via live chat. We make it easier for couples to book their vendors and for vendors to share their businesses online!</p>
                    <a class="read-more mrgn" role="button" data-toggle="modal" data-target="#myModalAboutus" >Chat now</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!----End Description---> 
<div class="clearfix"> </div>
<!----Blog---> 
<div class="our-blog mt50">
    <div class="container blog pd0 abt-xza">
        <div class="main ">
            <h3>top  wedding deals & live chat</h3>
            
            <!--<a class="read-more">Read More</a>-->
        </div>
    </div>
</div>
<!----End Blog---> 

<div class="container">
<!--            </span><a  class="join button" data-toggle="modal" role="button" data-target="#myModal1" >Chat Now</a></span>-->
            <!-- Modal -->
                <div class="modal fade" id="myModalAboutus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                <!--<div class="views">-->

                                        <div class="form-group">
                                            <label style="display:block; margin:10px 0"><h3 class="modal-title" id="myModalLabel" style="color:#19b5bc;">Live chat coming soon!</h3></label> 
                                            

                                        </div>
                                <!--</div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            
        </div>



<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
 <?php include './vendorlogin.php';?>
    <!---- Retweet-deals ---> 




<div class="Retweet container">
    <span><strong>Photo credits:</strong> 
       <a href="http://fabricetranzer.com" target="_blank">Fabrice Tranzer Photography </a>
      <!-- <a href="http://www.studiomerimaphotography.com">Studio Merima, </a>
       <a href="Lin & Jirsa Photography">Lin & Jirsa Photography, </a>
       <a href="http://www.nataliefranke.com">Natalie Franke Photography</a>-->
    </span>

</div>

<!----End Retweet-deals ---> 
<?php
    include "footer.php";
?>