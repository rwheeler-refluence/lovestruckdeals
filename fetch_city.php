<?php
include './config.php';

$con = mysql_connect('localhost', 'root', 'tomorrow15');
mysql_select_db("xaazaweb", $con);
$q=$_GET["q"];
 
$sql="SELECT * FROM city WHERE sid ='$q'";
 
$result = mysql_query($sql);
 
 
 
echo "Your City <select> name='ccity' id='ccity'";
while($row1 = mysql_fetch_array($result))
{
echo "<option>" . $row1['cityName'] . "</option>";
}
echo "</select>";
 
mysql_close($con);
?>