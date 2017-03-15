<?php include 'header.php';

?>
 <!-- <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="dist/css/formValidation.css"/>

    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/formValidation.js"></script>
    <script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>-->
   
<div class="steps mt30">
 <div class="container">
 	<ul>
            <li class="step-one active"><a href="registration1"><span>1</span>Step 1</a></li>
        <li class="step-one"><a href="registration2"><span>2</span>Step 2</a></li>
        <li class="step-one"><a href="registration3"><span>3</span>Step 3</a></li>
        <li class="step-one"><a href="registration4"><span>4</span>Step 4</a></li>
    </ul>
    
    <div class="col-md-8 register mt30">
       
    	<h4>Register As a Vendor </h4>
        <p>Sign up for your free profile in just a few simple steps</p>
        <form id="defaultForm" method="post" class="form-horizontal" action="regins1"  onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
        <div class="form-group">
                    <div class="col-sm-4">
                        <input placeholder="Enter Email ID (This will be your username)" class="form-control" name="email">
                    </div>
        </div>
        
        <div class="form-group">
                    <div class="col-sm-4">
                         <input id="password" class="form-control" type="password" placeholder="*password" value="" name="password">
                         <label><font color="red">eg:abc123(minimum 6 character)</font> </label>
                    </div>
        </div>
      
        <div class="form-group">
                    <div class="col-sm-4">
                         <input id="confirmPassword" class="form-control" type="password" placeholder="*Confirm Password" value="" name="confirmPassword">
                         <label><font color="red">eg:abc123(minimum 6 character)</font> </label>
                    </div>
      </div>
            
      <div class="form-group">
            <div class="col-sm-4 ">
                    <div class="checkbox">
                        <label>
                                   <input type="checkbox" name="checkbox" value="check" id="agree" /> *I Agree All Terms and Conditions
                        </label>
                    </div>
            </div>
       </div>
      
        <div class="form-group">
                <div class="col-sm-6">
                     <input type="submit" value="Sign Up" class="button">
                </div>
        </div>
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
      
<!--<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required'
                    }
                }
            },
            lastName: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
            agree: {
                validators: {
                    notEmpty: {
                        message: 'You must agree with the terms and conditions'
                    }
                }
            }
        }
    });
});
</script>-->
 



<?php include 'footer.php'; ?>