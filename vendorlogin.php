
 <?php         
        $message1=$_GET['msg'];
    ?>    
    <style>
    
 .modal-content1
    {
		 background-color: #eceef1;
		border-radius: 7px;
		margin:177px auto 10px;
		overflow: hidden;
		padding: 10px 20px 20px;
		position: relative;
		width: 400px;
	}
    
  .modal-content1 .modal-header > img
  	{
		width:auto;
		margin:0 auto;
	}
 .modal-content1 .modal-header button.close1
 {
	 width:15%;
	 float:right;
	margin-right: -30px;
	font-size:20px;
	font-size: 31px;
    font-weight: 600;
	    outline: none;
}
	.modal-body1
		{
			padding:8px 0;
			position:relative;	
		}
	.modal-body1 input.form-control
		
		{
			height:44px;
			background-color: #dde3ec;
			/*border: 1px solid #dde3ec;*/
			border:0;
			color: #8290a3;
			height: 43px;
		}
	.modal-footer1
		{
			border-top:0;
		}
	.modal-content1 .modal-footer button.btn-default
		{
			 background-color: #45b6af;
    		border-color: #3ea49d;
   			 color: #fff;
		}
	.modal-content1 .modal-footer
		{
			padding:10px 0;
		}
	
	.modal-content1 span.error_msg span
		{
			font-size:13px;
			padding:10px !important;
			display:inline-block;
		}
                h1.brd {
                         margin: 30px 0;
                         font-size: 26px;
}
                input#email1 {
                        margin-bottom: 10px;
                    }
		
    </style>
    
    
 <!---- Retweet-deals ---> 
        <div class="Retweet-deals">
            <div class="container-fluid pd0">
                <div class="col-lg-12">
                    <div class="col-lg-5 col-sm-5 col-sm-offset-1 col-xs-6 bl pdr">
                        <h4 class="mt10">New vendor?</h4> <!--<strong>New vendor? </strong>-->
                        <a href="registration" class="bton blu-btn">Register Here</a>
                    </div>
                    <div class="col-sm-6 pdzero1 col-xs-6">
                        <h4 class="mt10 mar-left">Already a <!--LOVESTRUCK DEALS -->vendor?</h4>  <a href="" class="bton blu-btn" data-toggle="modal" data-target="#myModal3">Log In Here</a>
                    </div>
                </div>
                <div class="col-sm-12 mt50 pd0 about-deals">
                	<div class="container pt30 pb30">
                    	<div class="col-sm-12">
                            <h3>Why Lovestruck Deals?</h3>
                            <p>Lovestruck Deals a wedding website where you can find amazing wedding deals and wedding discounts offered by the industry's top wedding vendors. We make the wedding planning process easier by connecting couples with their favorite vendors. Brides are looking to plan a wedding on a budget and still get great vendors, and wedding professionals are always looking to book more events- it's a win win for everyone.</p>
                            <p>Lovestruck Deals is different than other wedding websites because it's super easy to use and makes it simple for both vendors to post their wedding deals and for couples to find and book them. Not only is Lovestruck Deals the biggest wedding website for wedding discounts and deals, but we also streamlined the communication between vendors and brides by implementing a live chat. With just one simple click, brides can chat live with vendors and find more about their wedding deals in just a few seconds.</p>
                        </div>
                        <div class="col-sm-12 our-best">
                            <h1 class="brd"><span>We invite you to browse our site and find the best wedding packages</span></h1>
                            <ul class="list-inline">
                            	<li><span>Inexpensive wedding venues</span></li>   
                                <li><span>Wedding photography deals</span></li>      
                                <li><span>Wedding Venue Deals</span></li>   
				<li><span>Wedding Dj Deals</span></li>       
                                <li><span>Wedding Floral Deals</span></li>        
                                <li><span>Wedding Dress Deals</span></li>   
				<li><span>Party Rental Deals</span></li>     
                                <li><span>Wedding Make Up Deals</span></li>   
                                <li><span>Wedding Planner Deals</span></li>  
                                <li><span> Wedding Limo Deals</span></li>  
                            </ul>
                            <p class="mt20"><b> and many more!</b></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mt30"><img src="images/line_163.png"></div>
        
                <div class="col-lg-12">
                    <h3>FOLLOW US FOR EXCLUSIVE WEDDING DEALS </h3>
                    <p>We share exclusive deals and beautiful real weddings!</p>
                </div>
                
                <div class="col-lg-12 fotr-social">
                    <ul>
                        <li><a class="ft-instg" target="_blank" href="<?php echo $rowsocial1['instragram']; ?>">Instagram</a></li>
                        <li><a class="ft-fb" target="_blank" href="<?php echo $rowsocial1['facebook']; ?>">Facebook</a></li> 
                        <li><a class="ft-twt" target="_blank" href="<?php echo $rowsocial1['twitter']; ?>">Twitter</a></li>
                        <li><a class="ft-pinte" target="_blank" href="<?php echo $rowsocial1['pinterest']; ?>">pinterest</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog">            
            <div class="modal-content1">
                
            <form class="login-form" name="form" onSubmit="return login()" action="vendor_admin/loginins" method="post">
                <div class="modal-header1">
                    <button type="button" class="close close_btn close1" data-dismiss="modal">&times;</button>
                    <img src="<?php echo ROOT_PATH; ?>images/xaaza_logo.png" alt=" ">
                    
                </div>
                                
                <h4 class="modal-title" style="color:black;" >Vendor Login</h4> 
                <div class="col-lg-12 pd0" id="message1" ><span class="alert-danger error_msg"><?php echo $message1;?></span></div> 
                
                <div class="modal-body1">                   
                    <input class="form-control form-control-solid placeholder-no-fix" type="text"  placeholder="Email Id " name="email" id="email1" autocomplete="off" st/>
                    
                </div>
                
                <div class="modal-body1">                   
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" name="password" id="password1" placeholder="Password" autocomplete="off"/>
                    
                </div>
                
                <div class="modal-footer modal-footer1">
                    <button type="submit" name="submit" class="btn btn-default">Login</button>
                </div>
                
            </form>
                
            </div>
      
    </div>
  </div>  

  <!--End Modal content-->

    <script type="text/javascript">	
                function login() {                    
                    var email1=$('#email1').val();
                    var password1=$('#password1').val();
                    
                if(email1=="" && password1=="")
                {
                    $("#message1").show();
                    $('.alert-danger').html("<span>Please enter UserName and Password</span>");
                     return false;
                }
                if(email1=="")
                {
                    $("#message1").show();
                    $('.alert-danger').html("<span>Please enter UserName</span>");
                     return false;
                }
                if(password1=="")
                {
                    $("#message1").show();
                    $('.alert-danger').html('<span id="error">Please enter Password</span>');
                     return false;
                }

                };
            </script>
