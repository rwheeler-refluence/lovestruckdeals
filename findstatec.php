<?php 
$cid=intval($_GET['cid']);                                       
?>

<select name="regstate2" id="bussubcatid" onChange="getProduct(this.value)">
	<option>--Select State--</option>
	    <?php 
                    $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
                    //$mysqli = mysqli_connect('localhost', 'livemysi_xaaza', 'n8viiA(liqof', 'livemysi_xaaza'); 
		    $sql1 = "SELECT sid , sname from state where cid='$cid'";                                                
                    $result1 = mysqli_query($mysqli, $sql1) or die(mysqli_error());
                    while ($row1 = mysqli_fetch_array($result1)) {
                   ?>
	        <option value='<?php echo $row1['sid'];?>'><?php echo $row1['sname'];?></option>
	     <?php } // mysql_close($str);  ?>
        </select>


		
		