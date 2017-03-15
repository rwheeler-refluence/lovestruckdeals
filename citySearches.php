<?php

    include "config.php";

    $state = $_POST['stateID'];

    $qry = $mysqli->query("SELECT sid FROM state WHERE sname= '$state'");

   $row = $qry->fetch_row();$sid=$row[0];

   

?>

                    <div class="loc1"></div>
                             <select id="basic" class="selectpicker show-tick dropup" data-live-search="true" >
                                  <option selected disabled> Enter City Name</option>
                            <?php      
                            $query ="SELECT * FROM city WHERE sid = '" . $sid . "'order by cityName";
                           $result = mysqli_query($mysqli, $query) or die(mysqli_error());
                          while ($addrow = mysqli_fetch_array($result)) 
                                {
                              ?>
                                    <option value="<?php echo $addrow["cityName"]; ?>"><?php echo $addrow["cityName"]; ?></option>
                        
                               <?php
                                }
                            ?>
                             </select>


