<!--Rahul-->
<?php
@session_start();

if (empty($_SESSION["name"])) 
    {
        require_once("index.php");
    } 
    else 
    {
        include './vendor_sidebar.php';    
        include './validation_vendor.php';
        include '../config.php';
        if (isset($_POST['submit'])) 
        {   
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];            
            $vid = $row1['vendor_id'];
            $sql3 = "update vendor_details  set fname='".$fname."', lname='".$lname."' where vendor_id='" . $_SESSION['vendor_id'] . "'";
            $result3 = mysqli_query($mysqli,$sql3);            
    }
    if (!empty($_SESSION['name'])) 
    {

    $s = $_SESSION['name'];      
    $sql = "SELECT * FROM vendor_details where vendor_id='".$_SESSION['vendor_id']."' ";
    $addresult1 = mysqli_query($mysqli, $sql) or die(mysqli_error());
    $row1 = mysqli_fetch_array($addresult1);   
    $vid = $row1[' vendor_id'];
    ?>

    <!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Xaaza</title>

            <link type="text/css" href="css/style.css" rel="stylesheet"/>
            <!--<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">-->
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <script>

                $(document).ready(function () {
                    submit_form();
                });

                function submit_form() {
                    $.post('personal-information.php', $("#personalinfo").serialize(), function (data) {
                        $('#results').html(data);
                    });
                }

                
                </script>
                 <script>
 
function showUser(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}
 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
 
 
 
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","fetch_status.php?q="+str,true);
xmlhttp.send();
}
</script>
 <script type="text/javascript">
function mask(e,f){
	var len = f.value.length;
	var key = whichKey(e);
	if(key>47 && key<58)
	{
		if( len==3 )f.value=f.value
		else if(len==7 )f.value=f.value+'-'
		else f.value=f.value;
	}
	else{
		f.value = f.value.replace(/[^0-9-]/,'')
		f.value = f.value.replace('--','-')
	}
}
 
function whichKey(e) {
	var code;
	if (!e) var e = window.event;
	if (e.keyCode) code = e.keyCode;
	else if (e.which) code = e.which;
	return code
//	return String.fromCharCode(code);
}
 
</script>

</script>
<script language="Javascript" type="text/javascript">
 
        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
 
    </script>   



                
        </head>          
            <section>
                <div class="search">
                    <i class="search-bar"></i>
                    <input type="search" placeholder="Search" class="monts">
                </div>
                <div class="profile_tab">
                
                <a href="personal-information.php"><b><u class="active">Personal-Information</u></b></a>&nbsp;&nbsp;
                <a href="business-information.php"><b><u>Business-Information</u></b></a>&nbsp;&nbsp;
                <a href="bussiness-details.php"><b><u>Business-Details</u></b></a>&nbsp;&nbsp;
                <a href="bussiness-requirements.php"><b><u>Business-Requirements</u></b></a>&nbsp;&nbsp;
                <a href="manageprofile.php"><b><u>Vendor-Users</u></b></a>
                 
                 </div>                                        
                <font class="prof_title"><h2> Manage your Personal information </h2></font>
                <?php
                //$id = $_GET['id']; 
                $vid = $row1['vendor_id'];
                $add = "SELECT  fname,lname FROM vendor_details WHERE vendor_id = $vid";
                $addresult = mysqli_query($mysqli, $add) or die(mysqli_error());
                $row = mysqli_fetch_array($addresult);              

                //$mysqli = mysqli_connect('localhost', 'root', 'tomorrow15', 'xaazaweb');
                //$mysqli = mysqli_connect('localhost', 'livemysi_xaaza', 'n8viiA(liqof', 'livemysi_xaaza');
                ?>

                <form id="defaultForm" method="post" name="personalinfo" class="form-horizontal" action="personal-information.php" onsubmit="return validatePersonalInfo()">
                    <div class="views">                    
                        <div class="form-group">
                            <div class="col-sm-3">
                                <span>First Name : </span>
                            </div>

                            <div class="col-sm-8">
                                <input type="text"  size="40" value="<?php echo $row['fname']; ?>" name="firstname"  id="txtFname">
                                <div id="fname_error" style="display:none"class="error_msg" ><font color="red"> Please enter your first name</font></div>
                                <div id="fname_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid first name</font></div>
                            </div>
                        </div>            

                        <div class="form-group">
                            <div class="col-sm-3">
                                <span>Last Name : </span>                   
                            </div>

                            <div class="col-sm-8">
                                <input type="text"  size="40" value="<?php echo $row['lname']; ?>" name="lastname"  id="txtLname">
                                <div id="lname_error" style="display:none"class="error_msg" ><font color="red"> Please enter your Last name</font></div>
                                <div id="lname_error1" style="display:none"class="error_msg" ><font color="red"> Please enter a valid Last name</font></div>
                            </div>
                        </div>  

                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <input type="submit" value="Update"   name="submit" >    
                        <a href="dashboard.php" ><input type="Button" value="Back"> </a>
                    </div>
                </form>
            </section>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.js"></script>
        </body>
    </html>

    <?php
}

}
?>

<!--endRahul>