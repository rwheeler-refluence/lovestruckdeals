
<?php include 'header.php'; 
 
$id=$_GET['id'];

?>
<script language="javascript" type="text/javascript">
    function getXMLHTTP() { //fuction to return the xml http object
        var xmlhttp = false;
        try {
            xmlhttp = new XMLHttpRequest();
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                try {
                    req = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e1) {
                    xmlhttp = false;
                }
            }
        }
        return xmlhttp;
    }


    function getSub(cId) {

        var strURL = "findstate.php?cid=" + cId;
        var req = getXMLHTTP();

        if (req) {

            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById('statediv').innerHTML = req.responseText;
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }
    }

    function getSub2(cId) {

        var strURL = "findstate.php?cid=" + cId;
        var req = getXMLHTTP();

        if (req) {

            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                        document.getElementById('statediv2').innerHTML = req.responseText;
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }
    }

</script>
<div class="clearfix"></div>
<div class="line"></div>     
<!-- Steps --->


<div class="steps mt30">
    <div class="container">
        <ul>
            <li class="step-one "><a href="#"><span>1</span>Step 1</a></li>
            <li class="step-one active"><a href="#"><span>2</span>Step 2</a></li>
            <li class="step-one"><a href="#"><span>3</span>Step 3</a></li>
            <li class="step-one"><a href="#"><span>4</span>Step 4</a></li>
        </ul>

        <div class="col-md-8 register reg_Details mt30">
            <div class="regdetails mt10">
                <h4>Your Personal Information</h4>
                <form class="mt20"   id="defaultForm" method="post"  action="regins2.php" >
                    <div class="row">
                        <div class="col-sm-6"><input type="text" placeholder="*First Name" name="firstname"></div>
                        <div class="col-sm-6"><input type="text" placeholder="*Last Name" name="lastname"></div>
                    </div>
                    <div class="row">        
                        <div class="col-sm-6"><input type="text" placeholder="*Email" name="email"></div>
                        <div class="col-sm-6"><input type="text" placeholder="*Telephone" name="telephone"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"><input type="text" placeholder="*Address1" name="address1"></div>
                        <div class="col-sm-6"><input type="text" placeholder="*Address2" name="address2"></div>
                    </div>
                    <div class="row">        
                        <div class="col-sm-6"><input type="text" placeholder="*City" name="city"></div>
                        <div class="col-sm-6"><input type="text" placeholder="*Postal Code" name="postalcode"></div>
                    </div>
                    <div class="row">        
                        <div class="col-sm-6" >
                            <select name="regcountry" onChange="getSub(this.value)">
                                <option> --Select Country --</option>
                                <?php
                                $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
                                $sql = "SELECT * FROM country ";
                                $result = mysqli_query($mysqli, $sql) or die(mysqli_error());


                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['cid']; ?>"><?php echo $row['c_name']; ?></option>

                                <?php }
                                ?>
                            </select>

                        </div>
                        <div class="col-sm-6" >
                            <div id="statediv"><select name='regstate' >
                                    <option>--Select State--</option>
                                </select>
                            </div>

                        </div>


                    </div>




            </div>

            <div class="regdetails mt40">
                <h4>Your Business Information</h4>

                <div class="row">
                    <div class="col-sm-6"><input type="text" placeholder="*Company Name" name="companyname"></div>
                    <div class="col-sm-6"><select name='ctype'>
                            <option>Company Type</option>
                            <option>Public</option>
                            <option>Private</option>
                        </select></div>
                </div>
                <div class="row">        
                    <div class="col-sm-6"><input type="text" placeholder="*Company Email" name="cemail"></div>
                    <div class="col-sm-6"><input type="text" placeholder="*Company Telephone" name="ctelephone"></div>
                </div>
                <div class="row">        
                    <div class="col-sm-6"><input type="text" placeholder="*Company Fax" name="cfax"></div>
                    <div class="col-sm-6"><input type="text" placeholder="*Company Website" name="cwebsite"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><input type="text" placeholder="*Address1" name="caddress1"></div>
                    <div class="col-sm-6"><input type="text" placeholder="*Address2" name="caddress2"></div>
                </div>
                <div class="row">        
                    <div class="col-sm-6"><input type="text" placeholder="*City" name="ccity"></div>
                    <div class="col-sm-6"><input type="text" placeholder="*Postal Code" name="cpostalcode"></div>
                </div>
                <div class="row">        
                    <div class="col-sm-6"><select name="cregcountry" onChange="getSub2(this.value)">
                            <option> --Select Country --</option>
                            <?php
                            $mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
                            $sql = "SELECT * FROM country ";
                            $result = mysqli_query($mysqli, $sql) or die(mysqli_error());


                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['cid']; ?>"><?php echo $row['c_name']; ?></option>

                            <?php }
                            ?>
                        </select></div>
                    <div class="col-sm-6">


                        <div id="statediv2"><select name="cregstate" >
                                <option>--Select State--</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="vid" value="<?php echo $id; ?>" >
                <div class="mt15">
                    <input id="rememberme" type="checkbox" value="yes" name="rememberme">
                    <label for="rememberme">*I Agree All Terms and Conditions</label>
                </div>
                <div class="clearfix"></div>
                <input type="submit" name="submit"  value="save and proceed" class="button row"> 
                </form>
            </div>

        </div>
        <div class="col-md-3 registration-right regdetails_right mt30 pd0">
            <img src="images/register_rightimg.jpg"> 
            <div class="view text-center">
                <h3>Are you Vendor? </h3>
                <a href="#" class="blu-btn bton ">Login Here</a>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div>
       
        <!-- End Steps --->    


        <?php include 'footer.php'; ?>