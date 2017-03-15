<!doctype html>

<?php
    
    include './config.php';

 if(isset($_POST['submit']))
            {  
                $email = $_POST['txtemail'];
                $qry = "insert into coming_soon(email) values('". $email."')";
                $resultnewsn = mysqli_query($mysqli,$qry) or die("query error");  
            
                }
 

?>


<html><head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Lovestruck Deals</title>

<link type="text/css" href="css/style.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link href="http://fonts.googleapis.com/css?family=Raleway:400,700|Montserrat|Roboto' rel='stylesheet' type='text/css">

<script src="js/jquery.min.js"></script>

</head>



<body>

	 <div class="container-fluid coming">

     <div class="overlay-bg">

     	<div class="container">	

        <div class="col-sm-12 text-uppercase text-center heading">

            <h1>Coming Soon</h1>

            <p>The best wedding deals website that lets couples and vendors chat live</p>

        </div>    

       	<div class="col-sm-8 page-info m0a">

            	<div class="col-sm-6 vendor">

                	<h3>Vendors</h3>

                    <p>Market your business</p>

                    <p>Connect with  brides</p>

                    <p>Free  vendor profile</p>

                </div>

                <div class="col-sm-6 couple">

                	<h3>Couples</h3>

                    <p>No registration</p>

                    <p>No coupons or vouchers</p>

                    <p>100% Free</p>

                </div>

            </div>
            <form name="form" action="" method="post">
         <div class="col-sm-8 subscribe m0a">

         		<h2>Subscribe below to get notified once we launch</h2>

                <div class="col-sm-8">

                	<input type="text" name="txtemail" placeholder="Enter your email" id="txtemail"/>
<!--                         <div id="email_error" style="display:none"class="error_msg" ><font color="red"> Please Enter Valid Email</font></div>
                         <div id="email_error1" style="display:none"class="error_msg" ><font color="red"> Please Enter a valid Email</font></div>-->
                       

                </div>

                <div class="col-sm-4">

                    <button type="submit" name="submit" id="submit" class="text-uppercase">subscribe</button>

                </div>

         </div>   
                </form>

         <div class="con-links">

         	<div class="col-sm-12 text-center">

       	    <img src="images/logo-cm-sn.png" alt=" ">

            </div>

            <div class="col-sm-12 social text-center mt10">

                 <ul>

                             <li><a href="https://www.instagram.com" class="instg" target="_blank">Instagram</a></li>

                            <li><a href="https://www.facebook.com" class="fb" target="_blank">Facebook</a></li>           

                            <li><a href="https://www.twitter.com" class="twt" target="_blank">Twitter</a></li>

                            <li><a href="https://www.pinterest.com" class="pint" target="_blank">pinterest</a></li>

               </ul>

			</div>

         </div>

     </div>

    </div>

    </div>

<script src="js/bootstrap.js"></script>

<!-- End footer --->   

</body>

</html>

