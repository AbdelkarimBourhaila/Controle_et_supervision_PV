<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT LED_01, LED_02 FROM controle_pv_finale ORDER BY date_time DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["LED_01"] . $row["LED_02"];
} else {
    echo "00"; // Assuming both LEDs are off by default
}

$conn->close();
?>