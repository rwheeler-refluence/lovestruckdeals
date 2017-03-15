<?php

	$hostname = "localhost";
	$username = "livemysi_xaaza";
	$password = "n8viiA(liqof";
	$database = "livemysi_xaaza";


	 $conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
	mysql_select_db("$database", $conn) or die(mysql_error());

?>