<style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('https://www.lovestruckdeals.com/images/ajax-loader.gif') 50% 50% no-repeat rgba(0,0,0,0.5);
        }
</style>

<?php 
include './config.php';
$cid=intval($_GET['cid']);                                      

            if(!empty($_POST["state_id"])) 
            {                
                $query ="SELECT * FROM city WHERE sid = '" . $_POST["state_id"] . "'order by cityName";
                $result = mysqli_query($mysqli, $query) or die(mysqli_error());	
?>              
                <option selected="selected" value=""> --Select City --</option>
            <?php
                while ($row1 = mysqli_fetch_array($result)) 
                {
            ?>
                    
                     <option <?php if($row['c_city'] == $row1['cityId']) echo 'selected="selected"'; ?>value="<?php echo $row1['cityId']; ?>" ><?php echo $row1['cityName']; ?></option>
<?php           } 
            }
?>
                     <script>
                     $(window).load(function() {
                            $(".loader").fadeOut("slow");
                    })</script>