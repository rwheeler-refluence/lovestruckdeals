<?php
$con = mysql_connect('localhost', 'root', 'tomorrow15');
mysql_select_db("xaazaweb", $con);
$q=$_GET["q"];
 
$sql="SELECT * FROM city WHERE sid ='$q'";
 
$result = mysql_query($sql);
 
 
 
echo " <div class='col-sm-3'>Your City </div> <select >";
while($row = mysql_fetch_array($result))
{
echo "<option>" . $row['cityName'] . "</option>";
}
echo "</select>";
 
mysql_close($con);
?>