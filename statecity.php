<?php 
include './config.php';
$cid=intval($_GET['sid']);                                      
	?>    
     
	    <?php 
            
		    $sql = "SELECT * FROM city WHERE sid = '$cid'";
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        
                       
                   ?>
	        <option value='<?php echo $row['cityId'];?>'><?php echo $row['cityName'];?></option>
	     <?php } // mysql_close($str);  ?>
        </select>

