<!-- Rahul -->
<?php
@session_start();	
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
    <div class="wel-profl"></div>
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
            <li><a href="manageprofile.php"><i class="manage"></i>Manage your profile</a></li>
            <li><a href="managephotogallery.php"><i class="manage imag"></i>Add gallery images</a></li>
            <li><a href="addinformation.php"><i class="manage in"></i>Add information</a></li>
        <li><a href="#"><i class="manage vedio"></i>Add video</a></li>
        <li><a href="#"><i class="manage spoat"></i>Become a spotlight vendor</a></li>
        
    </ul>
    <ul>
    	<h3>Deals</h3>
    	<li><a href="#"><i class="manage deals1"></i>Manage deals</a></li>
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
