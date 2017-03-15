<?php 
$cid=intval($_GET['cid']);                                      
	    
            $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
            //$mysqli = mysqli_connect('localhost', 'livemysi_xaaza', 'n8viiA(liqof', 'livemysi_xaaza'); 
            if(!empty($_POST["country_id"])) 
            {                
                $query ="SELECT * FROM state WHERE cid = '" . $_POST["country_id"] . "'";
                $result = mysqli_query($mysqli, $query) or die(mysqli_error());	
?>              
                <option selected="selected" value=""> --Select State --</option>
            <?php
                while ($row1 = mysqli_fetch_array($result)) 
                {
            ?>
                    
                    <option value="<?php echo $row1['sid'];?>"<?php if ($row1['sid'] == $regstate['sid']) echo 'selected="selected"'; ?>><?php echo $row1['sname'];?></option>
<?php           } 
            }
?>
