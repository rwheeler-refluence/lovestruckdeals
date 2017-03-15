<?php 
$cid=intval($_GET['cid']);                                       
?>

<select name="regstate" id="subcatid" onChange="getProduct(this.value)">
	<option>--Select State--</option>
	    <?php 
            //$mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
            $mysqli = mysqli_connect('localhost', 'livemysi_xaaza', 'n8viiA(liqof', 'livemysi_xaaza'); 
		    $sql = "SELECT sid , sname from state where cid='$cid'";
                    $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                    while ($row = mysqli_fetch_array($result)) {
                   ?>
	        <option value='<?php echo $row['sid'];?>'><?php echo $row['sname'];?></option>
	     <?php } // mysql_close($str);  ?>
        </select>


		
		
