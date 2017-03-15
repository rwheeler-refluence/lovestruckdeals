<?php
include 'config.php';
$sqli = "SELECT advDisplayDate,advExpiryDate FROM advertise where advId='46' ";
$result = $mysqli->query($sqli);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "advDisplayDate: " . $row["advDisplayDate"]. " - advExpiryDate: " . $row["advExpiryDate"]. "<br>";
    }
} else {
    echo "0 results";
}
$diff=date_diff($advDisplayDate,$advExpiryDate);
echo "date difference :" .$diff."<br>";
?>