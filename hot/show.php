<?php
$conn = require "database.php";
 
$sql = "SELECT * FROM hot";
$result = mysqli_query($conn, $sql);


//$result_all = mysqli_fetch_all($result);
//print_r($result_all);
//while ($row = mysqli_fetch_array($result)) {
    //$ro2 = $row;
    foreach (mysqli_fetch_all($result) as $key => $value) {
        $value2 = $value;
        foreach ($value2 as $key3 => $value3) {
            if ($key3 == "2") {
                $maintime = $value3;
            }
        }
    }
//}


//
echo "<table>";

echo "<tr><td>" . "最近更新:" . $maintime  ."</td></tr>";
echo "<tr style=\"--background:transparent;\"><td style=\"padding:0px;\"></td></tr>";
$sql = "SELECT * FROM hot";
$result = mysqli_query($conn, $sql);
$count = 0;
//print_r(mysqli_fetch_all($result));
while($row = mysqli_fetch_array($result)) {
    //echo "<tr><td>" . $row['user'] . " " . $row['time'] . "</td></tr>";
    echo "<tr style=\"--background:transparent;\"><td ></td></tr>";
    echo "<tr style=\"--background:#efefef\"><td>" . ++$count . "." . $row['msg'] . "</td></tr>";
}
echo "</table>"; 

//
mysqli_close($conn);

?>