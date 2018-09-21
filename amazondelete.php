
<!DOCTYPE html>
<html>
<head></head>
<body>
 <?php
session_start();



$data = json_decode(file_get_contents("php://input"));


$amazon=$data->a2mazon;

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



$sql = "DELETE FROM cart WHERE PRODUCT='$amazon';";

if ($conn->query($sql) === TRUE) {
    
}  else {

}

$ui= 0;

$sq = "UPDATE products SET DUMMYQUANTITY = '$ui' WHERE PRODUCT = '$amazon'";

if ($conn->query($sq) === TRUE) {

} else {
    echo "Error: " . $sq . "<br>" . $conn-> error;
  }
  

$conn->close();
?>
</body>
</html>
