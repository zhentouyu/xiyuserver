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
        /*print_r($value);
        echo "<br>value<br>";
        print_r($key);
        echo "<br>key<br>";*/
        foreach ($value2 as $key3 => $value3) {
            /*print_r($value2);
            echo "<br>value2<br>";
            print_r($value3);
            echo "<br>value3<br>";
            print_r($key3);
            echo "<br>key3<br>";*/
            if ($key3 == "2") {
                $maintime = $value3;
            }//最后更新时间
            if ($key3 == "0") {
                $hotmsgid = $value3;
            }//id
        }
    }
//}


//
echo "<table style=\"\">";

echo "<tr><td>" . "最近更新:" . $maintime  ."</td></tr>";
echo "<tr style=\"--background:transparent;\"><td style=\"padding:0px;\"></td></tr>";
$sql = "SELECT * FROM hot";
$result = mysqli_query($conn, $sql);
$count = 0;
//print_r(mysqli_fetch_all($result));
while($row = mysqli_fetch_array($result)) {
    //echo "<tr><td>" . $row['user'] . " " . $row['time'] . "</td></tr>";
    echo "<tr style=\"--background:transparent;\"><td class=\"msgid\" style=\"text-align: right;\"></td></tr>";
    $msg = preg_replace("/\/r\/n/","<br>",$row['msg']);
    echo "<tr style=\"--background:#efefef;\"><td>" . ++$count . "." . $msg . "</td>";
    //echo "<td class=\"msgid\" style=\"text-align: right;width: 30%\">" . $row['id'] . "</td></tr>";
}
echo "</table>"; 

//
mysqli_close($conn);

?>