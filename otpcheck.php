<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angular";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn-> connect_error) {
    die("Connection failed: " . $conn-> connect_error);
} 

$_SESSION["quantity"] = 0;

$sql = "SELECT OTP FROM pin";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())
{
   $data123 = $row['OTP'];
}
}
else {
	echo "404 Something Wrong";
}
header('Content-Type: application/json');
echo json_encode($data123);

$conn->close();
?>
