<?php include('t_msg.html');


    <?php 

    defined('_JEXEC') OR defined('_VALID_MOS') OR die( "Direct Access Is Not Allowed" );?>


    <?php
    //echo "<br><br><br>User: ";

    $jAp= & JFactory::getApplication();
    $user =& JFactory::getUser();
    $usr_id = $user->get('id');
    $usr_name = $user->get('name');
    $email_id = $user->get('email');
    //echo " User: $usr_id";
    //echo " User: $email_id";

    ?>


    <html>
    <head>
    <!-- Javascript goes in the document HEAD -->
    <script type="text/javascript">
    function altRows(id){
        if(document.getElementsByTagName){  

            var table = document.getElementById(id);  
            var rows = table.getElementsByTagName("tr"); 

            for(i = 0; i < rows.length; i++){          
                if(i % 2 == 0){
                    rows[i].className = "evenrowcolor";
                }else{
                    rows[i].className = "oddrowcolor";
                }      
            }
        }
    }
    window.onload=function(){
        altRows('alternatecolor');
    }
    </script>

    <!-- CSS goes in the document HEAD or added to your external stylesheet -->
    <style type="text/css">
    .CSSTableGenerator {
        margin:0px;padding:0px;
        width:100%;
        box-shadow: 10px 10px 5px #888888;
        border:1px solid #000000;

        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;

        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;

        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;

        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }.CSSTableGenerator table{
        width:100%;
        height:100%;
        margin:0px;padding:0px;
    }.CSSTableGenerator tr:last-child td:last-child {
        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;
    }
    .CSSTableGenerator table tr:first-child td:first-child {
        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }

    .CSSTableGenerator table th {
        background:#0057af url('cell-blue.jpg');
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
    font-size:10px;
        font-family:Arial;
        font-weight:normal;
        color:#FFFFFF;
    }
    .CSSTableGenerator table tr:first-child td:last-child {
        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;
    }.CSSTableGenerator tr:last-child td:first-child{
        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;
    }.CSSTableGenerator tr:hover td{

    }
    .CSSTableGenerator tr:nth-child(odd){ background-color:#aad4ff; }
    .CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
        vertical-align:middle;


        border:1px solid #000000;
        border-width:0px 1px 1px 0px;
        text-align:left;
        padding:7px;
        font-size:10px;
        font-family:Arial;
        font-weight:normal;
        color:#000000;
    }.CSSTableGenerator tr:last-child td{
        border-width:0px 1px 0px 0px;
    }.CSSTableGenerator tr td:last-child{
        border-width:0px 0px 1px 0px;
    }.CSSTableGenerator tr:last-child td:last-child{
        border-width:0px 0px 0px 0px;
    }
    .CSSTableGenerator th:first-child td{
            background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
        background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");  background: -o-linear-gradient(top,#005fbf,003f7f);

        background-color:#005fbf;
        border:0px solid #000000;
        text-align:center;
        border-width:0px 0px 1px 1px;
        font-size:14px;
        font-family:Arial;
        font-weight:bold;
        color:#ffffff;
    }
    .CSSTableGenerator tr:first-child:hover td{
        background:-o-linear-gradient(bottom, #005fbf 5%, #003f7f 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #005fbf), color-stop(1, #003f7f) );
        background:-moz-linear-gradient( center top, #005fbf 5%, #003f7f 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#005fbf", endColorstr="#003f7f");  background: -o-linear-gradient(top,#005fbf,003f7f);

        background-color:#005fbf;
    }
    .CSSTableGenerator tr:first-child td:first-child{
        border-width:0px 0px 1px 0px;
    }
    .CSSTableGenerator tr:first-child td:last-child{
        border-width:0px 0px 1px 1px;
    }
    </style>

    </head>
    <div class="products_look">
        <input type="button" class="view_list" onclick="location.reload() = '/index.php?option=com_aclsfgpl&md=check2'" value="List" />
        <input type="button" class="view_grid" onclick="location.reload() = '/ndex.php?option=com_aclsfgpl&md=check3'" value="Grid" />



    <div class="CSSTableGenerator" >
    <table border="2"  class="altrowstable" id="alternatecolor">
        <tr>

            <th>Value</th>
            <th>Title</th>
            <th>Zipcode</th>
            <th>Item #</th>
                 <th>Image</th>
            <th>Details</th>
        </tr>

    </html>
    
    <?php
    $r = NULL;
    $z = NULL;
    $stores = NULL;
    $Errors = NULL;

    function Dist ($lat_A, $long_A, $lat_B, $long_B) {

      $distance = sin(deg2rad($lat_A))
          * sin(deg2rad($lat_B))
          + cos(deg2rad($lat_A))
          * cos(deg2rad($lat_B))
          * cos(deg2rad($long_A - $long_B));

      $distance = (rad2deg(acos($distance))) * 69.09;
      return $distance;


    }

    //if (isset ($_POST['submitted'])) {

      // Validate Zip code field
      if (!empty ($_POST['zipcode']) && is_numeric ($_POST['zipcode'])) {

        $z = (int)$_POST['zipcode'];
     //echo "zip=$z";
        // Verify zip code exists

        $query = "SELECT latitude, longitude FROM php_zip_code_distance WHERE postal= '$z'";
        $result = mysql_query ($query);

        if (mysql_num_rows ($result) == 1) {
          $zip = mysql_fetch_assoc ($result);
        } else {
          $Errors = '<p>The zip code you entered was not found!</p>';
          $z = NULL;
        }
     if (isset ($_POST['radius']) && is_numeric ($_POST['radius'])) {
        $r = (int)$_POST['radius'];
    //echo "r=$r";
      }


    $dbc = mysql_connect() or die (mysql_error

    ());
    mysql_select_db ();





    mysql_query("set sql_big_selects=1");
       //$stores = array();
        //$query = "SELECT catname, email, contact_name, zipcode, idnum,brief, name, title, latitude, longitude

      // INNER JOIN php_zip_code_distance
      // ON jml_aclsfgplt.zipcode = php_zip_code_distance.postal
    // WHERE $criteria";  
      //  $result = mysql_query ($query) or trigger_error(mysql_error()." in ".$query);;

        // Go through and check all stores
       // while ($row = mysql_fetch_assoc ($result)) {

          // Separate closest stores
     //     $distance = Dist ($row['latitude'], $row['longitude'], $zip['latitude'], $zip['longitude']);

          // Check if store is in radius
        //  if ($distance <= $r) {

          //  $stores[] = array (
    $query="select * from   where adphotos='yes'";
    $array = array();
    $result = mysql_query($query) or die("Couldn't execute query\"$query\" Error:" . mysql_error()); 
    //$i=0;
    //while ($i < $num)

     //while($row=mysql_fetch_array($result)){

       // 

      foreach (glob("/components/com_aclsfgpl/photos/*.{jpg,gif,png}",GLOB_BRACE) as $pathToThumb)
    {
    $start = '33';
    $end='-6';
    $counter = 0; 
        $filename = basename($pathToThumb);
    $info = pathinfo($filename);
    //echo "2) ".basename($pathToThumb,'.'.$info['extension']);
    //echo "1) ".basename($pathToThumb, ".jpg").PHP_EOL;
        $pathToLarge = '/components/com_aclsfgpl/photos/'.$filename;
         //echo ("<div class='thumbnail'><a href='$pathToLarge'><img src='$pathToLarge' width='100' height = '100'/></a></div>");
    $substring= substr($pathToLarge, $start, $end)."<br />";

    $start2 = '11';
    $end2='-4';
    $substring2=substr($pathToLarge, $start2, $end2)."<br />";
    $arr2=array($substring2);
    //var_dump($arr2);
     //print $substring;
       //$arr=array($substring);
    $arr=array($substring);
    $arr1=array($filename);
    //echo "Intersect:$intersect"."<br />";

    //var_dump($arr);

    $counter++;

    $tempimage="( CREATE TEMPORARY TABLE images(
         image VARCHAR(10),
         substring VARCHAR(10) ))";  

    mysql_query($tempimage);  

    foreach ($arr as $key => $val) {
    foreach ($arr1 as $key => $val1) {
    //echo "$key - <strong>$val</strong> <br />";
    //echo "$key - <strong>$val1</strong> <br />";
    $insert=" INSERT INTO images('image','substring')VALUES ($val,$val1)";
    mysql_query($insert); 

    $show_image= ("SELECT * FROM images");
    $result1=mysql_query($show_image);
    while($row=mysql_fetch_array($result1)){
    $image= $row['image'];
    $sub=$row['substring'];
    //echo $image;
    //echo $substring;




    }

    }}}

    $maketemp="create temporary table tmp_questions like  jml_aclsfgplt";
    mysql_query($maketemp) or die ("Sql error : ".mysql_error());

    $minprice = $_POST['minPrice']  ;
      $maxprice =$_POST['MaxPrice'] ;

     $inserttemp = "INSERT INTO tmp_questions SELECT * FROM  WHERE price BETWEEN  $minprice AND  $maxprice "; 



    mysql_query($inserttemp) or die("Couldn't execute query\"$inserttemp\" Error:" . mysql_error());


    if(isset($_POST['categories']) && !empty($_POST['categories'])){ 
      foreach($_POST['categories'] as $key=>$value){ 
      if($value==1) $criteria_value[] = "$key"; 
        } 
        $criteria_value = implode(' || ', $criteria_value ); 
    } 


    //echo $criteria_value;
     $zipcode=(int)$_POST['zipcode'];
    //echo $zipcode;
     $radius=(int)$_POST['radius'];
     $minprice=$_POST['minPrice'];
     $maxprice=$_POST['MaxPrice'];
    //$mach1=$_POST['categories'];
    //$tstring = implode('||' ,$_POST['checklist']); 
    //$pieces = implode('||' ,$_POST['mach1']);
     //$search=$POST[search];
     $sql="INSERT INTO search (zipcode,distance,min,max,mach1,id,email,date) VALUES('$zipcode','$radius','$minprice','$maxprice','$criteria_value','$usr_id','$email_id',NOW())";
     mysql_query($sql);
    //}
    //$limit = (int)$_GET["price"];




    $query = "select * from tmp_questions  ";

    $result = mysql_query($query) or die("Couldn't execute query\"$query\" Error:" . mysql_error());  
    while ($row = mysql_fetch_assoc($result)) {
       //echo "<div>".$row['title']."</div>";

    } 
    //echo $result;
     //$num=mysql_numrows($result);

    //echo "Num: $num";
    if(isset($_POST['categories']) && !empty($_POST['categories'])){ 
      foreach($_POST['categories'] as $key=>$value){ 
    if($value==1) $criteria[] = "`catname`='".mysql_escape_string($key)."'"; 
        } 
        $criteria = implode(' OR ', $criteria); 
    } 




    //$start = ($page-1)*$per_page;
    $sql_query1= "SELECT * FROM tmp_questions WHERE $criteria"; 
    $sql_res1=mysql_query("$sql_query1");
    //echo "minPrice:$minPrice";
    //echo "maxPrice:$MaxPrice";
    //while($row=mysql_fetch_assoc($sql_res1)){

    $array = array();
    $result=mysql_query("SELECT DISTINCT(category) FROM Common");
    while($row = mysql_fetch_array($result)){
    $data=$row['category'];
    $data1=$row['value'];

    $array[] = $row['category'];

    echo $data1;
    //echo $data;
    }


    $sql_query1="select * from $table_ads  where idnum='$ITEM_NUM'";
    $sql_res1=mysql_query("$sql_query1");
    $row1 = mysql_fetch_array ($sql_res1);
    $price1=$row1['price']; 
    $mach1=$row1['mach1'];
    //echo "price:$price1";

    $pieces = explode("||", $mach1);

    $result1 = array_intersect($array,$pieces);

    foreach ($result1 as $key => $value) {
           //echo "<strong>$value</strong> <br />"; 

    $result3 = ("SELECT DISTINCT(value) FROM Common WHERE category IN ('$value')");

    $values=array_values($array);

    $result4=mysql_query("$result3");


        while (($row = mysql_fetch_array($result4)) != NULL)
    {

    $cat=$row['value'];

    //echo "<tr class=''>";



    //echo "<td>$cat</td>";

    $Image = $row["Images"];
    //echo $Image;
    $url="http://".$Image;

    }



    $maketemp1="create temporary table tmp_questions1 like   jml_aclsfgplt ";
    mysql_query($maketemp1) or die ("Sql error : ".mysql_error());


    $inserttemp = "INSERT INTO tmp_questions1 SELECT * FROM tmp_questions WHERE $criteria "; 

    mysql_query($inserttemp) or die("Couldn't execute query\"$inserttemp\" Error:" . mysql_error());

    mysql_query("set sql_big_selects=1");
       $stores = array();
        $query = "SELECT catname, price,email,adphotos,contact_name, zipcode, postal,idnum,brief, title, latitude, longitude
       FROM tmp_questions1
       INNER JOIN php_zip_code_distance
       ON tmp_questions1.zipcode = php_zip_code_distance.postal";
    //WHERE catname LIKE '%" . $_POST['category'] . "' ";  


        $result = mysql_query ($query) or trigger_error(mysql_error()." in ".$query);;

    while($row=mysql_fetch_assoc($result)){




    $distance = Dist ($row['latitude'], $row['longitude'], $zip['latitude'], $zip['longitude']);
    if ($distance <= $r) {
    $LAT=$row['latitude'];
    $LONG=$row['longitude'];
    $id_contactname=$row['contact_name']; 
    $CATNAME=$row['catname'];
    $PRICE=$row['price'];
    $TITLE=$row['title'];
    $zipcode=$row['zipcode'];
    $ITEM_NUM=$row['idnum'];
    $adphoto=$row['adphotos'];

    $details= "<a href='/index.php?option=com_aclsfgpl&Itemid=&ct1=&ct=&md=details&id=

    $ITEM_NUM'>Click for Item Details</a><br/>";

    if($adphoto =="yes")
     {

    $imagepath1= "p".$ITEM_NUM."n1.jpg";
    $path='/components/com_aclsfgpl/photos/'.$imagepath1;

    $image1=("<div class='thumbnail'><a href='$path'><img src='$path' width='100' height = '100' alt = 'No Images Posted' onerror='this.parentNode.removeChild(this)' /></a></div>");
    }
    else
    {
    $image1="Image is Pending";
    }

    //echo "<td>$val</td>";

    //$cats= "<a href='http://localhost/index.php?option=com_aclsfgpl&Itemid=$ITEM_NUM&ct1=&ct=&md=show_cat&id=
                        //      echo "<td>$LAT</td>";
                //echo "<td>$LONG</td>";
                //echo "<td>$CATNAME</td>";
                echo "<td>$$PRICE</td>";
     echo "<td>$TITLE</td>";
     echo "<td>$zipcode</td>";
     echo "<td>$ITEM_NUM</td>";
    echo "<td>$image1</td>";
     echo "<td>$details</td>";
     //echo "<td>$cont_email</td>";

                echo "</tr>";

          echo "<tr class=''>";

    }}
    $drop= "DROP table tmp_questions1";
    mysql_query("$drop");
   }




    ?>
    </div>
    </div>