<div class="nwsltr col-sm-12">
                                	<a href="#" data-toggle="modal" role="button" data-target="#myModalt">sign up for a newsletter<i class="fa fa-long-arrow-right"></i></a>
                                        <!-- Modal -->
                                        <div class="head_popup">
                                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Get Deals</h4>
                                                        </div>
                                                        <div class="modal-body pt0">
                                                            <div class="views">
                                                                <form method="post" action="insertform" onsubmit="return validatemanageform2();" id="form_id">
                                                                    <div class="form-group">
                                                                        <label>Name:</label>
                                                                        <input type="text" name="name1"  id="nameone"placeholder="Name">
                                                                        <div id="nameone_error" style="display:none"class="error_msg" ><font color="red"> Please enter your name.</font></div>
                                                                        <div id="nameone_error1" style="display:none"class="error_msg" ><font color="red"> Please enter your valid name.</font></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email:</label> 
                                                                        <input type="text" name="email" id="txtemailone" placeholder="Email">
                                                                        <div id="txtemailone_error" style="display:none"class="error_msg">Please enter email ID.</div>
                                                                        <div id="txtemailone_error1" style="display:none"class="error_msg">Please enter your valid email ID.</div>
                                                                    </div>

                                                                    <?php
                                                                    include './config.php';
                                                                    $sql = "SELECT * FROM category where isdel=0";
                                                                    $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                        <div class="cate_gory">
                                                                            <label><?php echo $row['categoryName']; ?></label>
                                                                            <input type="checkbox" class="checkboxAll" name="cat[]" value="<?php echo $row['categoryId']; ?>">
                                                                        </div> 
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    </form>
                                                                    <div class="form-group"> 
                                                            <label> Select Category:</label>
                                                            <div class="sub_cate">
                                                                <div class="all_slct">
                                                                    <label>Select All</label>
                                                                    <input type="checkbox" id="selecctallID"/>   
                                                                </div>
                                                                <?php
                                                                include './config.php';
                                                                $sql = "SELECT * FROM category where isdel=0";
                                                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    ?>

                                                                    <div class="cate_gory">
                                                                        <label><?php echo $row['categoryName']; ?></label>
                                                                        <input type="checkbox" class="checkboxAll" name="cat[]" value="<?php echo $row['categoryId']; ?>">
                                                                    </div> 
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>	  
                                                        </div>
                                                        <div class="form-group">
                                                            <label>State:</label>
                                                            <select name="state[]" id="state-list" onChange="getCityName(this.value);">
                                                                <option selected="selected" value=""> --Select State --</option>
                                                                <?php
                                                                $sqlstate = "SELECT * FROM state";
                                                                $resultstate = mysqli_query($mysqli, $sqlstate) or die(mysqli_error());
                                                                while ($rowstate = mysqli_fetch_array($resultstate)) {
                                                                    ?>
                                                                    <option <?php if ($rowse['sid'] == $rowstate['sid']) echo 'selected="selected"'; ?> value="<?php echo $rowstate['sid']; ?>"><?php echo $rowstate['sname']; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <div id="regstate_error" style="display:none"class="error_msg">Please select city.</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>City : </label>
                                                            <select name="city[]" id="city-list3" multiple="multiple" class="special" size="3" >
                                                                <option selected="selected" value=""> --Select City --</option>
                                                                <?php
                                                                $sqlcity = "SELECT * FROM city ";
                                                                $resultcity = mysqli_query($mysqli, $sqlcity) or die(mysqli_error());
                                                                while ($rowcity = mysqli_fetch_array($resultcity)) {
                                                                    ?>
                                                                    <option <?php if ($rowse['cityId'] == $rowstate['cityId']) ; ?>value="<?php echo $rowcity['cityId']; ?>" ><?php echo $rowcity['cityName']; ?></option>

                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>   
                                                            <div id="regcity_error" style="display:none"class="error_msg">Please select city.</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button  name="submit" type="submit" value="submit" class="btn blu-btn" id="sub">Save Changes</button></div>
                                                        
                                                            </div>	  
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>