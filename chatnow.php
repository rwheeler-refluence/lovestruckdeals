<?php
include "config.php";
$vid=$_GET['id'];
//print_r($vid);die;
$sql = "SELECT * FROM vendor_details where vendor_id=$vid";

                                                     $result = mysqli_query($mysqli, $sql) or die(mysqli_error()); 

                                                     while ($row = mysqli_fetch_array($result)) 

                                                        { //print_r($row);die;                                                

                                                  ?>                                

                                                    <?php                                                       

                                                   $val = $row['buttoncode'];

                                                   $dec_val = base64_decode($val);

                                                   if( isset( $dec_val ) && !empty( $dec_val ) ){

                                                      echo $dec_val;

                                                    } else {

                                                      echo "Please Contact to the admin for button code and update that button code.";

                                                    }

                                                    } 

                                                    ?>
