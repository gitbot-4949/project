<?php
$mysqli = new mysqli("localhost", "root", "", "loginsystem");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT c_add FROM client WHERE c_name =?";

$stmt = $mysqli->prepare($sql);
$data = stripslashes(mysqli_real_escape_string($mysqli,$_GET['q']));

//echo $data;

$stmt->bind_param("s",$data);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cadd);
$stmt->fetch();
$stmt->close();

echo $cadd;
// echo "<tr>";
// echo "<th>CustomerID</th>";
// echo "<td>" . $cid . "</td>";
// echo "<th>CompanyName</th>";
// echo "<td>" . $cname . "</td>";
// echo "<th>ContactName</th>";
// echo "<td>" . $name . "</td>";
// echo "<th>Address</th>";
// echo "<td>" . $adr . "</td>";
// echo "<th>City</th>";
// echo "<td>" . $city . "</td>";
// echo "<th>PostalCode</th>";
// echo "<td>" . $pcode . "</td>";
// echo "<th>Country</th>";
// echo "<td>" . $country . "</td>";
// echo "</tr>";
// echo "</table>";
?>