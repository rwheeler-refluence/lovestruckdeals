
<?php
$servername = "localhost";
$username = "root";
$password = "tomorrow15";
$dbname = "xaazaweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$date1=date_create("advDisplayDate");
$date2=date_create("advExpiryDate");
$diff=date_diff($date1,$date2);

$sql = "SELECT * FROM advertise" and "select from advertise where $diff='advCount'";
echo $diff;


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["advId"]."<br>".$row["advType"]."<br>". $row["advDisplayDate"]."<br>".$row["advExpiryDate"]."<br>".$row["advCount"]."<br>". $row["advTittle"]."<br>".$row["advSponser"]."<br>".$row["advPossition"]."<br>". $row["advImage"]."<br>".$row["advUrl"]."<br>".$row["advType"]."<br>". $row["advPageOpen"]."<br>".$row["advCode"]."<br>".$row["advAddDate"]."<br>". $row["advModDate"]."<br>".$row["advStatus"]."<br>".$row["advAdminStatus"] ;
    }
} else {
    echo "0 results";
}
$conn->close();
?> 