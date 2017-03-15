<?php
@session_start();
include './config.php';
$sqlsocial = "select * from admin ";
$sqlsocialresult = mysqli_query($mysqli, $sqlsocial);
$rowsocial1 = mysqli_fetch_array($sqlsocialresult);
$message = $_GET['msg'];
?>
<!doctype html>
<html lang="en-US"><head>
        <meta charset="utf-8">
        <?php

$host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/1/photography') 
{
?>
<title>Wedding Photography – Lovestruckdeals</title>
<meta name="description" content="Selective collection of Wedding Photography deals at lovestruckdeals with affordable wedding discounts & coupons. Capture the perfect moment for making your wedding specials."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/2/catering') 
{
?>
<title>Wedding Catering- Lovestruckdeals</title>
<meta name="description" content="Get all types of delicious food for your wedding event at lovestruckdeals that suits with your wedding budget. Best catering services provided by our experts."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/3/wedding-cake') 
{
?>
<title>Wedding Cake- Lovestruckdeals</title>
<meta name="description" content="Unique Design & delightful flavors wedding cakes with suitable wedding budget available at lovestruckdeals. Pick out the best wedding cake deals for wedding events."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/4/videography') 
{
?>
<title>Wedding Videography – Lovestruckdeals</title>
<meta name="description" content="Connect with the high-quality local vendors from lovestruckdeals and book the great deals of wedding videography to create a memorable video of your special event."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/5/jewelry') 
{
?>
<title>Wedding Jewelry- Lovestruckdeals</title>
<meta name="description" content="Best offers on wedding jewelry at lovestruckdeals. Shop for designer collection of Engagement rings & Bridal jewelry of your choice with suitable prices."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/6/dj') 
{
?>
<title>Wedding DJ  – Lovestruckdeals</title>
<meta name="description" content="Book a professional Wedding DJ to have fun & enjoyable moment for perfect wedding events & receptions.  Wedding DJ deals in USA at lovestruckdeals."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/7/fashion') 
{
?>
<title>Wedding Fashion- Lovestruckdeals</title>
<meta name="description" content="Browse for the latest wedding fashion deals with minimum wedding budget and look stylish & beautiful by wearing designer wedding outfit."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/8/travel') 
{
?>
<title>Wedding Travel - Lovestruckdeals</title>
<meta name="description" content="Make Your Dream Honeymoon comes true with booking at our wedding travel agency lovestruckdeals. Contact Now to get in touch with our travel vendors. "/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/9/transportation') 
{
?>
<title>Wedding Transportation- Lovestruckdeals</title>
<meta name="description" content="Getting mess on Your wedding day due to Transportation problem? Not to worry! Lovestruckdeals is the best platform available to deal with Wedding Transportation issues."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/10/bridal-beauty') 
{
?>
<title>Wedding Make-up – Lovestruckdeals</title>
<meta name="description" content="Look beautiful on your wedding by doing wedding make-up from our wedding experts available at lovestruckdeals. Low budget Wedding make up deals at our website."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/57/event-planner') 
{
?>
<title>Event Planner – Lovestruckdeals</title>
<meta name="description" content="Looking to plan for special events?? Then, lovestruckdeals provide you with best event planning services to make perfect wedding day."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/58/stationery') 
{
?>
<title>Stationery – Lovestruckdeals</title>
<meta name="description" content="Select elegant stationery for your wedding from designing, printing to invitations cards & many mores at lovestruckdeals."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/59/event-rentals') 
{
?>
<title>Event Rentals- Lovestruckdeals</title>
<meta name="description" content="Get event rental deals & party rental discounts only at lovestruckdeals.com. Contact Now to get a number of exciting wedding deals at our website"/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/60/favors') 
{
?>
<title>Favors- Lovestruckdeals</title>
<meta name="description" content="Online Shop for providing best wedding favors idea & making loving temporary tattoos to create unforgettable memories for your special day. "/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/61/decorations') 
{
?>
<title>Wedding Decor- Lovestruckdeals</title>
<meta name="description" content="Lovestruckdeals is the only website which provide exciting wedding design to fabulous corporate events, all the way to styled fashion shoots with affordable budget."/> 
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/62/photo-booth') 
{
?>
<title>Wedding Photo-Booth- Lovestruckdeals</title>
<meta name="description" content=""/> 
<?php
}
if($host == 'www.lovestruckdeals.com/wedding-discounts/477/design-house-decor') 
{
?>
<title>Wedding Discounts | Lovestruck Deals</title>
<meta name="description" content="Find exclusive wedding discounts on wedding venues, photography, wedding planning, event rentals, invitations, flowers and more on the biggest wedding deals website. "/> 
<?php
}if($host == 'www.lovestruckdeals.com/weddingdeals'){
?>
<title>WEDDING DEALS | Lovestruck Deals</title>
<meta name="description" content="Find best wedding deals and affordable wedding packages. Save on your wedding venue, photography, rentals, flowers and more!"/>
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/weddingdeals/65/venues') 
{
?>
<title>Wedding Venues | Lovestruck Deals</title>
<meta name="description" content="Search for wedding venues of your choice with perfect wedding locations at Lovestruck Deals.Book Now to get best wedding discounts & offers from topmost vendors."/> 
<?php
}if($host == 'www.lovestruckdeals.com/weddingdeals'){
?>
<?php
}
if($host == 'www.lovestruckdeals.com/weddingpackages') 
{
?>
<title>Wedding Packages | Lovestruck Deals</title>
<meta name="description" content="Find affordable wedding packages and exclusive wedding deals by the industry's top wedding vendors. Save money on your wedding venue, photography, rentals, flowers and more."/>
<?php 

}
if($host == 'www.lovestruckdeals.com/local-vendors') 
{
?>
<title>Wedding Specials | Local Vendors-  Lovestruck Deals</title>
<meta name="description" content="Get best wedding discounts from the local vendors to fit any budget wedding . Browse for best wedding venues, wedding photography & book wedding deals to make wedding specials."/>
<?php 

}
$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'weddingdeals?') !== false) {
?>
<title>WEDDING DEALS | Lovestruck Deals</title>
<?php
if($url == 'https://www.lovestruckdeals.com/weddingdeals?cat_id=57'){
?>
<meta name="robots" content="noindex, nofollow">
<?php 
}else{
?>
<meta name="robots" content="noindex, nofollow">
<?php
}
?>
<meta name="description" content="Find best wedding deals and affordable wedding packages. Save on your wedding venue, photography, rentals, flowers and more!"/>    
<?php
}
?>
<?php
if($host == 'www.lovestruckdeals.com/') 
{
?>
<title>Wedding Deals in USA | Affordable Wedding Coupons- Lovestruck Deals</title>
<meta name="description" content="Make Your Wedding Specials with affordable wedding packages at lovestruckdeals. Best source to choose wedding deals with great wedding discounts and wedding coupons."/>
<?php
}
?>
<meta name="msvalidate.01" content="34D0D78E571E292B6D002FD370FA6534" />
<meta name="google-site-verification" content="IO_O0JTlZS6o9S-0xQH9Zft0HtN5bp0AVBG1oZz6zPc" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<meta name="keywords" content="Wedding deals,affordable wedding,Wedding packages,wedding discounts,wedding coupons,wedding specials,budget wedding,wedding veneus,local vendors">
        <?php
        $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        /*if (strpos($url,'weddingdeals?') !== false) {
            echo 'http://www.lovestruckdeals.com/weddingdeals';
        } else {*/
         ?>
        <?php
        if (strpos($url,'weddingdeals?') == false) {
        ?>
        <link rel="canonical" href="<?php echo $url;?>"/>
        <?php
        }
        ?>
        
        <link rel="shortcut icon" href="<?php echo ROOT_PATH; ?>images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo ROOT_PATH; ?>images/favicon.ico" type="image/x-icon">
        <link type="text/css" href="<?php echo ROOT_PATH; ?>css/style.css" rel="stylesheet"/>
        <link type="text/css" href="<?php echo ROOT_PATH; ?>css/owl.theme.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>css/bootstrap-select.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,700|Montserrat|Roboto|FontAwesome' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>css/bs_leftnavi.css">
        <script src="<?php echo ROOT_PATH; ?>js/jquery.min.js"></script>
        <script src="<?php echo ROOT_PATH; ?>js/custom.js"></script>
        <script src="<?php echo ROOT_PATH; ?>js/bootstrap.js"></script>
        <script src="<?php echo ROOT_PATH; ?>js/menu-toggle.js"></script>
        <script src="<?php echo ROOT_PATH; ?>js/owl.carousel.js"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/bootstrap-select.js"></script>
        
        <?php include './validation_manageforms'; ?>
        <style>
            .slidingDiv{position: absolute;
                        top: 52px;
                        left:50%;
                        background-color: #fff;
                        padding: 8px 9px;
                        min-width: 263px;
                        border-radius: 0 0 3px 3px;
                        z-index:9999;
                        text-align:left;
                        margin-left:90px;
                        border: 1px solid #f5f5f5;
            }
            .slidingDiv:before{width: 0; 
                               height: 0; 
                               border-left: 10px solid transparent;
                               border-right: 10px solid transparent;
                               border-bottom: 10px solid #f5f5f5;position:absolute;top:-10px;left:43%;content:"";}
            .wel-tab{position:relative;}

            .slidingDiv input
            {
                font-size:13px;
                padding:10px 46px;
                margin:10px;
            }
            /*.slidingDiv div
             {width:100%;}*/
            .slidingDiv form lable
            {
                font-size:13px;
                margin-left:10px;
                margin-right:10px;
            }
            div.remember_me lable{
                float: left;
                line-height: 31px;
            }
            div input.submit {
                /* text-align: right;*/
                padding:7px 12px;
                margin-top:10px;
            }
            .slidingDiv form div.login input[type="submit"]
            {
                display:inline-block;
                text-align:center !important;
            }
            textarea {
            resize: none;
}
            
/*            .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('https://www.lovestruckdeals.com/images/ajax-loader.gif') 50% 50% no-repeat rgba(0,0,0,0.5);
        }*/

        </style>
        
    </head>
    <body>
     <div class="loader"></div>
        <div class="menu_overlay"></div>
          <header class="head-brd">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="row menu-lg">
                        <div class="logo pd0"><a href="  <?php echo ROOT_PATH; ?>"><img src="<?php echo ROOT_PATH; ?>images/xaaza_logo.png" alt="wedding deals"></a></div>
                        <nav id="navigation" role="navigation" class="pull-right">
                            <div id="menu-collapse"> <img src="<?php echo ROOT_PATH; ?>images/menu-icon.png" alt="lovestruckdeals"/></div>
                            <div class="main-navigation navbar navbar-inverse" id="nav-collapse">
                                <div class="nav-collapse pull-left">
                                    <div class="menu-menu-1-container text-uppercase">
                                        <ul id="menu-menu-1" class="nav">  
                                            <li><a href="<?php echo ROOT_PATH; ?>weddingdeals">Wedding&nbsp;deals</a></li>   
                                            <!-- <li><a href="#">Xaaza&nbsp;style</a></li>-->
                                            <li><a href="<?php echo ROOT_PATH; ?>local-vendors">Local&nbsp;Vendors</a></li>
                                            <li><a href="  <?php echo ROOT_PATH; ?>about-us">About</a></li>
                                            <li><a href="https://www.lovestruckdeals.com/tipsanddeals/" target="_blank"  >Tips&nbsp;and&nbsp;Deals</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="accnt pull-right">
                                    <div class="social pull-right">
                                        <h3>Social Links</h3>
                                        <ul>
                                            <li><a href="<?php echo $rowsocial1['instragram']; ?>" class="instg" target="_blank">Instagram</a></li>
                                            <li><a href="<?php echo $rowsocial1['facebook']; ?>" class="fb" target="_blank">Facebook</a></li>           
                                            <li><a href="<?php echo $rowsocial1['twitter']; ?>" class="twt" target="_blank">Twitter</a></li>
                                            <li><a href="<?php echo $rowsocial1['pinterest']; ?>" class="pint" target="_blank">pinterest</a></li>
                                        </ul>
                                    </div>
                                    <div class="ac-log text-right pull-right">
                                        <ul>
                                            <div class="slidingDiv">
                                                <div class="alert-danger"> <?php echo $message; ?></div>
                                                <form action="vendor_admin/loginins" name="testForm" method="post" id="testForm">
                                                    <input type="text" placeholder="Username or Email" value="" name="email" id="email" kl_virtual_keyboard_secure_input="on" class="text-input">
                                                    <input type="password" placeholder="Password" value="" name="password" id="password" kl_virtual_keyboard_secure_input="on" class="text-input">
                                                    <div class="remember_me">
                                                        <label>
                                                            <input type="checkbox" id="remember_me" name="remember_me">  Remember me
                                                            </div>
                                                            <div class="text-left login">
                                                                <div class="col-sm-5 pd0">
                                                                    <input type="submit" value="Submit" name="submit" class="submit blu-btn" target="_blank">  
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <a href="forgetpassword">Forgot password?</a>
                                                                </div>
                                                            </div>
                                                            </form>
                                                    </div>
                                                    <li class="usr-nm">
                                                        <?php
                                                        if (!empty($_SESSION['name'])) {
                                                            echo 'Welcome, ' . $_SESSION['fname'];
                                                            ?> <a href="<?php echo ROOT_PATH; ?>vendor_admin/dashboard" target="_blank"> My Account</a></li>
                                                        <li><a href="<?php echo ROOT_PATH; ?>vendor_admin/logout" class="blu-btn" >Log Out
                                                            </a></li>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li><a href="<?php echo ROOT_PATH; ?>#" class="blu-btn show_hide" id="login">Vendor Login
                                                            </a></li>
                                                        <li><a href="<?php echo ROOT_PATH; ?>weddingpackages" class="blu-btn">Vendor Sign Up</a></li>
                                                    <?php }
                                                    ?>
                                                    </ul>                            
                                            </div>
                                    </div>
                                    <!-- </div>-->
                                   
                                    <?php
                                    //newsletter side bar 
                                    include './newsletter_sidebar.php';
                                    ?>
                                </div>
                                <!-- End Modal -->
                            </div>
                    </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</body>
       
    <!--    <script src="<?php echo ROOT_PATH; ?>js/bs_leftnavi.js"></script> -->
        
<script type="text/javascript">
    $(document).ready(function () {
        $('#selecctallID').click(function (event) {  //on click
            if (this.checked) { // check select status
                $('.checkboxAll').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                });
            } else {
                $('.checkboxAll').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                });
            }
        });
        $(".menu_overlay").click(function() {
            $(".main-navigation").removeClass("open");
            $(".menu_overlay").removeClass("open");
            $("body").removeClass("open");
        });

        $(".main-navigation").click(function(event) {

            //event.stopPropagation();
        });
        

    });
    function getCityName(val)
    {
        $.ajax({
            type: "POST",
            url: "get_city1",
            data: 'state_id=' + val,
            success: function (data) {
                $("#city-list3").html(data);
            }
        });
    }
    
    //loader 
//    $(window).load(function() {
//	$(".loader").fadeOut("slow");
//})
</script>

<script type="text/javascript">
            function login() {
                var username = $('#email').val();
                var password = $('#password').val();

                alert(username);
                alert(password);
                if (username == "" && password == "")
                {
                    $('.alert-danger').html("<span>Please enter email and password</span>");
                    return false;
                }
                if (username == "")
                {
                    $('.alert-danger').html("<span>Please enter email</span>");
                    return false;
                }
                if (password == "")
                {
                    $('.alert-danger').html('<span id="error">Please enter password</span>');
                    return false;
                }


            }
            ;


        </script>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-76390559-1', 'auto');
            ga('send', 'pageview');

        </script>
  <script src="js/sweetalert-dev.js" type="text/javascript"></script>
   <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
//userAgent in IE7 WinXP returns: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727)
//userAgent in IE11 Win7 returns: Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko

/*if (navigator.userAgent.indexOf('MSIE') != -1)
 var detectIEregexp = /MSIE (\d+\.\d+);/ //test for MSIE x.x
else // if no "MSIE" string in userAgent
 var detectIEregexp = /Trident.*rv[ :]*(\d+\.\d+)/ //test for rv:x.x or rv x.x where Trident string exists
if (detectIEregexp.test(navigator.userAgent)){ //if some form of IE
 var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
 if (ieversion>=5)
     swal({
  title: "Please use other browsers to make all features work!",
  text: "",
  timer: 3000,
  showConfirmButton: false
});
  //alert('please use other browsers to make all features work');
}
else{*/
 if (document.documentMode || /Edge/.test(navigator.userAgent)) {
     alert('Please use other browsers to make all features work');
//   swal({
//  title: "Please use other browsers to make all features work!",
//  text: "",
//  timer: 3000,
//  showConfirmButton: false
//});
}
//}      
</script>