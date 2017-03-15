<?php include 'header.php'; ?>
   <div class="clearfix"></div>
    <div class="line"></div>     
<!-- Steps --->
   
   
<div class="steps mt30">
 <div class="container">
 	<ul>
    	<li class="step-one active"><a href="#"><span>1</span>Step 1</a></li>
        <li class="step-one"><a href="#"><span>2</span>Step 2</a></li>
        <li class="step-one"><a href="#"><span>3</span>Step 3</a></li>
        <li class="step-one"><a href="#"><span>4</span>Step 4</a></li>
    </ul>
    
    <div class="col-md-8 register mt30">
    	<h4>Register As a Vendor </h4>
        <p>Sign up for your free profile in just a few simple steps</p>
    	<form class="mt20" name="MyForm" method="post" onsubmit="return validateForm()" class="form-horizontal" action="regins1.php">

            <input placeholder="Enter Email ID (This will be your username)" name="email">
            <br>
           <input id="password" type="password" placeholder="*Password" value="" name="password">
             <br>
            <input id="password" type="password" placeholder="*Confirm Password" value="" name="conpassword">
           <br /> 
           <input id="rememberme" type="checkbox" value="yes" name="rememberme">
            <label for="rememberme">*I Agree All Terms and Conditions</label>
            <br /> 
           <input type="submit" value="Sign Up"  name='submit' class="button">
		</form>
           <br>
        <p>An email will be sent to your email address with a verification link. Click on that link to verify your email address and access your account. You must complete your profile after you login.</p>
    </div>
    <div class="col-md-3 registration-right mt30 pd0">
     <img src="images/registration-rightimg.jpg"> 
     <div class="view">
     	<h3>
        <span>sign up</span><br/>
        & <br/>
        POST DEALS<br/>
        <span>CHAT LIVE</span>
        </h3>
        <!--<div class="off"> <p>25% OFF</p></div>-->
     </div>
    </div>
 </div>
  <div class="line"></div>
<div>

<!-- End Steps --->    
    <script type="text/javascript">

            function validateForm()
            {

               if (document.MyForm.email.value == "")
                {
                    alert("Please Enter Your Email ID!!!");
                    document.MyForm.email.focus();
                    return false;
                }

                if (document.MyForm.password.value == "")
                {
                    alert("Please Enter Your Password!!!");
                    document.MyForm.password.focus();
                    return false;
                }

                if (document.MyForm.conpassword.value == "")
                {
                    alert("Please Enter Your Conform Password!!!");
                    document.MyForm.conpassword.focus();
                    return false;
                }

            }

        </script>
 

 
<?php include 'footer.php'; ?>


  
