<style >
 table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    padding:10px;
}

 td,  th {
    border: 1px solid #ddd;
    padding: 10px;
}

 tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {
  background-color: #ddd;
  transform: scale(1.1); 
     box-shadow: 20px 20px 50px grey;
}

 th {
    padding:10px;
    text-align: left;
    background-color:black;
    color: white;
}
th:hover {

      background-color: #DC143C;
      transform: scale(1.1); 
     box-shadow: 20px 20px 50px grey;
}
button#bulge:hover
{
  transform: scale(1.1); 
     box-shadow: 20px 20px 50px grey;
     background-color:#DC143C;
}
button#bulge
{
  transform: scale(1.1); 
     box-shadow: 20px 20px 50px grey;
     background-color: black;
     color: white;
}
 span#cor
  {
    color:green;
  }
  div.lick
{
  color:white;
  background-color:#00BFFF;
  border-radius: 15px;
  margin:  40px 40px 40px 40px;
  padding: 15px;
   box-shadow: 20px 20px 50px grey;
}
</style>
<div class="container-fluid" ng-controller="AppCtrl1 as app">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
      <?php

session_start();
echo $_SESSION["user1"];
echo $_SESSION["man"];

?></div>
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2" ng-init="FAlexa='Amazonalexa'">
    
    
  <button type="button" class="btn btn-info btn-lg"  ng-click = "Amazon1(FAlexa)">Amazon'sAlexa</button>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-2" ng-init="FCortana='Amazoncortana'">
    
  <button type="button" class="btn btn-info btn-lg"  ng-click = "Amazon1(FCortana)">Amazon'sCortana</button>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-2" ng-init="FEcho='Amazonecho'">
    
  <button type="button" class="btn btn-info btn-lg"  ng-click = "Amazon1(FEcho)">Amazon'sEcho</button>
</div>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">YourCart</button>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-2"></div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h3 class="modal-title">Your Cart</h3>
        </div>
        <div class="modal-body">
                    <?php

//session_start();

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

$pql = " SELECT * FROM cart";


$esult = $conn->query($pql);

if ($esult->num_rows > 0) {

  echo"
  <table>
  <tr>
    <th><h1>PRODUCT</h1></th>
    <th><h1>PRICE</h1></th>
    <th><h1>QUANTITY</h1></th>
    <th><h1>TOTAL</h1></th>
  </tr>";
while($row = $esult->fetch_assoc())
{
  echo"
  <tr>
    <td>"."<h2>".$row['PRODUCT']."</h2>"."</td>
    <td>"."<h2>".$row['PRICE']."</h2>"."</td>
    <td>"."<h2>&nbsp&nbspX".$row['QUANTITY']."=</h2>"."</td>
    <td>"."<h2>RS.".$row['PRICE'] * $row['QUANTITY']."</h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type='button' ng-click = Discard('$row[PRODUCT]') class='btn btn-default' id = 'bulge'>discard</button>"."</td>  
    </tr>";
  }
  echo "</table>";
}
else
{
        echo "<h1>YourCart Is Empty</h1>";
}


$conn->close();
?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id = "bulge">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<!--<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id = "bulge">&times;</button>
          
          <center><h1 class="modal-title" style="color: #6495ED">Message</h1></center>
        
        </div>
        <div class="modal-body">



 <div class="container-fluid">
    <div class="lick">
          <h2 ><span id="cor" class="glyphicon glyphicon-ok"> 
          </span>Item has been added to your cart.</h2>
          <center><button type="button" class="btn btn-info btn-lg" class="close" data-dismiss="modal" data-toggle="modal" data-target="#myModal2">YourCart</button></center>
        </div>
      </div>
        </div>
        
      </div>
      
    </div>
  </div>

<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id = "bulge">&times;</button>
          
          <center><h1 class="modal-title" style="color: #6495ED">asshole</h1></center>
        
        </div>
        <div class="modal-body">



 <div class="container-fluid">
    <div class="lick">
          <h2 ><span id="cor" class="glyphicon glyphicon-ok"> 
          </span>Item has been added to your cart.</h2>
          <center><button type="button" class="btn btn-info btn-lg" class="close" data-dismiss="modal" data-toggle="modal" data-target="#myModal2">YourCart</button></center>
        </div>
      </div>
        </div>
        
      </div>
      
    </div>
  </div>-->


</div>
</div>

  
