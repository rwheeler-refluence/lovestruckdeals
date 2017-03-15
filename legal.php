<?php
include "header.php";
include "config.php";
?>
<!---- We Are ---> 
<script>
    $('#ff').form({
    url:'form3_proc.php',
    onSubmit:function(){
        return $(this).form('validate');
    },
    success:function(data){
        $.messager.alert('Info', data, 'info');
    }
});
</script>
<!--<div class="wrapper">-->
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
          <li class="active"><a href="#terms-of-use" data-toggle="tab"  class="deals">Terms Of Use</a></li>
         <li><a href="#privacy-policy" data-toggle="tab" class="profile">Privacy Policy</a></li>
           
         </ul>
        
        <div id="myTabContent" class="tab-content description mt40">
   <div class="tab-pane active pd0" id="terms-of-use">
     <div class="description-left">
      <?php
         $add = "select * from staticpages where staticPageTitle = 'User Agreement' and  staticStatus = '1'";
                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                        while ($addrow = mysqli_fetch_array($addresult)) 
                          {
                              $whatwedo = $addrow['staticPageContent'];
                              echo $whatwedo;  
					      }
          ?>
 <!--<p>
We encourage all of our registered users and guest alike to make full use of our wonderful website.  Guests are free to browse the site and view the classified ads.  However, in order to take full advantage of the website and its complete personalized services, you as a user will be required to register with us.  In doing so, we will require you to provide us with information such as your Company Name (Vendors), Personal name, Mailing Address, Emailing address, Telephone and Fax numbers, Event date, Service you provide (Vendors), Services you are interested in, etc.</p>
 <p>
We also provide many interactive platforms such as our Blogs, Forums, and How to video tutorials.  Be aware that any information you submit to us voluntarily or post to any of our forums becomes public.  This information can then be used by us for on and offline promotions and commercial uses.  If you decide to use our website and make public postings, you are fully aware that any personally identifiable information can be read, collected, stored or used by other users.  This can also result in users unsolicited messages.  We are not responsible for any such information you choose to submit.</p>  
 
<p>In this fast paced and always connected society we live in, we like to give all of our users that quick option to link to social media sites as well as send messages and emails to their friends.  Depending on the method used, we may ask for your email as well as the recipients email.  We store this information and only send a one time e-mail invite for the recipient to read the article.  We may save this information for database purposes and to track the success of such options and links.  We do not under any circumstances share this information with any third party. </p>
 
<p>Stored information and Cookies
A cookie, which is also known as an HTTP cookie, web cookie, or browser cookie, is used for an origin website to send state information to a user's browser and for the browser to return the state information to the origin site. The state information can be used for authentication, identification of a user session, user's preferences, shopping cart contents, or anything else that can be accomplished through storing text data on the user's computer.
</p> 
<p>Cookies cannot be programmed, cannot carry viruses, and cannot install malware on the host computer.</p>
 
<p>To track and improve our content, we receive and store certain types of information.   Like many websites we use Cookies to identify you as a member of our site. Cookies are used for various reasons, none of which is to improperly retrieve information about your computer, its contents or personal information.  However, cookies may be collected when you link to our affiliates’ websites or when you view or link to advertisements.  These companies may in turn also retrieve cookies.  We have no control over how they may choose to use this information.  A cookie by itself cannot tell us who you are, or any personal information about you.  You provide this information when you register with Xaaza.  Only Xaaza has access to that information.  If you choose reject all cookies, please understand that you may be limited to some functions and areas of our site. </p>
 
<p>The information we collect from our users is more to help us improve our content and develop new and useful options that our members request.  We do not use this information to store and submit to third party companies.</p>
 
<p>Your privacy is very important to us, but due to the existing legal regulatory and security environment, we cannot guarantee that your private information and communications will not become accessible to third party companies through no fault of our own. Due to the nature of the World Wide Web, third party users may unlawfully intercept or access communications or transmissions.  In addition, we may disclose any information resulting from a request by law enforcement or other authorized government agencies.  This request may be by court order, legal process served on our website, or good faith belief that such information is necessary to comply with current judicial proceedings.</p>
 
<p>We use industry standard safeguards to help protect your private and confidential information. Such safeguards include firewalls and Secure Socket Layers (SSL) where appropriate. We also do our best to protect user-information that we may have stored off-line. All of our users' information, not just the confidential information, is restricted to our offices.</p>
 
<p>Privacy Policy Changes
Our Privacy policy is subject to change from time to time.  Please check our privacy policy link on the website to keep up to date with any revisions or changes..
        
        </p>-->
    </div>
    
    <div class="description-right">
        <img src="images/about_us_right.jpg"> 
        </div>
        <div class="clearfix"></div>
        
      
  </div>
  
  
       
  <div class="tab-pane" id="privacy-policy">
  <div class="contact-left">
  <?php
         $add = "select * from staticpages where staticPageTitle = 'Privacy Policy' and  staticStatus = '1'";
                    $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                        while ($addrow = mysqli_fetch_array($addresult)) 
                          {
                              $whatwedo = $addrow['staticPageContent'];
                              echo $whatwedo;  
					      }
          ?>
   		
    </div>
   <div class="contact-right">
      <h4>Reach Us</h4>
      
      <div>
     	<i class="iconss phone-icon pull-left">  </i>
       <span><a href="mailto:info@lovestruckdeals.com">info@lovestruckdeals.com</a></span>
       
       
    </div>
     <div class="mt15">
     	<i class="iconss phones1 pull-left">  </i>
       <span> 516-444-7742</span>
    </div>
  </div>
  </div> 
  
  
  
 

</div><!-- /tab-content -->
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
    	<div class="col-lg-6 col-sm-6 about-desc pd0">
      <div class="col-sm-4"><img src="images/desc-1.png"></div> 
       <div class="col-sm-8 pd0">  
        <p><span class="uppercase">FIND BEST DEALS</span>
       Who says that a beautiful wedding needs to be expensive? Browse through deals posted by the industries top wedding vendors and save thousands on your wedding!  </p>
        <a href="wedding-deals.php" class="read-more">Find deals</a>
      </div>
      </div>
      
      	<div class="col-lg-6  col-sm-6 about-desc pd0">
      <div class="col-sm-4 floatleftimg"><img src="images/desc-2.jpg"></div> 
      <div class="col-sm-8 pd0">  
            <p><span class="uppercase">FIND YOUR VENDORS</span>
           Search our wedding vendor directory for the perfect vendors. Once you find them, you can chat with them instantly for free! 
              </p><br/>
            <a href="local-vendors.php" class="read-more">Find vendors</a>
        </div>
      </div>
    </div>
     <div class="row mt20">  
        <div class="col-lg-6 col-sm-6 about-desc pd0 mt30">
      <div class="col-sm-4 floatleftimg"><img src="images/desc-3.png"></div> 
      <div class="col-sm-8 pd0"> 
<p><span class="uppercase">VENDOR SIGN-UP</span>
Ready to chat with brides and offer them your best deal? Create a free profile, upload your images and a video and start booking more weddings today!</p><br/>
<?php  if (!isset($_SESSION['fname'])) 
               {
                   ?>		
               <a href="registration.php" class="read-more">Sign up</a><?php } ?>
        </div>
      </div>
        
        <div class="col-lg-6 col-sm-6 about-desc pd0 mt30">
      <div class="col-sm-4 floatleftimg"><img src="images/desc-4.png"></div>  
      <div class="col-sm-8 pd0">
<p><span class="uppercase">CHAT LIVE</span>
 Lovestruck deals is the only wedding website that connects couples and vendors via live chat. We make it easier for couples to book their vendors and for vendors to share their businesses online!</p>
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
       <!-- <h3>LOVESTRUCK DEALS STYLE</h3>
Booked your deals and your vendors? Now itâ€™s time for the fun to start! Head over to our blog  LOVESTRUCK DEALS STYLE, where you can find real weddings, styled shoots and just the loveliest wedding inspiration!<br/><br/>

<a class="read-more">Read More</a>-->
</div>
    </div>
</div>
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
<!----End Blog---> 


<!---- Retweet-deals ---> 
  <?php
  include "footer.php";
  ?>
  
<!--  </div>-->