<?php

$conn = require "database.php";
 
$sql = "SELECT * FROM hot";
$result = mysqli_query($conn, $sql);


//$result_all = mysqli_fetch_all($result);
//print_r($result_all);
//while ($row = mysqli_fetch_array($result)) {
    //$ro2 = $row;
    $sumhot = 0;
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
        $sumhot += 1;//计算总条数
    }
//}


//
echo "最近更新:" . $maintime . "&nbsp&nbsp&nbsp&nbsp&nbsp共" . $sumhot . "条";
echo "<div id=\"main\" style=\"max-height: 500px;overflow:auto;border:2px solid grey;border-radius:5px;\">";
echo "<table style=\"\">";

//echo "<tr><td style=\"display:none;\">" . "最近更新:" . $maintime  ."</td></tr>";
//echo "<tr style=\"--background:transparent;\"><td style=\"padding:6px;\"></td></tr>";
$sql = "SELECT * FROM hot ORDER BY `hot`.`id` DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
//print_r(mysqli_fetch_all($result));
while($row = mysqli_fetch_array($result)) {
    //echo "<tr><td>" . $row['user'] . " " . $row['time'] . "</td></tr>";//没用的临时代码
    echo "<tr style=\"--background:transparent;\"><td></td></tr>";//抵消water.css的表格显示颜色差
    $msg = preg_replace("/\r\n/","<br>",$row['msg']);//将数据库中的\r\n换行改为html的<br>
    echo "<tr style=\"--background:#efefef;\"><td>" . ++$count . "." . $msg . "</td>";//主要部分显示
    //echo "<td class=\"msgid\" style=\"text-align: right;width: 30%\">" . $row['id'] . "</td></tr>";//这里是原来的msgid显示 将来会改成删除的按钮
}
echo "</table>"; 
echo "</div>";
//
mysqli_close($conn);

?>