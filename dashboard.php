
<?php

$id = $_GET['id'];

//$s= intval($_GET['id']);
//echo $s;
@session_start();

if (!isset($_SESSION['views'])) { 
    $_SESSION['views'] = 0;
     $id = $_GET['id'];
    
     //die();
}
// Rahul Profile view  Example
/*
$_SESSION['views'] = $_SESSION['views']+1;

if ($_SESSION['views'] == 1) {
    header("location:dashboard.php");
}
print_r($_SESSION['views']);
*/

if(!empty($_SESSION['name']))
{
    $s=$_SESSION['name'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Xaaza</title>

<link type="text/css" href="css/style.css" rel="stylesheet"/>
<!--<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


</head>

<body id="main">
<header>
<div class="dash-logo">    
  <img src="images/xaaza_logo.png" /> 
</div>

<div class="welcome">
    <div class="wel-profl"> </div>
    <div class="profl-text"><p class="monts">Welcome,<br/>Samantha</p></div>
</div>

<div class="setup">
	<p class="monts">Setup your profile <span>(90%)</span></p>
    <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:90%">
      <!--<span class="sr-only">70% Complete</span>-->
    </div>
  </div>
</div>
<div class="head-information">
	<ul>
    	<li><a href="personal-information.php"><i class="manage"></i>Manage your profile</a></li>
        <li><a href="managephotogallery.php"><i class="manage imag"></i>Add gallery images</a></li>
        <li><a href="addinformation.php"><i class="manage in"></i>Add information</a></li>
        <li><a href="managevideo.php"><i class="manage vedio"></i>Add video</a></li>
        <li><a href="#"><i class="manage spoat"></i>Become a spotlight vendor</a></li>
        
    </ul>
    <ul>
    	<h3>Deals</h3>
    	<li><a href="managedeals.php"><i class="manage deals1"></i>Manage deals</a></li>
        <li><a href="#"><i class="manage deals2"></i>Add deals</a></li>
        <li><a href="#"><i class="manage deals3"></i>Make your deals spotlight</a></li>
       
    </ul>
    <ul>
    	<h3>Chats</h3>
    	<li><a href="#"><i class="manage masg"></i>My messages</a></li>
        <li><a href="#"><i class="manage masg2"></i>Missed messages</a></li>
    </ul>
  
</div>
<div class="logout">
    <a href="logout.php"><i class="manage log"></i>Log Out</a></li>
</div>

</header>

<section>
	<div class="search">
    	<i class="search-bar"></i>
    	<input type="search" placeholder="Search" class="monts">
    </div>
    <div class="views">
    	<div class="col-sm-12">
        	<div class="col-sm-3">
            
            	<div class="profile-views">
                	<i class="view-icon"></i>
                	<h2 class="monts">23</h2>
                    <p class="monts">Profile views</p>
                </div>
            
            </div>
            <div class="col-sm-3">
            
            	<div class="profile-views">
                	<i class="view-icon fa-deals"></i>
                	<h2 class="monts">18</h2>
                    <p class="monts">Favourite deals</p>
                </div>
            
            </div>
            <div class="col-sm-3">
            
            	<div class="profile-views">
                	<i class="view-icon de-view"></i>
                	<h2 class="monts">758</h2>
                    <p class="monts">Deals viewed</p>
                </div>
            
            </div>
            <div class="col-sm-3">
            
            	<div class="profile-views">
                	<i class="view-icon messg"></i>
                	<h2 class="monts">23</h2>
                    <p class="monts">Messages</p>
                </div>
            
            </div>
        </div>
        <div class="messages">
          <p class="monts">save <span>20% OFF</span> on deals posting between <span>3/26 - 3/30</span>use code <span class="trans">springfling</span> at checkout</p>
          <p class="monts">Congratulations your deal was favourited <span>10</span> times between <span>3/26 - 3/30</span> </p>
          <div class="col-sm-12 pd0"> 
          	<div class="col-sm-9 pd0"><p class="monts"><span>3/25/15</span> missed message from laila@gmail.com</p></div>
            <div class="col-sm-2 pd0">
            	<div class="read monts"><a href="#">Read message</a></div>
            </div>
          </div>
          <div class="col-sm-12 pd0"> 
          	<div class="col-sm-9 pd0"><p class="monts"><span>3/24/15</span> missed message from kate@gmail.com</p></div>
            <div class="col-sm-2 pd0">
            	<div class="read monts"><a href="#">Read message</a></div>
            </div>
          </div>
          
           <p class="monts"><span>3/24/15</span> Become a spotlight member and increase your match by <span>80%</span></p>
        </div>
    </div>
    <div class="tips">
    	<h3 class="monts">tips</h3>
        <div class="tips-right">
        		<i class="tip-icon"></i>
        	<p class="monts">Become a spotlight vendor</p>
        </div>
         <div class="tips-right">
         	<i class="tip-icon tip-icon2"></i>
        	<p class="monts">Make your deals spotlight</p>
        </div>
    
    </div>
</section>
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
</body>
</html>

<?php
   }
 else {
      header('location:index.php');
}
?>
 