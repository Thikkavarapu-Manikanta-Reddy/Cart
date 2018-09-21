
<!DOCTYPE html>
<html>
<head></head>
<body>
 <?php
session_start();


$data = json_decode(file_get_contents("php://input"));


$usernam=$data->username123;
$passwor=$data->password123;

$_SESSION["user1"] = $usernam;
$_SESSION["man"] = 1;

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

//$data123 = array();


$sql = "INSERT INTO login(USERNAME,PASSWORD) VALUES('$usernam','$passwor')";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn-> error;
}

$conn->close();
?>
</body>
</html>
