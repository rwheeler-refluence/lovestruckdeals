<?php
$mysqli = mysqli_connect('localhost', 'lovestrucklive', 'eRp?zP+%{rnE', 'lovestruckdeals'); 

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  define("ROOT_PATH", "https://www.lovestruckdeals.com/");

  ?> 