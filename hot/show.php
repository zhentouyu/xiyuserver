<?php
$conn = require "database.php";
 
$sql = "SELECT * FROM hot_msg";
$result = mysqli_query($conn, $sql);

//
echo "<table>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row['user'] . " " . $row['time'] . "</td></tr>";
    echo "<tr><td>" . $row['msg'] . "</td></tr>";
}
echo "</table>";
//
mysqli_close($conn);

?>