<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Specific Customer</title>
    <link rel="stylesheet" href="viewcustomer.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">Banking System</a>
  <a href="home.php">Home</a>
  <a href="customertable.php">View Customer</a>
  <a href="transfer.php">Transfer History</a>
</div>

<?php error_reporting(E_ALL ^ E_NOTICE);
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "","customertabke");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM customer WHERE ID=$id";
$result = $conn->query($sql);
if($result){
  if($result->num_rows > 0) {
  	echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Balance</th></tr>";
    while($row = $result->fetch_assoc()) {
    	$Name =$row["Name"];
     echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Balance"];

    }


}
echo "</table>";
} else {
   echo "0 results";
}

?>
<form class="container" action="transfer.php" method="POST" >
   <label for="From" >From:</label><br>
           <input type="text" placeholder="From" name="From" id="From"><br>
   <label for="To" >Name:</label><br>
           <input type="text" placeholder="To" name="Name" id="Name"><br>
   <label for="Amount" >Amount:</label><br>
           <input type="text" placeholder="Amount to transfer" name="Amount" id="Amount"><br>
   <input type="submit" value="Transfer Money" id="button">
</form>
</body>

</html>