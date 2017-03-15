<?php
include '../config.php';

$username = $_REQUEST['username'];
$message = $_REQUEST['message'];

$query = "INSERT INTO chat (username,message)VALUES ('".$username."' '".$message."')";
$result = mysqli_query("SELECT * FROM chat ORDER by DESC");

while($extract = mysqli_fetch_array($result))
{
    
    echo $extract['username'] . ":" .$extract['message'] . "<br>";
}


?>

