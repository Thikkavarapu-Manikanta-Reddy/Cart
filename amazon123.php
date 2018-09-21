
<!DOCTYPE html>
<html>
<head></head>
<body>
 <?php
session_start();



$data = json_decode(file_get_contents("php://input"));


$amazon=$data->a1mazon;

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

$mani = 0;

$sql = "SELECT DUMMYQUANTITY,QUANTITY FROM products WHERE  PRODUCT ='$amazon'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc())
{
	if($row['DUMMYQUANTITY'] < $row['QUANTITY'])
	{
		$row['DUMMYQUANTITY'] = $row['DUMMYQUANTITY'] + 1;
	$sqal = "UPDATE products SET DUMMYQUANTITY = '$row[DUMMYQUANTITY]' WHERE PRODUCT = '$amazon'";
	if ($conn->query($sqal) === TRUE) {

} else {
    echo "Error: " . $sqal . "<br>" . $conn-> error;
}
	}
	else
	{
		$mani = 100;
		$_SESSION["man"] = $mani;
	}
	

}

}
else
{

}


$sql = "SELECT * FROM products WHERE  PRODUCT ='$amazon'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc())
{
	if($mani == 0)
	{
	if($row['DUMMYQUANTITY'] == 1)
	{
		 $x=$row['PRICE'] * $row['DUMMYQUANTITY'];
    	$sq = "INSERT INTO cart(PRODUCT,PRICE,QUANTITY,TOTAL) VALUES('$row[PRODUCT]','$row[PRICE]','$row[DUMMYQUANTITY]','$x')";
	}
	else
	{
			$x=$row['PRICE'] * $row['DUMMYQUANTITY'];
    		$sq = "UPDATE cart SET QUANTITY = '$row[DUMMYQUANTITY]',TOTAL = '$x' WHERE PRODUCT = '$amazon'";
	}
}
else
{
		header('Content-Type: application/json');
		echo json_encode($mani);
	//$message = "wrong answer";
	//echo "<script type='text/javascript'>alert('$message');</script>";
}
   

if ($conn->query($sq) === TRUE) {

} else {
    echo "Error: " . $sq . "<br>" . $conn-> error;
  }

}
}
else
{

}


$conn->close();
?>
</body>
</html>
