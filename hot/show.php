<?php
$servername = "localhost";
$username = "root";
$password = "zoutaoyu319";
$dbname = "hot";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
 
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