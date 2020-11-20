<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="transfer.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">Banking System</a>
  <a href="home.php">Home</a>
  <a href="customertable.php">View Customer</a>
  <a href="transfer.php">Transfer History</a>
</div>
<?php error_reporting(E_ALL ^ E_NOTICE);


$To = $_POST['Name'];
$AmountTransfered = $_POST['Amount'];
$From = $_POST['From'];

$conn = mysqli_connect("localhost", "root", "", "customertabke");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql1 = "INSERT INTO transfer(From_Customer, To_Customer, Amount_Transferred) VALUES ('$From', '$To', $AmountTransfered) ";
$inserted =$conn->query($sql1);
$sql4 = "select Balance from customer where `Name` = '$To'";
$result = $conn->query($sql4);
$row = $result->fetch_assoc();
$CurrentMoneyTo = $row["Balance"];
$sql5 = "select Balance from customer where `Name` = '$From'";
$result = $conn->query($sql5);
$row = $result->fetch_assoc();
$CurrentMoneyFrom = $row["Balance"];
$sql2 = "UPDATE `customer` set `Balance`='$CurrentMoneyTo'+'$AmountTransfered' where `Name`='$To'";
$result2 = $conn->query($sql2);
$sql3 = "UPDATE `customer` set `Balance`='$CurrentMoneyFrom'-'$AmountTransfered' where `Name`='$From'";
$result3 = $conn->query($sql3);
$sql = "SELECT * FROM transfer";
$result = $conn->query($sql);

if($result){
  if($result->num_rows > 0) {
  	echo "<table><tr><th>From customer</th><th>To customer</th><th>AmountTransfered</th><tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["From_Customer"]. "</td><td>" . $row["To_Customer"]. "</td><td>" . $row["Amount_Transferred"]. "</td></tr>";
    }

}
 echo "</table>";
} else {
    echo "0 results";
}

 
?>
</body>
</html>