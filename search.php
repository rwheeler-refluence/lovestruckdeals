<?php
session_start();   
$sessionid= session_id();
$cat = $_GET['cat'];
$address=$_GET['address'];

//include './header.php';
include './config.php';
//include './validation_manageforms.php';
include './includes/config.inc.php';


$distances = array(
    200 => '200 Miles',
    100 => '100 Miles',
    50 => '50 Miles',
);
  function dateDiff($start, $end) 
    {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);                                                       
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
      

if (isset($_POST['ajax'])) {
   
    if (isset($_POST['action']) && $_POST['action'] == 'get_nearby_stores') {

        if (!isset($_POST['lat']) || !isset($_POST['lng'])) {

            echo json_encode(array('success' => 0, 'msg' => 'Coordinate not found'));
            exit;
        }

        // support unicode
        mysql_query("SET NAMES utf8");

        // category filter
        if (!isset($_POST['cat']) || $_POST['cat'] == "") {
            $category_filter = "";
        } else {
            $category_filter = " CategoryID='" . $_POST['cat'] . "'";
        }
          //advertise_id,spotlightDeal,vendor_id,adv_type,categoryId,likes,
//        $sql="select ad.vendor_name,ad.categoryId,ad.adv_type,ad.likes,ad.description,ad.dealtitle,ad.advertise_img,ad.vendor_name,vd.c_name,( 3959 * ACOS( COS( RADIANS(".$_POST['lat'].") ) * COS( RADIANS(ad.latitude ) ) * COS( RADIANS(ad.longitude ) - RADIANS(".$_POST['lng'].") ) + SIN( RADIANS(".$_POST['lat'].") ) * SIN( RADIANS( ad.latitude ) ) ) ) AS distance"
//                . "FROM advertisement ad  left join vendor_details vd on ad.vendor_id=vd.vendor_id  WHERE  ad.categoryId ='1'"                
//                . " HAVING distance <= " . $_POST['distance'] . "";
//       echo $sql;
//                $sql = "SELECT *,( 3959 * ACOS( COS( RADIANS(".$_POST['lat'].") ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) - RADIANS(".$_POST['lng'].") ) + SIN( RADIANS(".$_POST['lat'].") ) * SIN( RADIANS( latitude ) ) ) ) AS distance                
//                FROM advertisement ad
//                
//                WHERE  categoryId ='" . $_POST['cat'] . "'                
//                HAVING distance <= " . $_POST['distance'] . " ";    
         $sql = "SELECT *,( 3959 * ACOS( COS( RADIANS(".$_POST['lat'].") ) * COS( RADIANS( ad.latitude ) ) * COS( RADIANS( ad.longitude ) - RADIANS(".$_POST['lng'].") ) + SIN( RADIANS(".$_POST['lat'].") ) * SIN( RADIANS( ad.latitude ) ) ) ) AS distance                
                FROM advertisement ad
                left join vendor_details vd 
		on ad.vendor_id=vd.vendor_id 
                left join category cat
                on cat.categoryId=ad.categoryId
                left join city cit 
                on cit.cityId=ad.cityId
                WHERE  ad.categoryId ='" . $_POST['cat'] . "'                
                HAVING distance <= " . $_POST['distance'] . " ";         
        echo json_stores_list($sql);  
    }
    exit;
}


$errors = array();

if ($_POST) {
    if (isset($_POST['address']) && empty($_POST['address'])) {
        $errors[] = 'Please enter your address';
    } else {


        $google_api_key = '';

        $region = 'india';



        $xml = convertXMLtoArray($tmp);

        if ($xml['Response']['Status']['code'] == '200') {

            $coords = explode(',', $xml['Response']['Placemark']['Point']['coordinates']);

            if (isset($coords[0]) && isset($coords[1])) {

                $data = array(
                    'name' => $v['name'],
                    'address' => $v['address'],
                    'latitude' => $coords[1],
                    'longitude' => $coords[0]
                );

                $sql = "SELECT *, ( 3959 * ACOS( COS( RADIANS(" . $coords[1] . ") ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) - RADIANS(" . $coords[0] . ") ) + SIN( RADIANS(" . $coords[1] . ") ) * SIN( RADIANS( latitude ) ) ) ) AS distance FROM advertisement WHERE is_delete=0 HAVING distance <= " . $db->escape($_POST['distance']) . " ORDER BY distance ASC  LIMIT 8";
                
                $stores = $db->get_rows($sql);


                if (empty($stores)) {
                    $errors[] = 'Stores with address ' . $_POST['address'] . ' not found.';
                }
            } else {
                $errors[] = 'Address not valid';
            }
        } else {
            $errors[] = 'Entered address' . $_POST['address'] . ' not found.';
        }
    }
}




?>

<style>
            .slidingDiv{position: absolute;
                        top: 52px;
                        left:40px;
                        background-color: #dddddd;
                        padding: 8px 9px;
                        min-width: 263px;
                        border-radius: 0 0 3px 3px;
                        z-index:9999;
                        text-align:left;
            }
            .slidingDiv:before{width: 0; 
                               height: 0; 
                               border-left: 10px solid transparent;
                               border-right: 10px solid transparent;
                               border-bottom: 10px solid #dddddd;position:absolute;top:-10px;left:43%;content:"";}
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
            /*div input.submit {
                text-align: right;
             padding:7px 12px;
            }*/

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
            /*.slidingDiv form div.login
            {
                    width:25%;
            }*/
        </style>

<link type="text/css" href="css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700|Montserrat|Roboto' rel='stylesheet' type='text/css'>
   <!-- -->
        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.js"></script>

        <script type="text/javascript" src="js/bootstrap-select.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=geometry,places"></script>

        <script src="js/super-store-finder.js" type="text/javascript"></script>
           <script type="text/javascript">
            $(document).ready(function () {
                $('.slidingDiv').hide();
                $('.show_hide').click(function (e) {
                    e.stopPropagation();
                    $('.slidingDiv').slideToggle();
                });
                $('.slidingDiv').click(function (e) {
                    e.stopPropagation();
                });

                $(document).click(function () {
                    $('.slidingDiv').slideUp();
                });
            });
        </script>
        <script type="text/javascript">
            function login() {
            var username=$('#email').val();
            var password=$('#password').val();

            if(username=="" && password=="")
            {
            $('.alert-danger').html("<span>Please enter email and password</span>");
             return false;
            }
            if(username=="")
            {
            $('.alert-danger').html("<span>Please enter email</span>");
             return false;
            }
            if(password=="")
            {
            $('.alert-danger').html('<span id="error">Please enter password</span>');
             return false;
            }
            };
        </script>
         <script type="text/javascript"> 
      
    function doSomething(add_id)
        {
            var a = $('#item1 span').text();
            var sessionid='<?php echo $sessionid; ?>';                 
            $.ajax({
                type: "POST",
                url: 'indexins.php?sessionid='+sessionid,
                data: {'add_id': add_id},
                success: function (resp) {
                    //alert(resp);
                    $("#likes_new_" + add_id).html(resp);
                }
            });
        }                                                            
    </script>

    <!-- -->
    <body>
        <header class="head-brd">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="row menu-lg">
                        <nav id="navigation" role="navigation" class="col-lg-8 pd0">
                            <div class="main-navigation navbar navbar-inverse">
                                <!--<div class="navbar-inner">
                                        <div class="container"></div>
            </div>-->
                                <div class="col-lg-3 logo"><a href="index.php"><img src="images/xaaza_logo.png" alt=" "></a></div>
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="col-lg-7 pd0">
                                    <div class="nav-collapse collapse">
                                        <div class="menu-menu-1-container text-uppercase">
                                            <ul id="menu-menu-1" class="nav">  
                                                <li><a href="wedding_deals.php">Wedding&nbsp;deals</a></li>   
                                                <!-- <li><a href="#">Xaaza&nbsp;style</a></li>-->
                                                <li><a href="local-vendors.php">Local&nbsp;Vendors</a></li>
                                                <li><a href="about_us.php">About</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <div class="col-lg-4">
                            <div class="accnt">
                                <div class="ac-log text-right">
                                    <ul>                                        
                                        <div class="slidingDiv">
                                            <div class="alert-danger"> <?php echo $message;?></div>
                                            <form action="vendor_admin/loginins.php" name="testForm" method="post" id="testForm" onSubmit="return login()">

                                                <input type="text" placeholder="Username or Email" value="" name="email" id="email" kl_virtual_keyboard_secure_input="on" class="text-input">

                                                <input type="password" placeholder="password" value="" name="password" id="password" kl_virtual_keyboard_secure_input="on" class="text-input">

                                                <div class="remember_me">

                                                    <label>
                                                        <input type="checkbox" id="remember_me" name="remember_me">
                                                        Remember me on this computer
                                                    </label>
                                                </div>
                                                <div class="text-left login">
                                                    <div class="col-sm-5 pd0">
                                                        <input type="submit" value="submit" name="submit" class="submit blu-btn">  
                                                    </div>
                                                    <div class="col-sm-5"><a href="forgetpassword.php">Forgot&nbsp;password?</a></div>
                                                </div>
                                            </form>
                                        </div>                                        
                                        <?php
                                        if (!empty($_SESSION['name'])) 
                                        {
                                              
                                         echo 'Welcome, '.$_SESSION['fname'];?><a href="./vendor_admin/dashboard.php" target="_blank"> My Account</a> 
                                                <li><a href="./vendor_admin/logout.php" class="blu-btn" >Log Out
                                            </a></li>
                                       <?php }
                                        else
                                        {?>
                                                <li><a href="#" class="blu-btn show_hide" id="login">Login
                                            </a></li>
                                        <li><a href="vendor-landing-page1.php" class="blu-btn">Sign Up</a></li>
                                       <?php }    
                                        ?>                                       
                                    </ul>                            
                                </div>
                                <div class=" social pull-right">
                                    <ul>
                                        <li><a href="<?php echo $rowsocial1['instragram']; ?>" class="instg" target="_blank">Instagram</a></li>
                                        <li><a href="<?php echo $rowsocial1['facebook']; ?>" class="fb" target="_blank">Facebook</a></li>           
                                        <li><a href="<?php echo $rowsocial1['twitter']; ?>" class="twt" target="_blank">Twitter</a></li>
                                        <li><a href="<?php echo $rowsocial1['pinterest']; ?>" class="pint" target="_blank">pinterest</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
    <div id="super-store-finder page-top" class="map-fullscreen page-homepage navigation-off-canvas pace-con-fixed" style="background: none !important;">
        <div id="outer-wrapper">
            <div id="inner-wrapper">                
                <div id="clinic-finder" class="clear-block">
                    <!--<div class="links"></div>-->

                    <!-- Search location and category -->
                    <form  name='data' id="clinic-finder-form" method="POST" enctype="multipart/form-data" action="search.php">                    
                        <div class="col-sm-8 mt30 col-sm-push-2">                                                                                                                                       
                            <div class="col-lg-4">                                      
                                  <div id="suggesstion-box1"  class="loc2"></div>                                             
<!--                                  <input type="text" id="txtAddress" name="txtAddress" placeholder="Enter Location" value="<?php //echo $address; ?>" >-->
                                  <input type="text" id="address" name="address" placeholder="Enter Location" size="20" value="<?php echo $address; ?>">
                            </div>
                    
                            <div class="col-lg-4" id="ctaid">
                                <div class="categories2"></div>                                           
                                    <select id="basic1" name="cat" class="selectpicker show-tick  services" >
                                        <option selected="selected"  value="">All  Categories</option>
                                        <?php  
                                            $sql = "SELECT categoryId,categoryName FROM category where isdel='0'";
                                            $result = mysqli_query($mysqli, $sql) or die(mysqli_error());                                            
                                            while ($row = mysqli_fetch_array($result)) 
                                            {                                                
                                        ?>                                                    
                                                <option <?php if($cat == $row['categoryId']) echo 'selected="selected"'; ?> value="<?php echo $row['categoryId'];?>"><?php echo $row['categoryName'];?></option>                                                                                                                                       
                                        <?php                                                       
                                            }
                                        ?> 
                                    </select>                                                         
                            </div>
                    
                            <div class="col-lg-4">
                                 <input type="hidden" id="distance" name="distance" value="20">

                                <input type="submit" name="search" value="Search" class="btn blu-btn ser-new-btn">                                   
                            </div>
                        </div>
                    </form>
<!--                    <div id="map_canvas" style="width:100%;height:400px;clear:both;display:block;"></div>                                                                            -->
                </div>
                
                <!--Listing Grid-->
                <div class="wedding_deals">
                    <div id="faq-result">
                        <section class="block">
                            <div class="row pd5 ">     
                                <div id="list"></div>
                            </div>
                        </section>
                    </div>
                </div>
                 
        <?php
            include './footer.php';
        ?>
            </div>
        </div>            
    </body>
</html>