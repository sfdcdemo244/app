<?php
$servername = "ec2-54-167-168-52.compute-1.amazonaws.com";
$username = "ezmebocjiznuyh";
$password = "f98ba2c2dcd27edfba139cabc5720a4bdc29a2fd749d6c54e11d34a95f6923a3";
$dbname = "dfisqqcbkggoj9";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
