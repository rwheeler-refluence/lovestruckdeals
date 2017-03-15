<style>
    a, a h1{
        font-family: Georgia, "Times New Roman", Times, serif;
        font-size: 1.2em;
        color: #645348;
        /*font-style: italic;*/
        text-decoration: none;
        font-weight: 100;
        padding: 10px;
    }
    body{

        font: 12px Arial,Tahoma,Helvetica,FreeSans,sans-serif;
        text-transform: inherit;
        color: #582A00;
        background: #E7EDEE;
        width: 100%;
        margin: 0;
        padding: 0;
    }
    .wrap{
        width: 700px;
        margin: 10px auto;
        padding: 10px 15px;
        background: white;
        border: 2px solid #DBDBDB;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align: center;
        overflow: hidden;
    }
    img#uploadPreview{
        border: 0;
        border-radius: 3px;
        -webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
        box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
        margin-bottom: 30px;
        overflow: hidden;
    }
    /*input[type="submit"]{
            /*border-radius: 10px;
            background-color: #61B3DE;
            border: 0;
            color: white;
            font-weight:normal;
            /*font-style: italic;
            padding: 6px 15px 5px;
            cursor: pointer;
    }*/
</style>  
<?php
    @session_start();
    if (empty($_SESSION["name"])) 
    {
?>        
       <SCRIPT LANGUAGE='JavaScript'>                   
          window.location.href='../index.php'
     </SCRIPT>
<?php     
    } 
    else 
    {
        include './vendor_sidebar.php';
        include '../config.php';  
                                                  
        //$advid=$_POST['advid']; 
        $vendorid=$_POST['venderid'];
        $vendorname=$_POST['username'];
        $categoryid=$_POST['categoryid'];        
        //$image=$_GET['image'];        
        $description=$_POST['description'];
        $dealtitle=$_POST['dealtitle'];
        $stateid=$_POST['stateid'];
        $cityid=$_POST['cityid'];
        
        //--------------------------------------Images------------------------------//
        ini_set('memory_limit', '-1');
        $image = imagecreatefromstring(file_get_contents($_FILES['image']['tmp_name']));
        $exif = exif_read_data($_FILES['image']['tmp_name']);
        if (!empty($exif['Orientation'])) {
            switch ($exif['Orientation']) {
                case 8:
                    ini_set('memory_limit', '-1');
                    $image = imagerotate($image, 90, 0);
                    break;
                case 3:
                    ini_set('memory_limit', '-1');
                    $image = imagerotate($image, 180, 0);
                    break;
                case 6:
                    ini_set('memory_limit', '-1');
                    $image = imagerotate($image, -90, 0);
                    break;
            }
            imagejpeg($image, $_FILES['image']['tmp_name']);
        }
        $target_path1 = "images/";
        $image = rand(1000, 100000) . "-" . $_FILES['image']['name'];
        $target_path = $target_path1 . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);


//------------------------------------------End Images-------------------------------//
        
        
        //$latitude=$_GET['latitude'];
        //$longitude=$_GET['longitude'];        
        $isdelete='1'; 
        $likes=='0';
        $current_date= date("Y-m-d");  
                            
        if (!empty($_SESSION['name'])) 
        {
            
            $sessionSql = "SELECT c.categoryName,c.categoryId,vd.vendor_id,vd.fname,vd.c_city,vd.c_regionstate
                            FROM  `vendor_details` vd, category c
                            WHERE vd.`b_type` = c.categoryId
                            AND vd.`vendor_id`='" . $_SESSION['vendor_id'] . "'";
            $sessionQuery = mysqli_query($mysqli, $sessionSql);
            $sessRow = mysqli_fetch_array($sessionQuery);

            
            $venderID = $sessRow['vendor_id'];
            $state = $sessRow['c_regionstate'];
            $city = $sessRow['c_city'];
            $fname = $sessRow['fname'];
            $categoryName = $sessRow['categoryName'];
            $categoryId = $sessRow['categoryId'];        
        } 
        $sqldealpackspolight="select spotlightmonth,spotlightamount from dealpack";
        $resultdealpackspolight = mysqli_query($mysqli, $sqldealpackspolight);
        $rowdealpackspolight = mysqli_fetch_array($resultdealpackspolight)
        
        
?>           
      <!--  <link rel="stylesheet" type="text/css" href="css/style.css"/>-->
        
        <head>
        <link rel="stylesheet" type="text/css" href="css/build.css"/>  
         <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/> 
        
        </head>
      <!--  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->

        <body>
            <section>
                <div class="col-md-12 pd0">
                    
                    <!--<div class="search">
                        <i class="search-bar"></i>
                        <input type="search" placeholder="Search" class="monts">
                    </div>-->
                    
                    <font class="prof_title"><h2>Deal Plans</h2></font>                     
                        <div class="views">	                                                                                                                                                                                                                        
                            <div class="form-group">                                          
                                <?php                                        
                                    $sqldealpack="select month,amount,spotlightamount from dealpack";
                                    $resultdealpack = mysqli_query($mysqli, $sqldealpack);
                                    while ($rowdealpack = mysqli_fetch_array($resultdealpack)) 
                                    {
                                        //$month=$rowdealpack['month'];                                                                                                                                                
                                ?>
                                        <div class="view_plan">
                                            <button type="button" class="month" featureAmout="<?php echo $rowdealpack['amount']; ?>"  amout="<?php echo $rowdealpack['spotlightamount']; ?>" id="<?php echo $rowdealpack['month']; ?>" data-target="#myModal_<?php echo $rowdealpack['month']; ?>"  data-toggle="modal" >                                                       
                                              <?php echo $rowdealpack['month']; ?>                                               
                                                Month 
                                                </br>
                                                $<?php echo $rowdealpack['amount']; ?>
                                            </button>
                                        </div>       
                                        
                                <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="form-group">
                                <a href="adddeals.php" class="pull-right"><input type="button" value="Back"> </a>                                           
                            </div>
                                    
                                    
                         <div>
                                <!-- popup -->
                                <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><!--&times;-->x</button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            
                                            <span>Would you like to make your deal spotlight ?</span>
                                            <h4 class="modal-title">BENEFITS</h4>
                                            <p>TOP CATEGORY AD </br>
                                                INCLUDED IN ALL FILTERED RESULTS</br>
                                                EXCLUSIVE LIMITED AVAILABILITY
                                            </p>

                                        </div>
                                                                                                                                                                                                  
                                        <div class="modal-footer">
                                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->

                                            <div class="radio radio-danger">
                                                <input type="radio" name="radio2" id="radio3" value="option1">

                                                <label for="radio3">
                                                    Yes, make my deal spotlight
                                                </label>

                                            </div>

                                            <div class="radio radio-danger">

                                                <input type="radio" name="radio2" id="radio4" value="option2">

                                                <label for="radio4">
                                                    Not today
                                                </label>

                                            </div>
                                        </div>
                                                       
                                        <div style="display:none;" class="subdiv">
                                            <p>You selected: <span>Spotlight Deal</span>
                                            <br/>
                                            <label id="monthval"></label> month plan 
                                                <br/>Total cost:  $<label id="amountval" class="monts"></label></p>
                                            <div class="check_out">
                                                <input name="submit" type="submit" value="CHECK OUT"> <!-- class="chkout"-->
                                            </div>   
                                            <input type="hidden" value="" id="amountdis">
                                            <input type="hidden" value="" id="monthdis">
                                            <input type="hidden" value="" id="amountfeature">
                                        </div>
                                        
                                        <div style="display:none;" class="nosort">                                
                                           <p>Sorry,no spotlight deals are available in your location at this time.</p>                                                                                                                                       
                                        </div>                                                      
                                    </div>
                                </div>
                                <!-- End popup -->    
                            </div>                                                                                                                                                                                      
                        </div>
                </div>                                
                <!-- popup --> 
             
          
<?Php
    }
?>
    <script language="Javascript" type="text/javascript">
               
//        $(document).ready(function ()
 //       {   
            $(".modal-dialog").hide();
            
            $(".close").click(function()
            {
                $(".modal-dialog").hide();
            });
                        
            $("form").submit(function()
            {                
                if($("#addsporlight").val())
                { 
                     var desc = this.id;
                    alert(desc);
                    $("#labelplan").show();
                    $(".view_plan").show();                 
                    $("#addsporlight").hide(); 
                return false;  
                }
            });
            
            $(".month").click(function() 
            {   
                var mnval=$(this).attr('data-target');
                $('#amountval').text($(this).attr('amout'));
                $('#amountdis').val($(this).attr('amout'));
                if(mnval)
                {
                    var disval=$(this).attr('id');
                    $('#monthval').text(disval);
                    $('#monthdis').val(disval);
                }
                $(".modal-dialog").show();
                $(".nosort").hide();
                $(".subdiv").hide();                    
                
                var month=this.id;
                var amount=$(this).attr("featureAmout"); 
                var vendorid='<?php echo $vendorid; ?>';
                var vendorname='<?php echo $vendorname; ?>';
                var categoryid='<?php echo $categoryid; ?>';
                var image='<?php echo $image; ?>';
                var description='<?php echo $description; ?>';
                var dealtitle='<?php echo $dealtitle; ?>';
                var stateid='<?php echo $stateid; ?>';
                var cityid='<?php echo $cityid; ?>'; 
                var latitude='<?php echo $latitude; ?>'; 
                var longitude='<?php echo $longitude; ?>'; 
        
                //$( "#newDialog-form" ).empty();
                
                $("#radio4").click(function()
                {                                                                           
                    window.location.href="confirm_payment.php?month=" +month+"&Price="+amount+"&vendorid="+vendorid+"&vendorname="+vendorname+"&categoryid="+categoryid+"&image="+image+"&description="+description+"&dealtitle="+dealtitle+"&stateid="+stateid+"&cityid="+cityid+"&latitude="+latitude+"&longitude="+longitude+"&paytype=spotlight";                      
                });   
            }); 
            
            $("#radio3").click(function()
            {                   
                <?php 
                    function dateDiff($start, $end) 
                    {
                        $start_ts = strtotime($start);
                        $end_ts = strtotime($end);
                        $diff = $end_ts - $start_ts;
                        return round($diff / 86400);                                    
                    }
                    $spotlightdealrow="3";
                    $queexpiry="select advertise_id,vendor_id,adv_type,categoryId,advertise_img,sid,cityId,advDisplayDate,advExpiryDate,is_delete,dummyStatus from advertisement where categoryId='".$categoryid."' AND adv_type='SPOTLIGHT' AND  sid='".$stateid."' AND cityId='".$cityid."' AND is_delete='0'";                                     
                    $resultexpiry=mysqli_query($mysqli,$queexpiry); 
                    $row_cnt = mysqli_num_rows($resultexpiry);                                        
                    
                    if($row_cnt=='3')
                    {
                    while( $rowexpiry=  mysqli_fetch_array($resultexpiry))
                    {   
                        $advertiseid= $rowexpiry['advertise_id'];                     
                        $advvendorid= $rowexpiry['vendor_id'];
                        $advDisplayDate=$rowexpiry['advDisplayDate'];
                        $advExpiryDate =$rowexpiry['advExpiryDate'];
                    
                        $systemdate = date("Y-m-d"); 
                    
                        $numberDay= dateDiff($systemdate,$advExpiryDate); 
                                                                                                            
                        if($numberDay<0)
                        {                                                           
                            $queinsertadvertise="update advertisement set lengthofdeal='".$numberDay."' where advertise_id='".$advertiseid."'";
                            $resultupdate=  mysqli_query($mysqli, $queinsertadvertise);                                        
                
                            $myArray[] = $numberDay; 
                    
                            $maximumday= min($myArray); 
                            //echo "<br> MAximum Day <br>=".$maximumday;
                 
                            $sqlreplaceadvertise="select advertise_id from advertisement where lengthofdeal='".$maximumday."' ";
                            $resultreplaceadvertise=  mysqli_query($mysqli, $sqlreplaceadvertise);
                            $rowreplaceadvertise=  mysqli_fetch_array($resultreplaceadvertise);                                                                                                                                                                                   
                        }
                    }
                    
                    if($maximumday<0)
                    {
                   ?>                               
                            $(".subdiv").hide();                             
                            $(".subdiv").show();   
                   <?php
                    }
                    else 
                    {
                    ?>                       
                         $(".nosort").show();                        
                   <?php
                    }
                    }  
                    else 
                    {
                   ?>
                         $(".subdiv").hide();                             
                         $(".subdiv").show();   
                   <?php     
                    }
                    ?>                            
            });                                
                                
            $(".check_out").click(function()
            { 
                
                var advid='<?php echo $rowreplaceadvertise['advertise_id']; ?>';              
                var vendorid='<?php echo $vendorid; ?>';
                var vendorname='<?php echo $vendorname; ?>';
                var categoryid='<?php echo $categoryid; ?>';
                var image='<?php echo $image; ?>';
                var description='<?php echo $description; ?>';
                var dealtitle='<?php echo $dealtitle; ?>';
                var stateid='<?php echo $stateid; ?>';
                var cityid='<?php echo $cityid; ?>';
                var latitude='<?php echo $latitude; ?>'; 
                var longitude='<?php echo $longitude; ?>'; 
                var amount=$('#amountdis').val();
                var month=$('#monthdis').val();
                window.location.href="confirm_payment.php?advid="+advid+'&vendorid='+vendorid+'&vendorname='+vendorname+'&categoryid='+categoryid+'&image='+image+'&description='+description+'&dealtitle='+dealtitle+'&stateid='+stateid+'&cityid='+cityid+"&latitude="+latitude+"&longitude="+longitude+"&month="+month+"&amount="+amount+"&paytype=spotlight";                                                     
            });                                                
//        });                        
    </script>
      </section>
           <script src="js/bootstrap.js"></script>  
            </body>