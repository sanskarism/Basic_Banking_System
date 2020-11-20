<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Table</title>
    <link rel="stylesheet" href="stylecustomertable.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">Banking System</a>
  <a href="home.php">Home</a>
  <a href="customertable.php">View Customer</a>
  <a href="transfer.php">Transfer History</a>
  
</div>
    <?php
    $conn = mysqli_connect("localhost", "root", "","customertabke");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM customer";
$result = $conn->query($sql);
echo "<b> <center> Customers </center> </b> <br>";

	if($result){
  if($result->num_rows > 0) {

    // Creating Table In Html using Php
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Balance</th><th>Operations</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $id= $row["ID"];
        echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Balance"];
        echo "<td> <a href='viewcust.php?id=$id'>View</a></tr>";
    }
}
    echo "</table>";
}

    ?>
</body>
</html>