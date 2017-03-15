<?php
session_start(); 
if(empty($_SESSION["username"]))
{
require_once("index.php");

}
 else 
 {
include "sidebar.php";
include "../config.php";
$dt2=date("Y-m-d H:i:s");
?>
<section>
	<div class="search">
    	<i class="search-bar"></i>
    	<input type="search" placeholder="Search" class="monts">
    </div>
    <div class="views">
    <h3><font color="#19b5bc">Manage HomePage Banner</h3></font><br>
    
    
    
    
    







 </div>

</section>
<script src="../image-css/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../image-css/bootstrap-fileinput.js"></script>
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
</body>
</html>
<?php
 }
 ?>